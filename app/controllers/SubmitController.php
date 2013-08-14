<?php
	class SubmitController extends BaseController {

		public function postSubmit() {
			//get the data

			$name = Input::file('photo')->getClientOriginalName();

			$extension = strstr($name, '.');

			function generateRandomString($length = 5) {
			    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $randomString = '';
			    for ($i = 0; $i < $length; $i++) {
			        $randomString .= $characters[rand(0, strlen($characters) - 1)];
			    }
			    return $randomString;
			}

			$fileName = generateRandomString();

			$fileName .= $extension;

			Input::file('photo')->move('../public/bin/photos', $fileName);

			$tags = explode(',', Input::get('tags'));

			$date = date('Y-m-d H:i:s', time());

			$db = new PDO('sqlite:' . '../app/database/production.sqlite');
			$statement = $db->prepare('INSERT INTO posts (title, photo, content, date) VALUES (:title, :photo, :content, :date)');

			$statement->bindValue(':title', Input::get('title'), PDO::PARAM_STR);
			$statement->bindValue(':photo', 'bin/photos/'.$fileName, PDO::PARAM_STR);
			$statement->bindValue(':content', Input::get('message'), PDO::PARAM_STR);
			$statement->bindValue(':date', $date, PDO::PARAM_STR);
	     	if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}

			$statement = $db->prepare('SELECT id FROM posts WHERE date=:date');
			$statement->bindValue(':date', $date, PDO::PARAM_STR);
			if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}		
			$id = $statement->fetchAll(PDO::FETCH_ASSOC);
			$id = $id[0]['id'];

			foreach($tags as $tag) {

				$tag = trim($tag);
				$tag = strtolower($tag);
				$tagID = preg_replace('/\s+/', '_',$tag);

				$statement = $db->prepare('SELECT tagID FROM tags WHERE tagID=:tagid');
				$statement->bindValue(':tagid', $tagID, PDO::PARAM_STR);
				if (!$statement->execute())
				{
					$err = print_r($statement->errorInfo(), true);
					throw new Exception($err);
				}		
				$tagIDRows = $statement->fetchAll(PDO::FETCH_ASSOC);
				
				if (empty($tagIDRows)) {
					$statement = $db->prepare('INSERT INTO tags (tagID, tag, count) VALUES (:tagid, :tag, :count)');
					$statement->bindValue(':tagid', $tagID, PDO::PARAM_STR);
					$statement->bindValue(':tag', $tag, PDO::PARAM_STR);
					$statement->bindValue(':count', 1, PDO::PARAM_INT);
					if (!$statement->execute())
					{
						$err = print_r($statement->errorInfo(), true);
						throw new Exception($err);
					}		
				} else {
					$statement = $db->prepare('UPDATE tags SET count=count+1 WHERE tagID=:tagid');
					$statement->bindValue(':tagid', $tagID, PDO::PARAM_STR);
					if (!$statement->execute())
					{
						$err = print_r($statement->errorInfo(), true);
						throw new Exception($err);
					}
				}
				$statement = $db->prepare('INSERT INTO postTags (tagID, postID) VALUES (:tagid, :postid)');
				$statement->bindValue(':tagid', $tagID, PDO::PARAM_STR);
				$statement->bindValue(':postid', $id, PDO::PARAM_STR);
				if (!$statement->execute())
				{
					$err = print_r($statement->errorInfo(), true);
					throw new Exception($err);
				}
			}
			return Redirect::to('/');
		}
	}
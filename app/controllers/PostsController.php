<?php

class PostsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'index';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('create')
			->with('active', 'create')
			->with('activetag', 'none');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
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
		return Redirect::to('/success');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (is_numeric($id)) {
			$post = Post::getPost($id);
			return View::make('posts')
				->with('active', 'none')
				->with('activetag', 'none')
				->with('post', $post);
		} else {
			return Redirect::to('/404');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (is_numeric($id)) {
			$post = Post::getPost($id);
			return View::make('postedit')
				->with('active', 'none')
				->with('activetag', 'none')
				->with('post', $post);
		} else {
			return Redirect::to('/404');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$post = Post::getPost($id);

		if (Input::hasFile('photo')) {
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
			$path = '../public/'.$post[0]['photo'];
			File::delete($path);
			$statement = $db->prepare('UPDATE posts SET photo=:photo WHERE id=:id');
			$statement->bindValue(':photo', 'bin/photos/'.$fileName, PDO::PARAM_STR);
			$statement->bindValue(':id', $id, PDO::PARAM_INT);
			if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}
		} 
		if (Input::get('title') != $post[0]['title']) {
			$statement = $db->prepare('UPDATE posts SET title=:title WHERE id=:id');
			$statement->bindValue(':title', Input::get('title'), PDO::PARAM_STR);
			$statement->bindValue(':id', $id, PDO::PARAM_INT);
			if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}
		}
		if (Input::get('message') != $post[0]['content']) {
			$statement = $db->prepare('UPDATE posts SET content=:content WHERE id=:id');
			$statement->bindValue(':content', Input::get('message'), PDO::PARAM_STR);
			$statement->bindValue(':id', $id, PDO::PARAM_INT);
			if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}
		}

		$tags = explode(',', Input::get('tags'));
		$oldTags = $post[0]['tags'];
		foreach($oldTags as $oldTag) {
			$statement = $db->prepare('UPDATE tags SET count=count-1 WHERE tagID=:tagid');
			$statement->bindValue(':tagid', $oldTag[0]['tagID'], PDO::PARAM_STR);
			if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}	
		}
		Tag::cleanTags();
		$statement = $db->prepare('DELETE FROM postTags WHERE postID=:postid');
		$statement->bindValue(':postid', $id, PDO::PARAM_INT);
		if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}	

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
		return Redirect::to('/updated/'.$post[0]['id']);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (is_numeric($id)) {
			Post::deletePost($id);
			return Redirect::to('/deleted');
		} else {
			return Redirect::to('/404');
		}
	}

}
<?php
class Post extends Eloquent {
	public static function getPosts($pageNumber, $perPage = 10) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		if ($pageNumber == 1) {
			$statement = $db->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT :perpage');
		} else {
			$offset = $pageNumber - 1;
			$offset = $offset * $perPage;
			$statement = $db->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT :perpage OFFSET :offset');
			$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
		}
		$statement->bindValue(':perpage', $perPage, PDO::PARAM_INT);
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$postrows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return Post::getTagsForPost($postrows);
	}

	public static function getPost($postID) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('SELECT * FROM posts WHERE id=:id');
		$statement->bindValue(':id', $postID, PDO::PARAM_INT);
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$postrows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return Post::getTagsForPost($postrows);
	}

	public static function getMostRecentPost() {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$postrows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return Post::getTagsForPost($postrows);
	}
	public static function deletePost($postID) {
		$post = Post::getPost($postID);
		$tags = $post[0]['tags'];

		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('DELETE FROM posts WHERE id=:id');
		$statement->bindValue(':id', $postID, PDO::PARAM_INT);
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		
		$statement = $db->prepare('DELETE FROM postTags WHERE postID=:id');
		$statement->bindValue(':id', $postID, PDO::PARAM_INT);
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}

		foreach ($tags as $tag) {
			$statement = $db->prepare('UPDATE tags SET count=count-1 WHERE tagID=:tagid');
			$statement->bindValue(':tagid', $tag[0]['tagID'], PDO::PARAM_STR);
	     	if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}
		}

		Tag::cleanTags();

		$path = '../public/'.$post[0]['photo'];
		File::delete($path);
	
	}

	public static function getTagsForPost($postrows) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$count = 0;
		while ($count < count($postrows)) {
			$statement = $db->prepare('SELECT * FROM postTags WHERE postID=:postid');
			$statement->bindValue(':postid', $postrows[$count]['id'], PDO::PARAM_INT);
	     	if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}
			$tagrows = $statement->fetchAll(PDO::FETCH_ASSOC);
			$count1 = 0;
			$tags = array();
			while($count1 < count($tagrows)) {
				$statement = $db->prepare('SELECT * FROM tags WHERE tagID=:tagid');
				$statement->bindValue(':tagid', $tagrows[$count1]['tagID'], PDO::PARAM_STR);
				if (!$statement->execute())
				{
					$err = print_r($statement->errorInfo(), true);
					throw new Exception($err);
				}
				$tags[] = $statement->fetchAll(PDO::FETCH_ASSOC);
				$count1++;
			}
			$postrows[$count]['tags'] = $tags;
			$count++;
		}
		return $postrows;

	}

	public static function getPostsFromSearch($query) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('SELECT id FROM posts WHERE title LIKE :query OR content LIKE :query ORDER BY id');
		$statement->bindValue(':query', '%'.$query.'%', PDO::PARAM_STR);

     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$postrows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return Post::getTagsForPost($postrows);
	}

	public static function getPostsFromSearchOfPage($pageNumber, $query, $perPage = 10) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		if ($pageNumber == 1) {
			$statement = $db->prepare('SELECT * FROM posts WHERE title LIKE :query OR content LIKE :query ORDER BY id DESC LIMIT :perpage');
		} else {
			$offset = $pageNumber - 1;
			$offset = $offset * $perPage;
			$statement = $db->prepare('SELECT * FROM posts WHERE title LIKE :query OR content LIKE :query ORDER BY id DESC LIMIT :perpage OFFSET :offset');
			$statement->bindValue(':offset', $offset, PDO::PARAM_INT);
		}
		$statement->bindValue(':perpage', $perPage, PDO::PARAM_INT);
		$statement->bindValue(':query', '%'.$query.'%', PDO::PARAM_STR);
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$postrows = $statement->fetchAll(PDO::FETCH_ASSOC);
		return Post::getTagsForPost($postrows);
	}

	public static function getNumberOfPages($perPage = 10) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('SELECT id FROM posts');
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$idrows = $statement->fetchAll(PDO::FETCH_ASSOC);
		$count = count($idrows);
		$count = ((int)($count / $perPage));
		$mod = $count % $perPage;
		$pages = 0;
		if ($mod != 0) {
			$pages = $count + 1;
		} else {
			$pages = $count;
		}
		if ($pages == 0) {
			$pages = 1;
		}
		return $pages;
	}

	public static function getNumberOfPagesOfPosts($posts, $perPage = 10) {
		$count = count($posts);
		$count = ((int)($count / $perPage));
		$mod = $count % $perPage;
		$pages = 0;
		if ($mod != 0) {
			$pages = $count + 1;
		} else {
			$pages = $count;
		}
		if ($pages == 0) {
			$pages = 1;
		}
		return $pages;
	}
}
<?php
class Tag extends Eloquent {
	public static function getPostsWithTagID($tagID, $pageNumber) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('SELECT postID FROM posttags WHERE tagID=:tagid LIMIT 10');
		$statement->bindValue(':tagid', $tagID, PDO::PARAM_STR);
     	if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$tagrows = $statement->fetchAll(PDO::FETCH_ASSOC);

		$postrows = [];
		foreach($tagrows as $tag) {
			$statement = $db->prepare('SELECT * FROM posts WHERE id=:id ORDER BY id');
			$statement->bindValue(':id', $tag['postID'], PDO::PARAM_STR);
	     	if (!$statement->execute())
			{
				$err = print_r($statement->errorInfo(), true);
				throw new Exception($err);
			}
			$postrows = array_merge($statement->fetchAll(PDO::FETCH_ASSOC), $postrows);
		}
		return Post::getTagsForPost($postrows);
	}

	public static function getTag($tagID) {
		$db = new PDO('sqlite:' . '../app/database/production.sqlite');
		$statement = $db->prepare('SELECT tag FROM tags WHERE tagID=:tagid');
		$statement->bindValue(':tagid', $tagID, PDO::PARAM_STR);
		if (!$statement->execute())
		{
			$err = print_r($statement->errorInfo(), true);
			throw new Exception($err);
		}
		$tagrows = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $tagrows[0]['tag'];
	}
}
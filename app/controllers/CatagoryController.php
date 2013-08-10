<?php

class CatagoryController extends BaseController {

	public function showCatagory()
	{
		$posts = Post::getPosts(1);
		return View::make('catagory')
			->with('active', 'catagory')
			->with('posts', $posts);
	}

}
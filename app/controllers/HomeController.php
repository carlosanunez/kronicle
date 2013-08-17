<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showHome()
	{
		$numberOfPages = Post::getNumberOfPages();
		if (Input::get('page')) {
			$page = Input::get('page');
		}
		if (isset($page) && is_numeric($page) && ($page <= $numberOfPages) && ($page != 0)) {
			$page = abs(Input::get('page'));
		} else if (!Input::get('page')) {
			$page = 1;
		} else {
			return Redirect::to('/404');
		}
		
		$posts = Post::getPosts($page);
		return View::make('home')
			->with('active', 'home')
			->with('posts', $posts)
			->with('activetag', 'none')
			->with('page', $page)
			->with('numberOfPages', $numberOfPages);
	}

}
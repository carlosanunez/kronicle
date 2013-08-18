<?php

class SearchController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query = Input::get('query');
		$posts = Post::getPostsFromSearch($query);

		$numberOfPages = Post::getNumberOfPagesOfPosts($posts);
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
		$posts = Post::getPostsFromSearchOfPage($page, $query);

		if (count($posts) == 0) {
			return Redirect::to('no-results');
		}
		else {
			return View::make('search')
				->with('active', 'search')
				->with('activetag', 'none')
				->with('query', $query)
				->with('posts', $posts)
				->with('page', $page)
				->with('numberOfPages', $numberOfPages);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($tagID)
	{

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
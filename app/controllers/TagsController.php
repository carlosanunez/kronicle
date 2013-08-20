<?php

class TagsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tags = Tag::getTags();
		return View::make('tagsIndex')
			->with('active', 'tags')
			->with('activetag', 'allTags')
			->with('tags', $tags);
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
		$posts = Tag::getPostsWithTagID($tagID);
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
		
		$posts = Tag::getPostsWithTagIDOfPage($page, $tagID);

		$tag = Tag::getTag($tagID);
		return View::make('tags')
			->with('active', 'tags')
			->with('activetag', $tag)
			->with('posts', $posts)
			->with('tag', $tag)
			->with('tagID', $tagID)
			->with('page', $page)
			->with('numberOfPages', $numberOfPages);
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

	public function showCatagory()
	{
		$posts = Post::getPosts(1);
		return View::make('catagory')
			->with('active', 'catagory')
			->with('posts', $posts);
	}

	public function json() {
		$tags = Tag::getTagsJson();
		return View::make('tagsJson')
			->with('tags', $tags);
	}
}
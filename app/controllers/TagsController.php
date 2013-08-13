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
		if (!isset($_GET['page'])) {
			$pageNumber = 1;
		}
		$posts = Tag::getPostsWithTagID($tagID, $pageNumber);
		$tag = Tag::getTag($tagID);
		return View::make('tags')
			->with('active', 'tags')
			->with('activetag', $tag)
			->with('posts', $posts)
			->with('tag', $tag);
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
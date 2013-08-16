<?php 

	class MiscController extends BaseController
	{
		public function show404() {
			return View::make('404')
				->with('active', '404')
				->with('activetag', 'none');
		}

		public function showDeleted() {
			return View::make('message')
				->with('active', 'deleted')
				->with('activetag', 'none')
				->with('message', 'deleted');
		}

		public function showUploaded() {
			$post = Post::getMostRecentPost();
			return View::make('message')
				->with('active', 'uploaded')
				->with('activetag', 'none')
				->with('post', $post)
				->with('message', 'uploaded');
		}

		public function showError() {
			return View::make('message')
				->with('active', 'deleted')
				->with('activetag', 'none')
				->with('message', 'error');
		}
	}
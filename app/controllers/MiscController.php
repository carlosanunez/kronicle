<?php 

	class MiscController extends BaseController
	{
		public function show404() {
			return View::make('404')
				->with('active', '404')
				->with('activetag', 'none');
		}

		public function showDeleted() {
			return View::make('success')
				->with('active', '404')
				->with('activetag', 'none')
				->with('message', 'deleted');
		}


	}
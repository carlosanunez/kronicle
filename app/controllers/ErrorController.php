<?php 

	class ErrorController extends BaseController
	{
		public function show404() {
			return View::make('404')
				->with('active', '404')
				->with('activetag', 'none');
		}
	}
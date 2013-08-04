<?php 
	class ContactController extends BaseController
	{
		public function showContact()
		{
			return View::make('contact')
				->with('active', 'contact');
		}
	}
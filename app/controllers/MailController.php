<?php 

	class MailController extends BaseController
	{
		public function sendMail()
		{
			//some sort of view will go here once that's built

			$maildata = array(
				'name'    => Input::get('name'),
				'email'   => Input::get('email'),
				'message' => Input::get('message')
				);

			// $message = Swift_Message::newInstance('question');

			//the pretend function will sends a message to the logs
			// Mail::pretend();
			//view, stuff to pass, callback
			Mail::send('emails.testMail', $maildata, function($message) use($maildata)
				{
					$message->from($maildata['email']);
					$message->to('youremailhere')->subject('message from blog');
				});

			//should appear in the mail
			echo $maildata["name"];
			return "\nsent! from " . $maildata['email'];
		}
	}
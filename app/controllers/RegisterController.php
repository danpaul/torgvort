<?php

class RegisterController extends BaseController {

	private static $rules = array
	(
		'email' => 'Required|Between:3,64|Email|Unique:users',
		'password' => 'Required|AlphaNum|Between:8,32|Confirmed',
		'password_confirmation' => 'Required|AlphaNum|Between:8,32'
	);

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	function getRegister()
	{
		return View::make('register');
	}

	function postRegister()
	{
		$validation = Validator::make(Input::all(), self::$rules);
		if($validation->fails())
		{
			return Redirect::back()->withErrors($validation);

		}else{
			$user = User::createUser();
			$this->sendEmailVerification($user);
			return 'success';
		}
	}

	function sendEmailVerification($user)
	{
		$old_record = EmailValidation::where('email', $user->email)->first();
		if($old_record){ $old_record->delete(); }
		$email_validation = new EmailValidation;
		$email_validation->email = $user->email;
		$email_validation->token = Hash::make(microtime() . Input::get('email'));
		$email_validation->save();
		$data = array('token' => $email_validation->token);
		//$data = array('token' => $email_validation->token);
		//Mail::send('emails.report', $data, function($m) use ($team)
		//$data['foo'] = 'bar';
		//use ($data)
		Mail::send('emails.verify', array('token' => $email_validation->token), function($message) use($data)
		{
			//$message['token'] = $data->token;
    		$message->from('email@email.com');//(Config::get('mail.from'));
		    $message->to('foo@foo.com');//$user->email);
		});
	}

}
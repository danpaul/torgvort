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
			return 'success';
		}
	}

}
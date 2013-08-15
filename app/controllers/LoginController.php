<?php

class LoginController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	function getRegister()
	{
		$user = new User;
		return View::make('login')->with('user', $user);
	}

	function postRegister()
	{
		if(Input::get('password_01') != Input::get('password_02'))
		{
			Session::flash('error', 'passwords do not match');
			return Redirect::back();
		}else{
			return var_dump(Input::all());
		}
	}

}
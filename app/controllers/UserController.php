<?php

class UserController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	function getIndex()
	{
		$users = User::all();
		return View::make('users')->with('users', $users);
	}
}
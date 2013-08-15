@extends('layout')

@section('content')
	<?php
		foreach($errors->all() as $message)
		{
			echo('<h3 class = "error_message">' . $message . '</h3>');
		}
		echo Form::open(array('action' => 'RegisterController@postRegister'));
		echo Form::label('email', 'E-Mail Address: ');
		echo Form::text('email');
		echo '<br />';
		echo Form::label('password', 'Password: ');
		echo Form::password('password');
		echo '<br />';
		echo Form::label('password_confirmation', 'Confirm password: ');
		echo Form::password('password_confirmation');
		echo '<br />';
		echo Form::submit('submit');
		echo Form::close();
	?>
@stop
<?php

/* This controller renders the login page */

class LoginController{
	public function handleRequest(){
		
		render('login',array(
			'title'		=> 'Welcome to the Places',
		));
	}
}

?>
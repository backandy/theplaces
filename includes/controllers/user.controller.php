<?php

/* This controller renders the login page */

class UserController{
	public function handleRequest(){
		$user = User::find(array('idusers'=>$_SESSION['UID']));
		render('user',array(
			'title'		=> 'My Profile',
                        'user'	=> $user
		));
	}
}

?>
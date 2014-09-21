<?php

/* This controller renders the category pages */

class FriendController{
	public function handleRequest(){
		
		// Fetch all the places:
		$friends = Friend::find(array('idusers'=>$_SESSION['UID']));
				
		
		render('friend',array(
			'title'			=> 'Browsing friends',
			'friends'	=> $friends
		));		
	}
}


?>
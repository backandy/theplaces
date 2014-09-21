<?php

/* This controller renders the login page */

class OtherUserController{
	public function handleRequest(){
		$otheruser = OtherUser::find(array('idusers'=>$_GET['idusers']));
                $areWeFriend =OtherUser::areWeFriends(array('idusers'=>$_GET['idusers']));
		render('otheruser',array(
			'title'		=> 'My Profile',
                        'otheruser'	=> $otheruser,
                        'areWeFriend'   => $areWeFriend
		));
	}
}

?>
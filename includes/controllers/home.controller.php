<?php

/* This controller renders the home page */

class HomeController{
	public function handleRequest(){
		
		$arr = array('idusers'=>$_SESSION['UID']);
		$content = Place::findMyPlaces($arr);
                $friend = Friend::find($arr);
		
		render('home',array(
			'title'		=> "". $_SESSION['UNAME'] . ' Welcome to the Places',
			'content'	=> $content,
                        'friend'        => $friend
		));
	}
}

?>
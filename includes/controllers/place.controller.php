<?php

/* This controller renders the category pages */

class PlaceController{
	public function handleRequest(){
		
		// Fetch all the places:
		$places = Place::find();
				
		
		render('place',array(
			'title'			=> 'Browsing places',
			'places'	=> $places
		));		
	}
}


?>
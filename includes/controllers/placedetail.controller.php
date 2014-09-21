<?php

/* This controller renders the category pages */

class PlaceDetailController {

    public function handleRequest() {

        $arr = array('idplaces' => $_GET['idplaces']);
        $placedetails = PlaceDetail::find($arr);
        $followers = Follower::find($arr);
        $doIFollow = Follower::amIaFollower($arr);

        render('placedetail', array(
            'title' => 'Browsing place',
            'placedetails' => $placedetails,
            'followers' => $followers,
            'doIFollow' => $doIFollow
        ));
    }

}

?>
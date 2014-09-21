<?php

/* This controller renders the login page */

class LogoutController {

    public function handleRequest() {
        unset($_SESSION['UID']);
        unset($_SESSION['UNAME']);
        
        render('login', array(
            'title' => 'Welcome to the Places',
            'logout' => 'true'
        ));
    }

}

?>
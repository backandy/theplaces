<?php

session_start();
/*
  This is the index file of our simple website.
  It routes requets to the appropriate controllers
 */

require_once "includes/main.php";

try {

    if (isset($_SESSION['UID'])) {
        if ($_GET['page'] == 'home') {
            $c = new HomeController();
        } elseif ($_GET['page'] == 'places') {
            $c = new PlaceController();
        } elseif ($_GET['page'] == 'place') {
            $c = new PlaceDetailController();
        } elseif ($_GET['page'] == 'friends') {
            $c = new FriendController();
        } elseif ($_GET['page'] == 'otherusers') {
            $c = new OtherUserController();
        } elseif ($_GET['page'] == 'myprofile') {
            $c = new UserController();
        } elseif ($_GET['page'] == 'logout') {
            $c = new LogoutController();
        } else {
            session_destroy();
            throw new Exception('Wrong page!');
        }
    } else {
        $c = new LoginController();
    }
    $c->handleRequest();
} catch (Exception $e) {
    // Display the error page using the "render()" helper function:
    render('error', array('message' => $e->getMessage()));
}
?>
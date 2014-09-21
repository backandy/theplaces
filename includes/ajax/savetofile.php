<?php

session_start();

require_once "../config.php";

if (isset($_FILES['myFile'])) {
    // Example:
    $retVal = move_uploaded_file($_FILES['myFile']['tmp_name'], "" . $GLOBALS['serverLocalRoot'] . "assets/img/users/" . $_SESSION['UID'] . ".jpg");
    if ($retVal){
        echo json_encode(array('status'=>'ok'));
    }
    else {
       echo json_encode(array('status'=>'nok', 'message'=>"There was a problem uploading the image"));
    }
}
?>
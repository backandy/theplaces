<?php

session_start();

require_once "../config.php";
require_once "../connect.php";

// query database
$username = $_POST['username'];
$password = $_POST['password'];
$idfacebook = $_POST['idfacebook'];
$idusers = $_POST['idusers'];

if (isset($idfacebook)){
    try {
        global $db;
        $stmt = $db->prepare("SELECT idusers,username, firstname FROM users where idfacebook=:idfacebook");
        $stmt->bindParam(':idfacebook', $idfacebook);
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            echo json_encode(array('status' => 'ok', 'idusers' => $row['idusers'], 'username' => $row['username']));
            $_SESSION['UID'] = $row['idusers'];
            $_SESSION['UNAME'] = $row['username'];
            $_SESSION['FIRSTNAME'] = $row['firstname'];
        } else {
            unset($_SESSION['UID']);
            unset($_SESSION['UNAME']);
            unset($_SESSION['FIRSTNAME']);
            echo json_encode(array('status' => 'nok', 'message' => 'Username or Password not recognised. Try again'));
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        echo json_encode(array('status' => 'nok', 'message' => $e->getMessage()));
    }
}
else {

    try {
        global $db;
        if (!isset($idusers)){
            $stmt = $db->prepare("SELECT idusers,username, firstname FROM users where username=:username  and password=:password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
        }
        else {
            $stmt = $db->prepare("SELECT idusers,username, firstname FROM users where idusers=:idusers");
            $stmt->bindParam(':idusers', $idusers);
        }
        $stmt->execute();
        $row = $stmt->fetch();
        if ($row) {
            echo json_encode(array('status' => 'ok', 'idusers' => $row['idusers'], 'username' => $row['username']));
            $_SESSION['UID'] = $row['idusers'];
            $_SESSION['UNAME'] = $row['username'];
            $_SESSION['FIRSTNAME'] = $row['firstname'];
        } else {
            unset($_SESSION['UID']);
            unset($_SESSION['UNAME']);
            unset($_SESSION['FIRSTNAME']);
            echo json_encode(array('status' => 'nok', 'message' => 'Username or Password not recognised. Try again'));
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        echo json_encode(array('status' => 'nok', 'message' => $e->getMessage()));
    }
}
?>

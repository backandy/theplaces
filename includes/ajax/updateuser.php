<?php

session_start();

require_once "../config.php";
require_once "../connect.php";

$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

try {
    global $db;
    $db->beginTransaction();
    $stmt = $db->prepare("update users set username=:username, password=:password, firstName=:firstname, lastName=:lastname,email=:email where idusers=".$_SESSION['UID']);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    $db->commit();
    echo json_encode(array('status'=>'ok'));
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo json_encode(array('status'=>'nok', 'message'=>$e->getMessage()));
}
?>

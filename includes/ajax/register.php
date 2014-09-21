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
    $stmt = $db->prepare("INSERT INTO users (username,password,firstName,lastName,email) VALUES (:username,:password,:firstname,:lastname,:email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    $stmt->execute();
    $id = $db->lastInsertId();
    $db->commit();
    
    $_SESSION['UID'] = $id;
    $_SESSION['UNAME'] = $username;
    echo json_encode(array('status'=>'ok','id'=>$id, 'username'=>$username));
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo json_encode(array('status'=>'nok', 'message'=>$e->getMessage()));
}
?>

<?php

session_start();

require_once "../config.php";
require_once "../connect.php";

$idfriend = $_POST['idusers'];
$unfollow = $_POST['action'];

try {
    global $db;
    if (!$unfollow) {
        $stmt = $db->prepare("INSERT INTO users_has_users (idfriend, idusers) VALUES (:idfriend,:idusers)");
    } else {
        $stmt = $db->prepare("delete from users_has_users where idfriend=:idfriend and idusers=:idusers");
    }
    $stmt->bindParam(':idfriend', $idfriend);
    $stmt->bindParam(':idusers', $_SESSION['UID']);

    $stmt->execute();

    echo json_encode(array('status' => 'ok'));
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo json_encode(array('status' => 'nok', 'message' => $e->getMessage()));
}
?>

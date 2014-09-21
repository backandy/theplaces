<?php

session_start();

require_once "../config.php";
require_once "../connect.php";

$idplaces = $_POST['idplaces'];
$unfollow = $_POST['action'];

try {
    global $db;
    if (!$unfollow) {
        $stmt = $db->prepare("INSERT INTO places_has_users (idplaces, idusers) VALUES (:idplaces,:idusers)");
    } else {
        $stmt = $db->prepare("delete from places_has_users where idplaces=:idplaces and idusers=:idusers");
    }
    $stmt->bindParam(':idplaces', $idplaces);
    $stmt->bindParam(':idusers', $_SESSION['UID']);

    $stmt->execute();

    echo json_encode(array('status' => 'ok'));
} catch (PDOException $e) {
    error_log($e->getMessage());
    echo json_encode(array('status' => 'nok', 'message' => $e->getMessage()));
}
?>

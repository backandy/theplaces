<?php

class OtherUser extends User {
    public static function areWeFriends($arr) {
        global $db;

        if ($arr['idusers']) {
            $stmt = $db->prepare("SELECT count(*) follow FROM users_has_users where (idusers=:idusers and idfriend = :idfriend) or (idusers=:idfriend and idfriend = :idusers)");
        } else {
            throw new Exception("Unsupported property!");
        }
        $stmt->bindParam(':idfriend', $arr['idusers']);
        $stmt->bindParam(':idusers', $_SESSION['UID']);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['follow'];
    } 

}

?>
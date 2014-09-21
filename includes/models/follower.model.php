<?php

class Follower extends User {
    /*
      The find static method selects categories
      from the database and returns them as
      an array of Category objects.
     */

    public static function find($arr) {
        global $db;

        if ($arr['idplaces']) {
            $st = $db->prepare("SELECT * FROM users u left join places_has_users phu on u.idusers=phu.idusers where u.idusers<>".$_SESSION['UID']." and idplaces = :idplaces");
        } else {
            throw new Exception("Unsupported property!");
        }

        $st->execute($arr);
        return $st->fetchAll(PDO::FETCH_CLASS, "Follower");
    }
    public static function amIaFollower($arr) {
        global $db;

        if ($arr['idplaces']) {
            $stmt = $db->prepare("SELECT count(*) follow FROM places_has_users where idusers=:idusers and idplaces = :idplaces");
        } else {
            throw new Exception("Unsupported property!");
        }
        $stmt->bindParam(':idplaces', $arr['idplaces']);
        $stmt->bindParam(':idusers', $_SESSION['UID']);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['follow'];
    }    

}

?>
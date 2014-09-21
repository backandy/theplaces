<?php

class Friend extends User {
    /*
      The find static method selects categories
      from the database and returns them as
      an array of Category objects.
     */

    public static function find($arr) {
        global $db;

        if ($arr['idusers']) {
            $st = $db->prepare("SELECT * FROM users u left join users_has_users uhu on u.idusers =  uhu.idfriend where uhu.idusers = :idusers");
        } else {
            throw new Exception("Unsupported property!");
        }

        $st->execute($arr);

        return $st->fetchAll(PDO::FETCH_CLASS, "Friend");
    }

}

?>
<?php

class PlaceDetail {
    /*
      The find static method selects categories
      from the database and returns them as
      an array of Category objects.
     */

    public static function find($arr = array()) {
        global $db;

        if ($arr['idplaces']) {
            $st = $db->prepare("SELECT * FROM places WHERE idplaces=:idplaces");
        } else {
            throw new Exception("Unsupported property!");
        }

        $st->execute($arr);

        // Returns an array of Category objects:
        return $st->fetchAll(PDO::FETCH_CLASS, "PlaceDetail");
    }

}

?>
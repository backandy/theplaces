<?php

class Place {
    /*
      The find static method selects categories
      from the database and returns them as
      an array of Category objects.
     */

    public static function find($arr = array()) {
        global $db;

        if (empty($arr)) {
            $st = $db->prepare("SELECT * FROM places");
        } else if ($arr['idplaces']) {
            $st = $db->prepare("SELECT * FROM places WHERE idplaces=:idplaces");
        } else {
            throw new Exception("Unsupported property!");
        }

        $st->execute($arr);

        // Returns an array of Category objects:
        return $st->fetchAll(PDO::FETCH_CLASS, "Place");
    }

    public static function findMyPlaces($arr) {
        global $db;

        if ($arr['idusers']) {
            $st = $db->prepare("SELECT p.idplaces, p.name, p.address, p.description FROM places p "
                    . "right join places_has_users phu on p.idplaces = phu.idplaces where phu.idusers=:idusers");
        } else {
            throw new Exception("Unsupported property!");
        }

        $st->execute($arr);

        return $st->fetchAll(PDO::FETCH_CLASS, "Place");
    }

}

?>
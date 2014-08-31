<?php

include 'Model.php';

Class Priority extends Model {

    private $priovalue;

    public function __construct() {
        
    }

    private static function build($result) {
        $new = new Priority();
        $new->builds($result);
        $new->setPriovalue($result->priovalue);
        return $new;
    }

    public function delete() {
        $sql = "DELETE from Priorities WHERE id = '$this->id'";
        $query = getDbConnection()->prepare($sql);
        return $query->execute();
    }

    public static function getUserPriorities($userid) {
        $query = getDbConnection()->prepare("SELECT * FROM Priorities WHERE user_id = '$userid'");
        $results = array();
        if ($query->execute()) {
            foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
                $results[] = Priority::build($result);
            }
            return $results;
        } else {
            return NULL;
        }
    }

    public static function findPriority($prioid) {
        $query = getDbConnection()->prepare("SELECT * FROM Priorities WHERE id = '$prioid'");
        if ($query->execute()) {
            $result = build($query->fetchColumn());
            return $result;
        } else {
            return NULL;
        }
    }

    /* Priority specific setter and getter */
    
    private function setPriovalue($p) {
        $this->priovalue = $p;
    }

    public function getPriovalue() {
        return $this->priovalue;
    }

}

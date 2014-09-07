<?php

require_once 'Model.php';

Class Priority extends Model {

    private $priovalue;

    public function __construct() {
        
    }

    public static function build($result) {
        $new = new Priority();
        $new->builds($result);
        $new->setPriovalue($result->priovalue);
        return $new;
    }

    public function insertIntoDb($userid) {
        $sql = "INSERT INTO priorities(user_id, name, description, priovalue) VALUES(?,?,?,?) RETURNING id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($userid, $this->name, $this->description, $this->priovalue));
        if ($ok) {
            $this->id = $query->fetchColumn();
        }
        return $ok;
    }

    public function update() {
        $sql = "UPDATE priorities SET name = ?, description = ?, priovalue = ? WHERE id = ?";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($this->name, $this->description, $this->priovalue, $this->id));
        if ($ok) {
            $this->id = $query->fetchColumn();
            return $ok;
        }
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
            $result = Priority::build($query->fetchObject());
            return $result;
        } else {
            return NULL;
        }
    }

    /* Priority specific setter and getter */

    public function setPriovalue($p) {
        if ($p < 0) {
            $this->errors[] = "Priority value can't be negative!";
        }
        $this->priovalue = $p;
    }

    public function getPriovalue() {
        return $this->priovalue;
    }

}

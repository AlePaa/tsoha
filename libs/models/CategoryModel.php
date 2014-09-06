<?php

include 'Model.php';
include 'DataObject.php';

Class Category extends Model implements DataObject {

    private $parent_id;
    private $priority_id;

    public static function getUserCategories($userid) {
        $query = getDbConnection()->prepare("SELECT * FROM Categories WHERE user_id = '$userid'");
        $results = array();
        if ($query->execute()) {
            foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
                $results[] = Category::build($result);
            }
            return $results;
        } else {
            return NULL;
        }
    }

    public static function build($result) {
        $new = new Category();
        $new->builds($result);
        $new->setParent($result->parent);
        $new->setPriority($result->priority_id);
        return $new;
    }

    public function insertIntoDb($userid) {
        $sql = "INSERT INTO categories(user_id, priority_id, name, description) VALUES(?,1,?,?) RETURNING id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($userid, $this->name, $this->description));
        if ($ok) {
            $this->id = $query->fetchColumn();
        }
        return $ok;
    }

    public function delete() {
        $sql = "DELETE from Categories WHERE id = '$this->id'";
        $query = getDbConnection()->prepare($sql);
        return $query->execute();
    }

    public function update() {
        $sql = "UPDATE Categories SET name = ?, description = ?, priority_id = ? WHERE id = ?";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($this->name, $this->description, $this->priority_id, $this->id));
        if ($ok) {
            $this->id = $query->fetchColumn();
            return $ok;
        }
    }

    public static function findCategory($categoryid) {
        $query = getDbConnection()->prepare("SELECT * FROM Categories WHERE id = '$categoryid'");
        if ($query->execute()) {
            $result = Category::build($query->fetchObject());
            return $result;
        } else {
            return NULL;
        }
    }

    /* Category specific setters and getters */

    public function setParent($p) {
        $this->parent_id = $p;
    }

    public function setPriority($p) {
        $this->priority_id = $p;
    }

    public function getParent() {
        return $this->parent_id;
    }

    public function getPriority() {
        return $this->priority_id;
    }

}

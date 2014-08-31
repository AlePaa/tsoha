<?php

include 'Model.php';

Class Category extends Model {

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

    private function build($result) {
        $new = new Category();
        $new->builds($result);
        $new->setParent($result->parent);
        $new->setPriority($result->priority_id);
        return $new;
    }

    public function delete() {
        $sql = "DELETE from Categories WHERE id = '$this->id'";
        $query = getDbConnection()->prepare($sql);
        return $query->execute();
    }

    public static function findCategory($categoryid) {
        $query = getDbConnection()->prepare("SELECT * FROM Categories WHERE id = '$categoryid'");
        if ($query->execute()) {
            $result = build($query->fetchObject());
            return $result;
        } else {
            return NULL;
        }
    }

    /* Category specific setters and getters */
    
    private function setParent($p) {
        $this->parent_id = $p;
    }

    private function setPriority($p) {
        $this->priority_id = $p;
    }

    public function getParent() {
        return $this->parent_id;
    }

    public function getPriority() {
        return $this->priority_id;
    }

}

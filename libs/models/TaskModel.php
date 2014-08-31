<?php

include 'Model.php';

Class Task extends Model {

    private $category;
    private $priority;
    private $categoryName;
    private $priorityName;
    private $deadline;

    public function __construct() {
        
    }

    public static function build($result) {
        $new = new Task();
        $new->builds($result);
        $new->setPriority($result->priority_id);
        $new->setCategory($result->category_id);
        $new->setDeadline($result->deadline);
        return $new;
    }

    public function update() {
        $sql = "UPDATE Tasks SET name = ?, description = ?, category_id = ?, priority_id = ?, deadline = ? WHERE id = ?";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute($this->getName(), $this->getDescription(), $this->getId());
        if ($ok) {
            $this->id = $query->fetchColumn();
            return $ok;
        }
    }

    public function delete() {
        $sql = "DELETE from Tasks WHERE id = '$this->id'";
        $query = getDbConnection()->prepare($sql);
        return $query->execute();
    }

    public static function getUserTasks($userid) {
        $query = getDbConnection()->prepare("SELECT * FROM Tasks WHERE user_id = '$userid'");
        $results = array();
        if ($query->execute()) {
            foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
                $results[] = Task::build($result);
            }
            return $results;
        } else {
            return NULL;
        }
    }

    public static function findTask($taskid) {
        $query = getDbConnection()->prepare("SELECT * FROM Tasks WHERE id = '$taskid'");
        if ($query->execute()) {
            $result = build($query->fetchColumn());
            return $result;
        } else {
            return NULL;
        }
    }

    public function insertIntoDb($userid) {
        $sql = "INSERT INTO Tasks(user_id, category_id, priority_id, name, description, deadline) VALUES(?,1,1,?,?,CURRENT_DATE) RETURNING id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($userid, $this->getName(), $this->getDescription()));
        if ($ok) {
            $this->id = $query->fetchColumn();
        }
        return $ok;
    }

    /* Task specific setters and getters */
    
    public function setCategory($c) {
        if (empty($c)) {
            
        } else {
            $this->category = trim($c);
        }
    }

    public function setPriority($p) {
        if (empty($p)) {
            
        } else {
            $this->priority = ($p);
        }
    }

    public function setDeadline($d) {
        if (empty($d)) {
            
        } else {
            $this->deadline = trim($d);
        }
    }

    public function getCategory() {
        $query = getDbConnection()->prepare("SELECT * FROM Categories WHERE id = '$this->category'");
        $return = $query->execute();
        return $return;
    }

    public function getPriority() {
        $query = getDbConnection()->prepare("SELECT * FROM Priorities WHERE id = '$this->priority'");
        $return = $query->execute();
        return $return;
    }

    public function getDeadline() {
        return $this->deadline;
    }


}

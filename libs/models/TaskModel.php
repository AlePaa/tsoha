<?php

require_once 'Model.php';

Class Task extends Model {

    private $priority;
    private $deadline;

    public function __construct() {
        
    }

    public static function build($result) {
        $new = new Task();
        $new->builds($result);
        $new->setPriority($result->priority_id);
        $new->setDeadline($result->deadline);
        return $new;
    }

    public function update() {
        $sql = "UPDATE Tasks SET name = ?, description = ?, priority_id = ?, deadline = ? WHERE id = ?";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($this->name, $this->description, $this->priority, $this->deadline, $this->id));
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
            $result = Task::build($query->fetchObject());
            return $result;
        } else {
            return NULL;
        }
    }

    public function insertIntoDb($userid) {
        $sql = "INSERT INTO Tasks(user_id, priority_id, name, description, deadline) VALUES(?,?,?,?,?) RETURNING id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($userid, $this->priority, $this->name, $this->description, $this->deadline));
        if ($ok) {
            $this->id = $query->fetchColumn();
        }
        return $ok;
    }

    /* Task specific setters and getters */

    public function setPriority($p) {
        $this->priority = $p;
    }

    public function setDeadline($d) {
        $this->deadline = trim($d);
    }

    public function getCategories() {
        $query = getDbConnection()->prepare("SELECT name FROM Categories WHERE id = '$this->category'");
        $query->execute();
        $return = $query->fetchColumn();
        return $return;
    }

    public function getPriority() {
        $query = getDbConnection()->prepare("SELECT name FROM Priorities WHERE id = '$this->priority'");
        $query->execute();
        $return = $query->fetchColumn();

        return $return;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    public function getTaskCategories() {
        /* Returns all Categories that are linked to this Task through the ctjuncts table */
        $sql = "SELECT * FROM Categories WHERE id IN(SELECT category_id from ctjuncts WHERE task_id = '$this->id')";
        $query = getDbConnection()->prepare($sql);
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

    public function addLink($category_id) {
        $sql = "INSERT INTO Ctjuncts(category_id, task_id) VALUES(?,?) RETURNING category_id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($category_id, $this->id));
        if ($ok) {
            $this->id = $query->fetchColumn();
        }
        return $ok;
    }

    public function removeLink($category_id) {
        $sql = "DELETE from Ctjuncts WHERE category_id = '$category_id' AND task_id = '$this->id'";
        $query = getDbConnection()->prepare($sql);
        return $query->execute();
    }

}

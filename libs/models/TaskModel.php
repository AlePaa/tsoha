<?php

Class Task {

    private $name;
    private $description;
    private $id;
    private $userid;
    private $category;
    private $priority;
    private $deadline;
    private $errors = array();

    public function __construct() {
        
    }

    public static function getUserTasks($userid) {
        $connection = getDbConnection();
        $query = $connection->prepare("SELECT * FROM Tasks WHERE user_id = '$userid'");
        $results = array();
        if ($query->execute()) {
            foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
                $results[] = Task::buildTask($result);
            }
            return $results;
        } else {
            return NULL;
        }
    }

    public static function findTask($taskid) {
        $connection = getDbConnection();
        $query = $connection->prepare("SELECT * FROM Tasks WHERE id = '$taskid'");
        if ($query->execute()) {
            $result = $query->fetchColumn();
            $task = Task::buildTask($result);
            return $task;
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

    public function update() {
        $sql = "UPDATE Tasks SET name = ?, description = ? WHERE id = ?";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute($this->getName(), $this->getDescription(), $this->getId());
        if ($ok) {
            $this->id = $query->fetchColumn();
        }return $ok;
    }

    public function setName($n) {
        $this->name = $n;
        if (trim($this->name == '')) {
            $this->errors['name'] = 'name field must not be empty!';
        } else {
            unset($this->errors['name']);
        }
    }

    public function setDescription($d) {
        $this->description = $d;
    }

    public function setCategory($c) {
        $this->category = $c;
    }

    public function setPriority($p) {
        $this->priority = $p;
    }

    public function setDeadline($d) {
        $this->deadline = $d;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function getDeadline() {
        return $this->deadline;
    }

    private function setId($id) {
        $this->id = $id;
    }

    private function setUserid($usr) {
        $this->userid = $usr;
    }

    public function isValid() {
        return empty($errors);
    }

    public function isOwner($userid) {
        return ($userid == $this->userid);
    }

    private static function buildTask($result) {
        $task = new Task();
        $task->setId($result->id);
        $task->setUserid($result->user_id);
        $task->setName($result->name);
        $task->setDescription($result->description);
        $task->setPriority($result->priority_id);
        return $task;
    }

}

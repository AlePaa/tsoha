<?php

/* Parent class for the data models Task, Category, Priority */

class Model {

    private $userid;
    public $id;
    public $name;
    public $description;
    public $errors = array();

    public function builds($result) {
        $this->setId($result->id);
        $this->setUserId($result->user_id);
        $this->setName($result->name);
        $this->setDescription($result->description);
    }

    /* Generic setters and getters */

    private function setId($i) {
        $this->id = $i;
    }

    private function setUserId($u) {
        $this->userid = $u;
    }

    public function setName($n) {
        $newname = trim($n);
        if ($newname === '') {
            $this->errors['notify'] = 'name field must not be empty!';
        } else {
            unset($this->errors['name']);
            $this->name = $newname;
        }
    }

    public function setDescription($d) {
        $this->description = $d;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    /* Generic input validation and error checking */

    public function isValid() {
        return empty($this->errors);
    }

    public function getErrors() {
        return $this->errors;
    }

    public function isOwner($userid, $id) {
        return ($id == $this->id && $userid == $this->getUserId());
    }

}

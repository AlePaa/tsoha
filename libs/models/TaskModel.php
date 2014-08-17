<?php

Class Task {

    private $name;
    private $description;
    private $priority;

    public function __construct($n, $d, $p) {
        $this->name = $n;
        $this->description = $d;
        $this->priority = $p;
    }

    public function getTaskList() {
        return array("Tee jotain!" => new Task("Ka", "Nyt on tosi kyseessä!"),
            "Arrgh!" => new Task("Hu", "YEAARRGH"));
    }

    public function getTask($taskname) {
        return getTaskList()[$taskname];
    }

    public function setName($n) {
        $this->name = $n;
    }

    public function setDescription($d) {
        $this->description = $d;
    }

    public function setPriority($p) {
        $this->priority = $p;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPriority() {
        
    }

}

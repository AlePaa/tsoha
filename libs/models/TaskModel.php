<?php

Class Task {

    private $userid;
    private $name;
    private $id;
    private $description;

    public function __construct($name, $desc) {
        $this->name = $name;
        $this->description = $desc;
    }

    public function getTaskList() {
        return array("Tee jotain!" => new Task("Ka", "Nyt on tosi kyseessä!"),
            "Arrgh!" => new Task("Hu", "YEAARRGH"));
    }

    public function getTask($taskname) {
        return getTaskList()[$taskname];
    }

}

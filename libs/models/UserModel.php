<?php

class User {

    private $id;
    private $nick;
    private $password;

    public function __construct($id, $nick, $password) {
        $this->id = $id;
        $this->nick = $nick;
        $this->password = $password;
    }

    public function verifyLogin() {
        if ($this->nick == "pleishouldaa" && $this->pword == "juttu") {
            return true;
        } else {
            return false;
        }
    }

    public static function getAllUsers() {
        $sql = "SELECT id, nick, password FROM Users";
        $query = getDbConnection()->prepare($sql);
        $query->execute();

        $results = array();
        foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $user = new User();
            $user->setId($result->id);
            $user->setNick($result->nick);
            $user->setPassword($result->password);

            //$array[] = $muuttuja; lisää muuttujan arrayn perään. 
            //Se vastaa melko suoraan ArrayList:in add-metodia.
            $results[] = $user;
        }
        return $results;
    }

    private function setId($i) {
        $this->id = $i;
    }

    private function setNick($n) {
        $this->nick = $n;
    }

    private function setPassword($p) {
        $this->password = $p;
    }

    public function getNick() {
        return $this->nick;
    }

}

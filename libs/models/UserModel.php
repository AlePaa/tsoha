<?php

class User {

    private $id;
    private $username;
    private $password;

    public function __construct($id, $u, $p) {
        $this->id = $id;
        $this->username = $u;
        $this->password = $p;
    }

    public function insertIntoDb() {
        $sql = "INSERT INTO Users(id, nick, password) VALUES(?,?,?) RETURNING id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($this->id, $this->username, $this->password));
        if ($ok) {
            $this->id = $query->fetchColumn();
        }
        return $ok;
    }

    public static function verifyLogin($u, $p) {
        $connection = getDbConnection();
        $query = $connection->prepare('SELECT id FROM Users WHERE nick = ? AND password = ?');

        if ($query->execute(array($u, $p))) {
            return $query->fetchColumn();
        } else {
            return null;
        }
    }

    public static function getAllUsers() {

        $sql = "SELECT id, nick, password FROM Users";
        $query = getDbConnection()->prepare($sql);
        $query->execute();

        $results = array();
        foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
            $results[] = new User($result->id, $result->nick, $result->password);
        }
        return $results;
    }

    private function setId($i) {
        $this->id = $i;
    }

    private function setUsername($n) {
        $this->username = $n;
    }

    private function setPassword($p) {
        $this->password = $p;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getId() {
        return $this->id;
    }

}

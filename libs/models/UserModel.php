<?php

class User {

    private $id;
    private $username;
    private $password;

    public function insertIntoDb() {
        $sql = "INSERT INTO Users(nick, password) VALUES(?,?) RETURNING id";
        $query = getDbConnection()->prepare($sql);
        $ok = $query->execute(array($this->username, $this->password));
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
            $user = new User();
            $user->setId($result->id);
            $user->setUsername($result->nick);
            $user->setPassword($result->password);
            $results[] = $user;
        }
        return $results;
    }

    public static function delete($id) {
        $sql = "DELETE from Users WHERE id = '$id'";
        $query = getDbConnection()->prepare($sql);
        return $query->execute();
    }

    public static function exists($name) {
        $sql = "SELECT exists(SELECT 1 from Users WHERE nick = $name LIMIT 1)";
        $query = getDbConnection()->prepare($sql);
        $exists = $query->execute();
        return $exists;
    }

    private function setId($i) {
        $this->id = $i;
    }

    public function setUsername($n) {
        $this->username = $n;
    }

    public function setPassword($p) {
        $this->password = $p;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getId() {
        return $this->id;
    }

}

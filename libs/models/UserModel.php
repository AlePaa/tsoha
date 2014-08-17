<?php

class User {

    private $id;
    private $username;
    private $password;

    public function __construct(int $id, string $u, string $p) {
        $this->id = $id;
        $this->username = $u;
        $this->password = $p;
    }

    public static function verifyLogin($u, $p) {
        $connection = getDbConnection();
        $query = $connection->prepare('SELECT id FROM Users WHERE nick = ? AND password = ?');

        if ($query->execute($u, $p)) {
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
            $user->setNick($result->nick);
            $user->setPassword($result->password);

            $results[] = $user;
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

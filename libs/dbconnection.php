<?php

function getDbConnection() {
    static $connection = NULL;

    if ($connection == NULL) {
        $connection = new PDO('pgsql:');
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return $connection;
}

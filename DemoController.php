<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once "libs/dbconnection.php";
require_once "libs/models/UserModel.php";

//Lista asioista array-tietotyyppiin laitettuna:
$list = User::getAllUsers();

?><!DOCTYPE HTML>
<html>
    <head><title>Usernames</title></head>
    <body>
        <h1>List element</h1>
        <ul>
            <?php foreach ($list as $object) { ?>
                <li><?php echo $object->getUsername(); ?></li>
            <?php } ?>
        </ul>
    </body>
</html>
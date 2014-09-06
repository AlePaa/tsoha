<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/CategoryModel.php';

$newcategory = new Category();
$newcategory->setName($_POST['name']);
$newcategory->setDescription($_POST['description']);
$newcategory->setPriority($_POST['priority']);

if ($newcategory->isValid()) {
    $newcategory->insertIntoDb($_SESSION['logged']);
    redirect('categories.php');
} else {
    showView('categoryform', $newTask->getErrors());
}
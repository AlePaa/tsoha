<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/PriorityModel.php';

$newpriority = new Priority();
$newpriority->setName($_POST['name']);
$newpriority->setDescription($_POST['description']);
$newpriority->setPriovalue($_POST['priovalue']);

if ($newpriority->isValid()) {
    $newpriority->insertIntoDb($_SESSION['logged']);
    redirect('priorities.php');
} else {
    showView('priorityform', $newTask->getErrors());
}
<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/PriorityModel.php';

$prioid = $_GET['id'];

if (!is_numeric($prioid)) {
    notFound();
} else {
    $priority = Priority::findPriority($prioid);
}

if (!$priority == NULL && $priority->isOwner($_SESSION['logged'], $prioid)) {
    showView('priorityform', array('title' => 'Edit Priority',
        'priority' => $priority,
        'function' => "priorityupdate.php?id=$prioid",
        'name' => htmlspecialchars($priority->getName()),
        'desc' => htmlspecialchars($priority->getDescription()),
        'priovalue' => htmlspecialchars($priority->getPriovalue()),
        'header' => 'Editing Priority',
        'button' => 'Update'));
} else {
    notFound();
}

function notFound() {
    showView("priorities", array('notify' => "Priority not found"));
}

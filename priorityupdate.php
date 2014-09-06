<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/PriorityModel.php';

$id = (int) $_GET['id'];

$priority = Priority::findPriority($id);

if ($priority == NULL) {
    showView('');
} else if (!$priority->isOwner($user, $id)) {
    
} else {
    $priority->setName($_POST['name']);
    $priority->setDescription($_POST['description']);
    $priority->setPriovalue($_POST['priovalue']);

    if ($priority->isValid()) {
        $priority->update();
        redirect('priorities.php');
    }
}
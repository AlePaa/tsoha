<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/PriorityModel.php';


if (isset($_GET['list'])) {
    $priorities = Priority::getUserPriorities($user);
    showView('prioritiesview', array('title' => "Priorities", 'priorities' => $priorities));
} else if (isset($_GET['new'])) {
    showView('priorityform', array('title' => 'Create new Priority',
        'function' => 'prioritycreate.php',
        'name' => '',
        'desc' => '',
        'priovalue' => '0',
        'header' => 'Create New Priority',
        'button' => 'Create'));
} else if (isset($_GET['create'])) {
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
} else if (isset($_GET['edit'])) {
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

} else if (isset($_GET['update'])) {
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
} else if (isset($_GET['delete'])) {
    $prioid = $_GET['id'];

    $priority = Priority::findPriority($prioid);

    if ($priority->isOwner($_SESSION['logged'])) {
        $priority->delete();
        redirect('priorities.php');
    } else {
        redirect('priorities.php');
    }
}
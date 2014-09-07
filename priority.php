<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/PriorityModel.php';


if (isset($_GET['list'])) {
    listPriorities($user);
} else if (isset($_GET['new'])) {
    newPriority();
} else if (isset($_GET['create'])) {
    createPriority();
} else if (isset($_GET['edit'])) {
    editPriority();
} else if (isset($_GET['update'])) {
    updatePriority($user);
} else if (isset($_GET['delete'])) {
    deletePriority();
}

function listPriorities($user) {
    $priorities = Priority::getUserPriorities($user);
    showView('prioritiesview', array('title' => "Priorities", 'priorities' => $priorities));
}

function newPriority() {
    showView('priorityform', array('title' => 'Create new Priority',
        'function' => 'priority.php?create',
        'name' => '',
        'desc' => '',
        'priovalue' => '0',
        'header' => 'Create New Priority',
        'button' => 'Create'));
}

function createPriority() {
    $newpriority = new Priority();
    $newpriority->setName(s($_POST['name']));
    $newpriority->setDescription(s($_POST['description']));
    $newpriority->setPriovalue(s($_POST['priovalue']));

    if ($newpriority->isValid()) {
        $newpriority->insertIntoDb($_SESSION['logged']);
        redirect('priority.php?list');
    } else {
        redirect('priority.php?new');
    }
}

function editPriority() {
    $prioid = $_GET['id'];

    if (!is_numeric($prioid)) {
        notFound();
    } else {
        $priority = Priority::findPriority($prioid);
    }

    if (!$priority == NULL && $priority->isOwner($_SESSION['logged'], $prioid)) {
        showView('priorityform', array('title' => 'Edit Priority',
            'priority' => $priority,
            'function' => "priority.php?update&id=$prioid",
            'name' => s($priority->getName()),
            'desc' => s($priority->getDescription()),
            'priovalue' => s($priority->getPriovalue()),
            'header' => 'Editing Priority',
            'button' => 'Update'));
    } else {
        notFound();
    }
}

function updatePriority($user) {
    $id = (int) $_GET['id'];

    $priority = Priority::findPriority($id);

    if ($priority == NULL || !$priority->isOwner($user, $id)) {
        redirect('priority.php?list');
    } else {
        $priority->setName(s($_POST['name']));
        $priority->setDescription(s($_POST['description']));
        $priority->setPriovalue(s($_POST['priovalue']));

        if ($priority->isValid()) {
            $priority->update();
            redirect('priority.php?list');
        } else {
            redirect('priority.php?list');
        }
    }
}

function deletePriority() {
    $prioid = $_GET['id'];

    $priority = Priority::findPriority($prioid);

    if ($priority->isOwner($_SESSION['logged'])) {
        $priority->delete();
        redirect('priority.php?list');
    } else {
        redirect('priority.php?list');
    }
}

function notFound() {
    redirect('priority.php?list');
}

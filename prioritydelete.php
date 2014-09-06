<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/PriorityModel.php';

$prioid = $_GET['id'];

$priority = Priority::findPriority($prioid);

if ($priority->isOwner($_SESSION['logged'])) {
    $priority->delete();
    redirect('priorities.php');
} else {
    redirect('priorities.php');
}
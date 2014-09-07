<?php

require_once 'libs/common.php';
require_once 'libs/session.php';

// Doesn't allow access to login page if a session is active
if (checkLogin()) {
    redirect('task.php?list');
} else {
    showView('loginview', array('title' => 'login to Muistilista'));
}
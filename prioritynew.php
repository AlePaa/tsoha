<?php

require_once 'libs/common.php';
require_once 'libs/session.php';

showView('priorityform', array('title' => 'Create new Priority',
    'function' => 'prioritycreate.php',
    'name' => '',
    'desc' => '',
    'priovalue' => '0',
    'header' => 'Create New Priority',
    'button' => 'Create'));

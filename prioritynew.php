<?php

require_once 'libs/common.php';
require_once 'libs/session.php';

showView('priorityform', array('title' => 'Create new Priority',
    'function' => 'prioritycreate.php',
    'name' => '',
    'desc' => '',
    'add' => '',
    'header' => 'Create New Task'));
<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/PriorityModel.php';

$priorities = Priority::getUserPriorities($user);
showView('prioritiesview', array('title' => "Priorities", 'priorities' => $priorities));

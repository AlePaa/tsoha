<?php

/* Used by all pages that need the user to be logged in
 * If there's no active session, redirect to start page 
 */
if (!checklogin()) {
    showView('loginview', array('notify' => "Need to be logged in to access service"));
    exit();
} else {
    $user = $_SESSION['logged'];
}

function checkLogin() {
    if (isset($_SESSION['logged'])) {
        return true;
    } else {
        return false;
    }
}

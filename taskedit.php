<?php

if (checkLogin()) {
    $user = $_SESSION['logged'];
    showView('taskeditview');
} else {
    redirect('index.php?nologin');
}
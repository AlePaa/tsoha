<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
include 'libs/models/CategoryModel.php';

$categoryid = $_GET['id'];

$category = Category::findCategory($categoryid);

if ($category->isOwner($_SESSION['logged'])) {
    $category->delete();
    redirect('categories.php');
} else {
    redirect('categories.php');
}
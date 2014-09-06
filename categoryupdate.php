<?php

require_once 'libs/common.php';
require_once 'libs/session.php';
require_once 'libs/models/CategoryModel.php';

$id = (int) $_GET['id'];

$category = Category::findCategory($id);

if ($category == NULL) {
    showView('');
} else if (!$category->isOwner($user, $id)) {
    
} else {
    $category->setName($_POST['name']);
    $category->setDescription($_POST['description']);

    if ($category->isValid()) {
        $category->update();
        redirect('categories.php');
    }
}
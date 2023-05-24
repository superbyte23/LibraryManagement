<?php
include '../../../bootstrapper.php';  
$this_controller = "book_controller.php";
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  case 'create':
    $pagetitle = "Add New Book"; 
    $content = "create.php";
    break;
  case 'edit':
    $data = $book->edit($_GET['id']);
    $pagetitle = "Edit Book";
    $content = "edit.php";
    break;
  case 'isbn':
    $book_info = $book->edit($_GET['id']);
    $data = $isbn->get_by_book_id($_GET['id']);
    $pagetitle = "List of Books by ISBN : ". $book_info->title;
    $content = "isbn.php";
    break; 
  case 'inventory':
    $pagetitle = "Add New Book"; 
    $content = "inventory.php";
    break;
  default: 
    $books = $book->all();
    $pagetitle = "Books";
    $content = "main.php";
    break;
}
include APPROOT.'/layout/template.php'; 

?>
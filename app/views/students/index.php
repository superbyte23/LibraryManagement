<?php
include '../../../bootstrapper.php';  
$this_controller = "student_controller.php";
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) {
  case 'create':
    $pagetitle = "Add New Student"; 
    $content = "create.php";
    break;
  case 'edit':
    $data = $student->student_info($_GET['id']);
    $pagetitle = "Edit Student";
    $content = "edit.php";
    break; 
  case 'inventory':
    $pagetitle = "Add New Student"; 
    $content = "inventory.php";
    break;
  default: 
    $datas = $student->all();
    $pagetitle = "Students";
    $content = "main.php";
    break;
}
include APPROOT.'/layout/template.php'; 

?>
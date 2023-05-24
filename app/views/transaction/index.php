<?php
include '../../../bootstrapper.php';  
$this_controller = "transaction_controller.php";
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

  case 'borrows':
    if (isset($_GET['status'])) {
      $transactions = $borrow->filter_by_status($_GET['status']);
    }else{
      $transactions = $borrow->all();
    }
    
    $pagetitle = "Transactions"; 
    $content = "borrows.php";
    break;
  case 'borrowDetails':
    $transaction = $borrow->get_by_id($_GET['borrow_id']);
    $transactions_details = $borrowDetails->get_by_borrow_id($_GET['borrow_id']);
    $pagetitle = "Tranasaction Details"; 
    $content = "borrow_details.php";
    break;
    
  case 'inventory':
    $pagetitle = "Add New Book"; 
    $content = "inventory.php";
    break;

  case 'returnbooks': 
    $pagetitle = "Return Books"; 
    $content = "returnbooks.php";
    break;

  case 'scanner':
    $pagetitle = "Scan Qr Code";
    if (isset($_GET['student'])) {
      $content = "qrscanner.php";
    }else{
      $content = null;
    }
    break;
  default: 
    $pagetitle = "Add New Transaction"; 
    $content = "search_student.php";
    break;
}
include APPROOT.'/layout/template.php'; 

?>
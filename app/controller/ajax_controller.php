<?php
include '../../bootstrapper.php';  
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'add_book_to_borrow':
		if (!isset($_SESSION['to_process'])) { $_SESSION['to_process'] = array(); } 
		$borrow_id = $borrow->get_last_id();
		if (!$borrow_id) {
			$borrow_id = 1;
		}
		$sql = "SELECT * FROM `isbn` LEFT JOIN books ON isbn.book_id = books.id WHERE isbn.isbn = ".$_POST['qrcode'];
		$result = $db->setQuery($sql); 
		$book = $db->result(); 
		if ($db->rowCount() > 0) {
			array_push($_SESSION['to_process'], $book);
		} 
		$_SESSION['to_process'] = array_values($_SESSION['to_process']);	
		echo json_encode($_SESSION['to_process']); 
		break;
	case 'remove_item':
		$index = $_POST['id'];
		unset($_SESSION['to_process'][$index]); 
		$_SESSION['to_process'] = array_values($_SESSION['to_process']); 
		echo json_encode($_SESSION['to_process']);  
		break; 
	case 'find_transaction': 
		$transaction = $borrow->get_by_id($_POST['code']);
		if ($transaction) {
			$result = array('found' => true);
			array_push($result, $transaction);
		}else{
			$result = array('found' => false);
		} 
		echo json_encode($result); 
		break; 
	case 'search_student':
		$filter = "%".$_POST['student_name']."%";
		$sql = 'SELECT * FROM `students` WHERE CONCAT(`first_name`, `middle_name`, `last_name`) LIKE "'.$filter.'"';
		$db->setQuery($sql);
		echo json_encode($db->results_obj());
		break; 
	default:
		// code...
		break;
}   

?>
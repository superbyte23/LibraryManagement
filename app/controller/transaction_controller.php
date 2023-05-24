<?php
include '../../bootstrapper.php'; 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'add_transaction': 
		$book->title = $_POST['title']; 
		$book->author = $_POST['author'];
		$book->publisher = $_POST['publisher'];
		$book->year_published = $_POST['year_published'];
		if ($book->save()) { 
			msgbox('success', 'Success!', 'New Book added successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'No user is added successfully!'); 
		}
		header('location: '.URLROOT.'/app/views/books');
		break;

	case 'perform_transaction':  
		if(isset($_POST['btn_cancel'])) {
			unset($_SESSION['to_process']);
			header('location: '.URLROOT.'/app/views/transaction?view=borrows');
		}else{ 
			$borrow->student_id = $_POST['student_id'];
			$borrow->status = "Borrowed";
			$borrow->save();
			$transaction_id = $borrow->get_last_id();
			foreach ($_SESSION['to_process'] as $key => $item) {
				$borrowDetails->borrow_id = $transaction_id->id;
				$borrowDetails->book_id = $item->book_id;
				$borrowDetails->isbn = $item->isbn;
				$borrowDetails->student_id = $_POST['student_id'];
				$borrowDetails->save(); 
			}
			unset($_SESSION['to_process']);
			header('location: '.URLROOT.'/app/views/transaction?view=borrows');
		}
		
		break;

	case 'return_books':  
		$dateTime = new DateTime(); // Create a new DateTime object with the current date and time
		$currentDateTime = $dateTime->format('Y-m-d H:i:s'); // Current date and time in the format: YYYY-MM-DD HH:MM:SS
		$borrow->status = 'Returned';
		$borrow->date_returned = $currentDateTime;
		$borrow->update($_POST['borrow_id']);
		header('location: '.URLROOT.'/app/views/transaction/?view=borrows');
		break;

	case 'delete_transaction':  
		 
		$borrow->delete($_POST['id']);
		$borrowDetails->delete_by_borrow_id($_POST['id']);
		header('location: '.URLROOT.'/app/views/transaction/?view=borrows');
		break;

	case 'edit': 
		csrf_token(); 
		$book->title = $_POST['title']; 
		$book->author = $_POST['author'];
		$book->publisher = $_POST['publisher'];
		$book->year_published = $_POST['year_published']; 
		if ($book->update($_POST['id'])) { 
			msgbox('success', 'Success!', 'Book updated successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'No user is updated successfully!'); 
		} 
		header('location: '.URLROOT.'/app/views/books');
		break;

	case 'destroy':
		csrf_token(); 
		if ($user->delete($_POST['id'])) { 
			msgbox('success', 'Success!', 'Book deleted successfully!');
		}else{
			msgbox('danger', 'Error in performing a task!', 'No user is deleted successfully!'); 
		}
		header('location: '.URLROOT.'/app/views/books');
		break;  
	default:
		// code...
		break;
}   

?>
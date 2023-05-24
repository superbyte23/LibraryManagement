<?php
include '../../bootstrapper.php'; 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) { 
	case 'add':
		csrf_token(); 
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

	case 'add_isbn': 
		foreach ($_POST['isbn'] as $key => $isbn_value) {
			$isbn->book_id = $_POST['id'];
			$isbn->isbn = $isbn_value;
			$isbn->location = "Library";
			$isbn->save();
		} 
		header('location: '.URLROOT.'/app/views/books/?view=isbn&id='.$_POST['id']);

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
		if ($book->delete($_POST['id'])) { 
			msgbox('success', 'Success!', 'Book deleted successfully!');
		}else{
			msgbox('danger', 'Error in performing a task!', 'No user is deleted successfully!'); 
		}
		header('location: '.URLROOT.'/app/views/books');
		break;
	case 'delete_isbn':
		// csrf_token(); 
		if ($isbn->delete($_POST['id'])) { 
			msgbox('success', 'Success!', 'Book deleted successfully!');
		}else{
			msgbox('danger', 'Error in performing a task!', 'No user is deleted successfully!'); 
		}
		header('location: '.URLROOT.'/app/views/books/?view=isbn&id='.$_POST['book_id']);
		break;
	
	default:
		// code...
		break;
}   

?>
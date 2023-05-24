<?php
include '../../bootstrapper.php'; 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'add':
		csrf_token(); 
		$student->first_name = $_POST['first_name'];
		$student->middle_name = $_POST['middle_name'];
		$student->last_name = $_POST['last_name'];
		$student->grade_level = $_POST['grade_level'];
		$student->strand = $_POST['strand'];
		$student->section = $_POST['section'];
		$student->mobile = $_POST['mobile'];
		$student->email = $_POST['email']; 
		if ($student->save()) { 
			msgbox('success', 'Success!', 'New Student added successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'Please try again!'); 
		}
		header('location: '.URLROOT.'/app/views/students');
		break;

	case 'edit': 
		csrf_token(); 
		$student->first_name = $_POST['first_name'];
		$student->middle_name = $_POST['middle_name'];
		$student->last_name = $_POST['last_name'];
		$student->grade_level = $_POST['grade_level'];
		$student->strand = $_POST['strand'];
		$student->section = $_POST['section'];
		$student->mobile = $_POST['mobile'];
		$student->email = $_POST['email']; 
		if ($student->update($_POST['id'])) { 
			msgbox('success', 'Success!', 'Student updated successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'Please try again!'); 
		} 
		header('location: '.URLROOT.'/app/views/students');
		break;

	case 'destroy':
		csrf_token(); 
		if ($student->delete($_POST['id'])) { 
			msgbox('success', 'Success!', 'Student deleted successfully!');
		}else{
			msgbox('danger', 'Error in performing a task!', 'Please try again!'); 
		}
		header('location: '.URLROOT.'/app/views/students');
		break;  
	default:
		// code...
		break;
}   

?>
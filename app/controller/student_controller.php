<?php
include '../../bootstrapper.php'; 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'add': 
		$user->fullname = $_POST['first_name'].' '.$_POST['middle_name'].' '.$_POST['last_name'];
		$user->username = $_POST['lrn_no'];
		$user->password = $_POST['password'];
		$user->email = $_POST['email'];
		$user->phone_number = $_POST['phone_number']; 
		$user->usertype = 'student'; 
		$user->save();

		$user_id = $db->insert_id();  
		// add student
	 
		$student->lrn_no = $_POST['lrn_no'];
		$student->first_name = $_POST['first_name'];
		$student->middle_name = $_POST['middle_name'];
		$student->last_name = $_POST['last_name'];
		$student->grade_level = $_POST['grade_level'];
		$student->strand = $_POST['strand'];
		$student->section = $_POST['section'];
		$student->mobile = $_POST['mobile'];
		$student->email = $_POST['email']; 
		$student->user_id = $user_id; 
		if ($student->save()) { 
			msgbox('success', 'Success!', 'New Student added successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'Please try again!'); 
		}
		header('location: '.URLROOT.'/app/views/students');
		break;

	case 'register':

		$user->fullname = $_POST['first_name'].' '.$_POST['middle_name'].' '.$_POST['last_name'];
		$user->username = $_POST['lrn_no'];
		$user->password = $_POST['password'];
		$user->email = $_POST['email'];
		$user->phone_number = $_POST['phone_number']; 
		$user->usertype = 'student'; 
		$user->save();

		$user_id = $db->insert_id();  
		// add student
	 
		$student->lrn_no = $_POST['lrn_no'];
		$student->first_name = $_POST['first_name'];
		$student->middle_name = $_POST['middle_name'];
		$student->last_name = $_POST['last_name'];
		$student->grade_level = $_POST['grade_level'];
		$student->strand = $_POST['strand'];
		$student->section = $_POST['section'];
		$student->mobile = $_POST['mobile'];
		$student->email = $_POST['email']; 
		$student->user_id = $user_id; 
		if ($student->save()) { 
			msgbox('success', 'Success!', 'New Student added successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'Please try again!'); 
		}
		$_SESSION['success_register'] = "successfully registered! Please login";
		header('location: '.URLROOT.'/app');
		break;

	case 'edit':
		 
		// find if user exist 
		if ($_POST['user_id'] <= 0) {
			// generate new user if not exist
			$user->fullname = $_POST['first_name'].' '.$_POST['middle_name'].' '.$_POST['last_name'];
			$user->username = $_POST['lrn_no'];
			$user->password = $_POST['password'];
			$user->email = $_POST['email'];
			$user->phone_number = $_POST['phone_number']; 
			$user->usertype = 'student'; 
			$user->save();  
			// new user_id
			$user_id = $db->insert_id();  
		}else{
			// update existing account
			$user_id = $_POST['user_id'];

			$user->fullname = $_POST['first_name'].' '.$_POST['middle_name'].' '.$_POST['last_name'];
			$user->username = $_POST['lrn_no'];
			$user->password = $_POST['password'];
			$user->email = $_POST['email'];
			$user->phone_number = $_POST['phone_number']; 
			$user->usertype = 'student'; 
			$user->update($user_id);  
		}
		
		$student->lrn_no = $_POST['lrn_no'];
		$student->first_name = $_POST['first_name'];
		$student->middle_name = $_POST['middle_name'];
		$student->last_name = $_POST['last_name'];
		$student->grade_level = $_POST['grade_level'];
		$student->strand = $_POST['strand'];
		$student->section = $_POST['section'];
		$student->mobile = $_POST['mobile'];
		$student->email = $_POST['email'];
		$student->user_id = $user_id;  

		if ($student->update($_POST['id'])) { 
			msgbox('success', 'Success!', 'Student updated successfully.');
		}else{
			msgbox('danger', 'Error in performing a task!', 'Please try again!'); 
		} 
		header('location: '.URLROOT.'/app/views/students');
		break;

	case 'destroy':
	 
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
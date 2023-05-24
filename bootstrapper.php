<?php  
	
	require_once 'app/config/config.php';
	include 'app/config/database.php';
	$db = new DB;  
	// Autoload Class 
	spl_autoload_register(function ($class_name) {
	    include APPROOT.'/model/'.$class_name . '.php';
	});
 	

	// helpers  
	require_once APPROOT.'/helpers/icons.php';
	require_once APPROOT.'/helpers/session.php';
	require_once APPROOT.'/helpers/functions.php';
	
	$user = new User($db);
	$book = new Book($db);
	$student = new Student($db);
	$isbn = new Isbn($db);
	$borrow = new Borrow($db);
	$borrowDetails = new BorrowDetails($db);
	
?>
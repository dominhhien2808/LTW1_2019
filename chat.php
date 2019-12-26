<?php
	require_once 'init.php';
	require_once 'function.php';
	//xu ly logic o day
	$page = 'chat';
	$success = false;
	if(!$currentUser){
        header('Location: log-sin.php');
        exit(0);
	}

?>
<?php include 'header.php'; ?>
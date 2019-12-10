<?php
	require_once 'init.php';
	require_once 'function.php';
	if(!$currentUser)
    {
        header('Location: index.php');
        exit(0);
    }
    removeFriendRequest($currentUser['id'], $_POST['id']);
    header('Location: profile.php?id=' . $_POST['id']);
?>
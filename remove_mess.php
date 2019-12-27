<?php
	require_once 'init.php';
	require_once 'function.php';
	if(!$currentUser)
    {
        header('Location: index.php');
        exit(0);
    }
    removeChatBox($currentUser['id'], $_POST['id']);
    header('Location: listchat.php');
?>
<?php
	require_once 'init.php';
	require_once 'function.php';
	if(!$currentUser)
    {
        header('Location: index.php');
        exit(0);
    }
    sendFriendRequest($currentUser['id'], $_POST['id']);
    var_dump($currentUser);
    header('Location: profile.php?id=' . $_POST['id']);
?>
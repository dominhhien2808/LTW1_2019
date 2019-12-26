<?php
	require_once 'init.php';
	require_once 'function.php';
	if(!$currentUser)
    {
        header('Location: index.php');
        exit(0);
    }
 
// Khai báo các biến gán với dữ liệu nhận được
$body_msg = $_GET['body_msg'];
// Xử lý chuỗi $body_msg
$body_msg = htmlentities($body_msg);
// Nếu $body_msg khác rỗng
$user2 = $_GET['id'];
if ($body_msg != '') {
    // Thực thi gửi tin nhắn
    SendMessage($body_msg, $currentUser['id'], $user2);
}
?>
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
if ($body_msg != '') {
    // Thực thi gửi tin nhắn
    $user2 = 39;
    if ($currentUser['id'] == 39)
    {
        $user2 = 36;
    }
    SendMessage($body_msg, $currentUser['id'], $user2);
}
?>
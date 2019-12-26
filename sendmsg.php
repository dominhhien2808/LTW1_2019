<?php
	require_once 'init.php';
	require_once 'function.php';
	if(!$currentUser)
    {
        header('Location: index.php');
        exit(0);
    }
 
// Khai báo các biến gán với dữ liệu nhận được
$body_msg = @mysqli_real_escape_string($cn, $_POST['body_msg']);
// Xử lý chuỗi $body_msg
$body_msg = htmlentities($body_msg);
$body_msg = trim($body_msg);
 var_dump $body_msg;
// Nếu $body_msg khác rỗng
if ($body_msg != '') {
    // Thực thi gửi tin nhắn
   SendMessage($body_msg, $user, 28, $date_current);
}
?>
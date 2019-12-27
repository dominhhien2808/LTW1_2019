<?php
 
 require_once 'init.php';
 require_once 'function.php';
 if(!$currentUser)
 {
     header('Location: index.php');
     exit(0);
 }
 
 

// Lấy dữ liệu từ table messages theo thứ tự id_msg tăng dần
$user2 = $_GET['id'];
$kt = CheckChatBox($currentUser['id'], $user2);
if($kt)
{
        $result = GetMessage($currentUser['id'], $user2, $kt['idmsg']);
        if ($result)
        {
                // Dùng vòng lập foreach để lấy dữ liệu
                foreach ($result as $row) {
                // Thời gian gửi tin nhắn
                $date_sent = $row['date_sent'];
                $day_sent = substr($date_sent, 8, 2); // Ngày gửi
                $month_sent = substr($date_sent, 5, 2); // Thánh gửi
                $year_sent = substr($date_sent, 0, 4); // Năm gửi
                $hour_sent = substr($date_sent, 11, 2); // Giờ gửi
                $min_sent = substr($date_sent, 14, 2); // Phút gửi
                // Nếu người gửi là $user thì hiển thị khung tin nhắn màu xanh
                if ($row['user_from'] == $currentUser['id']) {
                echo '<div class="msg-user">
                                <p>' . $row['body'] . '</p>
                                <div class="info-msg-user">
                                        Bạn - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '
                                </div>
                        </div>';
                }
                // Ngược lại người gửi không phải là $user thì hiển thị khung tin nhắn màu xám
                else {
                $user_gest = findUserById($row['user_from']);
                echo '  <div class="msg">
                                <p>' . $row['body'] . '</p>
                                <div class="info-msg">
                                        ' . $user_gest['fullname'] . ' - ' . $day_sent . '/' . $month_sent . '/' . $year_sent . ' lúc ' . $hour_sent . ':' . $min_sent . '
                                </div>
                        </div>';
                        }
 
               }
       }
}
?>
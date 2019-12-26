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
<div class="main-chat">     
            </div><!-- div.main-chat -->
            <div class="box-chat">
                    <form method="POST" id="formSendMsg" onsubmit="return false;">
                            <input type="text" placeholder="Nhập nội dung tin nhắn ...">
                    </form><!-- form#formSendMsg -->
            </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

// Hàm gửi tin nhắn
function sendMsg() {
    // Khai ba1oca1c biến trong form
    $body_msg = $('#formSendMsg input[type="text"]').val();
 
    // Gửi dữ liệu
    $.ajax({
        url: 'sendmsg.php', // đường dẫn file xử lý
        type: 'POST', // phương thức
        // dữ liệu
        data: {
            body_msg: $body_msg
                    // thực thi khi gửi dữ liệu thành công
        }, success: function () {
            $('#formSendMsg input[type="text"]').val(''); // làm trống thanh trò chuyện
        }
    });
}
 
// Bắt sự kiện gõ phím enter trong thanh trò chuyện
$('#formSendMsg input[type="text"]').keypress(function () {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        // Chạy hàm gửi tin nhắn
        sendMsg();
    }
});
 
// Bắt sự kiện click vào thanh trò chuyện
$('#formSendMsg input[type="text"]').click(function (e) {
    // Kéo hết thanh cuộn trình duyệt đến cuối
    window.scrollBy(0, $(document).height());
});

$.ajaxSetup({cache:false});
// Thiết lập thời gian thực vòng lặp 1 giây
setInterval(function() {$('.main-chat').load('msglog.php');}, 1000);
</script>
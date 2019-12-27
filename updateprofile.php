<?php
	require_once 'init.php';
	require_once 'function.php';
	//xu ly logic o day
	$page = 'index';
	$posts = findAllPosts();
	if(!$currentUser)
    {
        header('Location: log-sin.php');
        exit(0);
    }
?>
<?php include 'header.php'; ?>



<?php if($currentUser): ?>				
		      	<li class="nav-item <?php echo $page === 'posts' ? 'active' :'' ?>">
		        <a class="nav-link" href="posts.php">Đăng trạng thái</a>
		      </li>
<?php endif; ?>
<div class="container">
	 <h1>Cập Nhập Thông Tin cho Tài Khoản:<?php echo $user['fullname']; ?></h1>
	<form id="contactform" name="contact" method="post" action="#">
  <p class="note"><span class="req"> <span class="req">*</span> Kiểm tra kĩ thông tin rồi mới Click Thay Đổi</p>
  <div class="row">
    <label for="name">Tên của bạn <span class="req">*</span></label>
    <input value="<?php echo $user['fullname']; ?>" type="text" name="name" id="name" class="txt" tabindex="1" placeholder="<?php echo $user['fullname']; ?>" required>
  </div>
 
  <div class="row">
    <label for="email">E-mail Address <span class="req">*</span></label>
    <input value="<?php echo $user['email']; ?>" type="email" name="email" id="email" class="txt" tabindex="2" placeholder="<?php echo $user['email']; ?>" required>
  </div>
 
  <div class="row">
    <label for="subject">Ngày Tháng Năm Sinh <span class="req">*</span></label>
    <input value="<?php echo $user['born']; ?>" type="text" name="subject" id="subject" class="txt" tabindex="3" >
  </div>
  
  <div class="row">
    <label for="subject">Trình Độ Học Vấn <span class="req">*</span></label>
    <input value="<?php echo $user['degree']; ?>" type="text" name="subject" id="subject" class="txt" tabindex="3" >
  </div>
 
  <div class="row">
    <label for="message">Chi Tiết bản thân </label>
    <textarea value="<?php echo $user['detail']; ?>" name="message" id="message" class="txtarea" tabindex="4" required></textarea>
  </div>

  <div class="center">
    <input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Thay Đổi thông tin  ">
  </div>
</form>
</div>
   

</body>




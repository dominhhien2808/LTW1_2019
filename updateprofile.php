<?php
	require_once 'init.php';
	require_once 'function.php';
	//xu ly logic o day
	$page = 'update_profile';
	$user = findUserById($currentUser['id']);



?>
<?php include 'header.php'; ?>



<?php if($currentUser): ?>				
		      	<li class="nav-item <?php echo $page === 'posts' ? 'active' :'' ?>">
		        <a class="nav-link" href="posts.php">Đăng trạng thái</a>
		      </li>
<?php endif; ?>
<div class="container">
	 <h1>Cập Nhập Thông Tin cho Tài Khoản:<?php echo $user['fullname']; ?></h1>
	<form id="contactform" name="contact" method="POST" action="change.php">
  <p class="note"><span class="req"> <span class="req">*</span> Kiểm tra kĩ thông tin rồi mới Click Thay Đổi</p>
  <div class="row">
    <label for="name">Tên của bạn <span class="req">*</span></label>
    <input value="<?php echo $user['fullname']; ?>" type="text" name="fullname" id="fullname" class="txt" tabindex="1" placeholder="<?php echo $user['fullname']; ?>" required>
  </div>
 
  <div class="row">
    <label for="email">E-mail Address <span class="req">*</span></label>
    <input value="<?php echo $user['email']; ?>" type="email" name="email" id="email" class="txt" tabindex="2" placeholder="<?php echo $user['email']; ?>" required>
  </div>
 
  <div class="row">
    <label for="subject">Ngày Tháng Năm Sinh <span class="req">*</span></label>
    <input value="<?php echo $user['born']; ?>" type="text" name="born" id="born" class="txt" tabindex="3" >
  </div>
  
  <div class="row">
    <label >Trình Độ Học Vấn <span class="req">*</span></label>
    <input value="<?php echo $user['degree']; ?>" type="text" name="degree" id="degree" class="txt" tabindex="3" >
  </div>
 
  <div class="row">
    <label >Chi Tiết bản thân </label>
     <input value="<?php echo $user['detail']; ?>" style="width: 500px"  type="text" name="detail" id="detail" class="txt" tabindex="4" >
  </div>

  <div class="center">
    <input type="submit"id="submitbtn" name="submitbtn" tabindex="5" value="Thay Đổi thông tin  ">
  </div>
</form>
</div>
   

</body>




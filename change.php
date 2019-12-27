
<?php
	require_once 'init.php';
	require_once 'function.php';
	//xu ly logic o day

	$page = 'update_profile';
	$page = 'index';
	$posts = findAllPosts();
	if(!$currentUser)
    {
        header('Location: log-sin.php');
        exit(0);
    }
    	$temp = (string) $currentUser['id'];
		$name = $_POST['fullname'];
		$email = $_POST['email'];
		$degree = $_POST['degree'];
		$detail = $_POST['detail'];

	

		// khởi tạo kết nối
$connect = mysqli_connect('localhost', 'root', '12345678', 'dack');
//Kiểm tra kết nối
if (!$connect) {
    die('kết nối không thành công ' . mysqli_connect_error());
}
//câu truy vấn
$sql = "UPDATE users SET fullname=N'$name', email = N'$email', degree=N'$degree', detail=N'$detail' WHERE id= '$temp' ";//kiểm tra
mysqli_query($connect, $sql);
   
mysqli_close($connect);
header('Location: index.php');

?>
<?php include 'header.php'; ?>

<?php if($currentUser): ?>				
		      	<li class="nav-item <?php echo $page === 'posts' ? 'active' :'' ?>">
		        <a class="nav-link" href="posts.php">Đăng trạng thái</a>
		      </li>
<?php endif; ?>


	



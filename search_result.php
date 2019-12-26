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
	<?php 
		
		if(isset($_GET['keyword']) && !empty($_GET['keyword']) ){
			echo "kết quả tìm kiếm cho :" . $_GET['keyword'];
			$s = trim(htmlspecialchars(addslashes($_GET['keyword'])));// lấy từ khóa từ ô search...
    	$db = new PDO('mysql:host=localhost;dbname=dack;charset=utf8', 'root', ''); 
   	 	$stmt = $db->prepare("SELECT * FROM users WHERE fullname LIKE '%$s%' or email LIKE '%$s%' ORDER BY id ");
    	$stmt->setFetchMode(PDO::FETCH_ASSOC);
    	$stmt->execute();
    	$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table width = '600' boder ='5' style='margin-top:40px'> ";
    echo " <h1 style='margin-top:40px'> Có Phải Bạn Đang Tìm Kiếm </h1>";
    echo "<tr>";
    echo"<td><u> Tên: </u></td> ";
	echo"<td><u> Email: </u> </td> ";
	echo"<td><u> id: </u> </td> ";
    echo "</tr>";
        $i = 0;
        foreach ($resultSet as $row) {
			if ($currentUser['id'] != $row['id'])
			{
				$ten = $row['fullname'];
        	$email = $row['email'];
			$id = $row['id'];
			echo "<tr>";
			echo" <td> <a href='profile.php?id=$id'> $ten </a> </td>";
			echo"<td> $email </td> ";
			echo" <td> $id </td>";
			echo "</tr>";
			$i++;
			}
        }
     echo "</table> "   ;
if($i == 0) {echo '<div> tìm kiếm không thành công </div>';}
		}

	?>

</body>




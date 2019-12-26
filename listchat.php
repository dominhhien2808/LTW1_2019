<?php
	require_once 'init.php';
	require_once 'function.php';
	//xu ly logic o day
	$page = 'index';
	$success = false;
	if(!$currentUser){
        header('Location: log-sin.php');
        exit(0);
	}

?>
<?php include 'header.php'; ?>
<?php 
    	$db = new PDO('mysql:host=localhost;dbname=dack;charset=utf8', 'root', ''); 
   	 	$stmt = $db->prepare("SELECT * FROM users ORDER BY id");
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
			echo" <td> <a href='chat.php?id=$id'> $ten </a> </td>";
			echo"<td> $email </td> ";
			echo" <td> $id </td>";
			echo "</tr>";
			$i++;
			}
        }
     echo "</table> "   ;

	?>

</body>
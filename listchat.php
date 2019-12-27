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
			$stmt = $db->prepare("SELECT user_from,user_to,date_sent 
			FROM messages m1 WHERE (user_from = ? or user_to = ?) and timediff(m1.date_sent, '2019-12-01 00:00:00') >= 
			ALL ( SELECT timediff(m2.date_sent, '2019-12-01 00:00:00') 
			FROM messages m2 WHERE (m2.user_from = m1.user_from and m2.user_to = m1.user_to) or (m2.user_from = m1.user_to and m2.user_to = m1.user_from)) 
			ORDER BY id_msg DESC");
    	$stmt->setFetchMode(PDO::FETCH_ASSOC);
    	$stmt->execute(array($currentUser['id'], $currentUser['id']));
    	$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<table width = '600' boder ='5' style='margin-top:40px'> ";
    echo " <h1 style='margin-top:40px'> Danh sách Chat của bạn </h1>";
    echo "<tr>";
    echo"<td><u> Tên: </u></td> ";
	echo"<td><u> Email: </u> </td> ";
	echo"<td><u> id: </u> </td> ";
	echo"<td><u> Ngày: </u> </td> ";
    echo "</tr>";
        $i = 0;
        foreach ($resultSet as $mes) {
			$row = findUserByID($mes['user_from']);
			if ($currentUser['id'] == $row['id'])
			{
				$row = findUserByID($mes['user_to']);
			}
				
			$ten = $row['fullname'];
        	$email = $row['email'];
			$id = $row['id'];
			echo "<tr>";
			echo" <td> <a href='chat.php?id=$id'> $ten </a> </td>";
			echo"<td> $email </td> ";
			echo" <td> $id </td>";
			echo"<td>"; echo $mes['date_sent']; echo"</td>";
			echo "</tr>";
			$i++;
        }
     echo "</table> "   ;

	?>

</body>
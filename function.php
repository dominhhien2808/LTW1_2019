<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
    function findUserById($id)
    {
        global $db;
        $stmt = $db -> prepare("SELECT * FROM users WHERE id=? LIMIT 1");
        $stmt ->execute(array($id));
        $user = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    function createUser($email, $fullName, $passwordHash){
        global $db;
        $stmt = $db -> prepare("INSERT INTO users(email, fullName, password, used) VALUES (? , ?, ?,0)");
        $stmt ->execute(array($email, $fullName, $passwordHash));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $db-> lastInsertId();
    }
    function findUserByEmail($email)
	{

		global $db;
		$stmt = $db -> prepare("SELECT * FROM users WHERE email=? LIMIT 1");
		$stmt ->execute(array($email));
		$user = $stmt -> fetch(PDO::FETCH_ASSOC);
		return $user;
    }
    function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
    function createActiveAccount($id){
        global $db;
		$secret = generateRandomString();
		$stmt = $db -> prepare("INSERT INTO active_account(userID, secretac) VALUES (? , ?)");
		$stmt ->execute(array($id, $secret));
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		return $secret;
    }
    function sendEmail($email, $receiver, $subject, $content)
	{
		$mail = new PHPMailer(true);  
		                          // Passing `true` enables exceptions
		//try {
			//Server settings
			//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'ltwweb1@gmail.com';                 // SMTP username
			$mail->Password = 'abc123XYZ~';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			//Recipients
			$mail->setFrom('ltwweb1@gmail.com', 'LTWeb1');
			$mail->addAddress($email, $receiver);     // Add a recipient

			//Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $content;


			$mail->send();
			return true;
		//} catch (Exception $e) {
		//	return false;
		//}
	}
	
    function findActiveAccount($secret){
		global $db;
		$stmt = $db -> prepare("SELECT * FROM active_account WHERE secretac=? LIMIT 1");
		$stmt ->execute(array($secret));
		return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    function markActiveAccount($userId)
	{
		global $db;
		$stmt = $db -> prepare("UPDATE users SET used = 1 where id = ?");
		$stmt ->execute(array($userId));
    }
    function findAccount($userId){
        global $db;
		$stmt = $db -> prepare("SELECT * FROM users WHERE id=? LIMIT 1");
		$stmt ->execute(array($userId));
		return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    function checkUsed($usedId){
        global $db;
		$stmt = $db -> prepare("SELECT used FROM users WHERE id=? LIMIT 1");
		$stmt ->execute(array($usedId));
		return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    function createResetPassWord($userID){
		global $db;
		$secret = generateRandomString();
		$stmt = $db -> prepare("INSERT INTO reset_password(userID, secret, used) VALUES (? , ?, 0)");
		$stmt ->execute(array($userID, $secret));
		return $secret;
    }
    function findResetPassword($secret){
		global $db;
		$stmt = $db -> prepare("SELECT * FROM reset_password WHERE secret=? LIMIT 1");
		$stmt ->execute(array($secret));
		return $stmt -> fetch(PDO::FETCH_ASSOC);
    }
    function updatePassword($userID, $password){
		global $db;
		$secret = generateRandomString();
		$stmt = $db -> prepare("UPDATE users SET password = ? WHERE id = ?");
		$stmt ->execute(array($password,$userID));

	}
    function markResetPasswordUsed($secret)
	{
		global $db;
		$stmt = $db -> prepare("UPDATE reset_password SET used = 1 where secret = ?");
		$stmt ->execute(array($secret));
	}

	function findRelationship($user1Id,$user2Id)
	{
		global $db;
		$stmt = $db -> prepare("SELECT * FROM friends WHERE user1Id=? and user2Id=?");
		$stmt ->execute(array($user1Id,$user2Id));
		$friends=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		return  $friends;
	}

	function findRelationshipfollow($user1Id,$user2Id)
	{
		global $db;
		$stmt = $db -> prepare("SELECT * FROM follow WHERE user1Id=? OR user2Id=? OR user1Id=? OR user2Id=?");
		$stmt ->execute(array($user1Id,$user2Id,$user2Id,$user1Id));
		$follow=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		return  $follow;
	}
	function findFollow($id1, $id2)
	{
		global $db;
		$stmt = $db -> prepare("SELECT * FROM follow where users = ? and usersfollow = ?");
		$stmt ->execute(array($id1, $id2));
		$follow=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		return  $follow;
	}

	function addRelationship($user1Id,$user2Id) 
	{
		global $db;
		$stmt = $db -> prepare("INSERT INTO friends (user1Id,user2Id) VALUES (?,?)");
		$stmt ->execute(array($user1Id,$user2Id));
	}

	function addFollow($idFollowed, $idCurent)
	{
		global $db;
		$stmt = $db -> prepare("INSERT INTO follow (users,usersfollow) VALUES (?,?)");
		$stmt ->execute(array($idCurent,$idFollowed));
	}
	function isUserFollowed($idFollowed) {
		global $db;
		$stmt = $db -> prepare("select * from follow where usersfollow = ?");
		$stmt ->execute(array($idFollowed));
		$posts=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $posts;
	}


	function removeRelationship($user1Id,$user2Id)	
	{
		global $db;
		$stmt = $db -> prepare("DELETE FROM friends WHERE (user1ID = ? AND user2Id = ?) OR (user1ID = ? AND user2Id = ?) ");
		$stmt ->execute(array($user1Id,$user2Id,$user2Id,$user1Id));
	}

	function removeFollow($idFollowed, $idCurent)
	{
		global $db;
		$stmt = $db -> prepare("DELETE FROM follow WHERE (users = ? AND usersfollow = ?) OR ( users = ? AND usersfollow = ?) ");
		$stmt ->execute(array($idCurent,$idFollowed,$idFollowed,$idCurent));
	}

	function getListFriends($userId)
	{
		global $db;
		$stmt=$db->prepare("SELECT f1.user2Id FROM friends AS f1 JOIN friends AS f2 ON f1.user2Id=f2.user1Id WHERE f1.user1Id=?");
		$stmt->execute(array($userId));	
		$rows=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		$result=array();
		foreach($rows AS $row)
		{
			$result[]=$row['user2Id'] ." ";
		}
		return $result; 
	}

	function GetListUser($id)
	{
		global $db;
		$stmt=$db->prepare("SELECT * from users Where id != ?");
		$stmt->execute(array($id));	
		$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	function findAllOfFriends($userId)
	{
		global $db;
		$friendIds=getFriends($userId);
		$stmt=$db->prepare('SELECT u.fullname FROM friends AS p LEFT JOIN users AS u ON u.id =p.userId WHERE userId IN( '.str_pad('',count($friendIds)*2-1,'?,').'ORDER BY createAt DESC');
		$stmt->execute($friendIds);
		$posts=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $posts;
	}


	function createStatus($content,$userId)
	{
		global $db;
		$stmt = $db->prepare("INSERT INTO posts(content,userId) VALUES(?, ?");
		$stmt->execute(array($content,$userId));
		$posts=$stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $db->lastInsertID();
	}

	function findAllPosts()
	{
		global $db;
		$stmt = $db -> prepare("SELECT p.*, u.fullName FROM posts AS p LEFT JOIN users AS u ON u.id = p.userId ORDER BY createdAt DESC");
		$stmt ->execute();
		$posts = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $posts;
	}
	function createPosts($content,$userId,$quyen){
		global $db;
		$stmt = $db -> prepare("INSERT INTO posts(content,userId,quyen) VALUES (?,?,?) ");
		$stmt ->execute(array($content,$userId,$quyen));
		return $db-> lastInsertId();
	}
	function updateLikePost($id, $count) {
		global $db;
		$stmt = $db->prepare("Update posts set count = ? where id = ?");
		$stmt->execute(array($count,$id));
		$stmt -> fetchAll(PDO::FETCH_ASSOC);
	}
	function removeFriendRequest($id1, $id2)
	{
		global $db;
		$stmt = $db->prepare("DELETE from friends where (user1id = ? and user2id = ? ) or (user2id = ? and user1id = ? )");
		$stmt->execute(array($id1, $id2, $id1, $id2));
	}
	function sendFriendRequest($id1, $id2)
	{
		global $db;
		$stmt = $db->prepare("INSERT into friends (user1id, user2id) values( ? , ? )");
		$stmt->execute(array($id1, $id2));
	}
	function SendMessage($body_msg, $user1, $user2)
    {
		global $db;
		$stmt = $db->prepare("INSERT INTO messages VALUES ( ? , ? , ? , ? , ? )");
		$dt = new DateTime();
		$stmt->execute(array('', $body_msg, $user1, $user2, $dt->format('Y-m-d H:i:s')));
	}

	function GetMessage($user1, $user2, $idmsg)
	{	
		global $db;
		$stmt = $db -> prepare("SELECT * FROM messages where ((user_from = ? and user_to = ? ) or (user_from = ? and user_to = ? )) and id_msg >= ?  ORDER BY id_msg ASC");
		$stmt ->execute(array($user1, $user2, $user2, $user1, $idmsg));
		$messages = $stmt -> fetchAll(PDO::FETCH_ASSOC);
		return $messages;
	}

	function LastIdMsg($id1, $id2)
	{
		global $db;
		$stmt = $db -> prepare("SELECT * FROM messages 
		where (user_from = ? and user_to = ? ) or (user_from = ? and user_to = ? )  
		ORDER BY id_msg DESC");
		$stmt ->execute(array($id1, $id2, $id2, $id1));
		$stmt = $stmt -> fetch(PDO::FETCH_ASSOC);
		$lastid = $stmt['id_msg'];
		return $lastid;
	}

	function CheckChatBox($id1, $id2)
	{
		global $db;
		$stmt = $db -> prepare("SELECT * FROM chatbox where Iduser1 = ? and Iduser2 = ?");
		$stmt ->execute(array($id1, $id2));
		$stmt = $stmt -> fetch(PDO::FETCH_ASSOC);
		return $stmt;
	}

	function InsertChatBox($id1, $id2, $idmsg)
	{
		global $db;
		$stmt = $db -> prepare("INSERT INTO chatbox Values(? , ?, ?)");
		$stmt -> execute(array($id1, $id2, $idmsg));
	}
	function RemoveChatBox($id1, $id2)
	{
		global $db;
		$stmt = $db->prepare("DELETE from chatbox where Iduser1 = ? and Iduser2 = ?");
		$stmt->execute(array($id1, $id2));
	}
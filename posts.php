<?php
	require_once 'init.php';
	require_once 'function.php';
	//xu ly logic o day
	$page = 'posts';
	$success = false;
	if(isset($_POST['quyen1']))
	{		
		$content = $_POST['content'];	
		$userId = $currentUser['id'];
		createPosts($content,$userId,1);
		header('Location: index.php');
		$success = true;	
	}else if(isset($_POST['quyen2']))
	{		
		$content = $_POST['content'];	
		$userId = $currentUser['id'];
		createPosts($content,$userId,2);
		header('Location: index.php');
		$success = true;	
	}else if(isset($_POST['quyen3']))
	{		
		$content = $_POST['content'];	
		$userId = $currentUser['id'];
		createPosts($content,$userId,3);
		header('Location: index.php');
		$success = true;	
	}	
?>
<?php include 'header.php'; ?>

<head>
	<link rel="stylesheet" href="style/style-index.css">
<?php include 'header.php'; ?>

<head>
	<link rel="stylesheet" href="style/style-index.css">
</head>
<?php if(!$success) : ?>
	<form action="posts.php" method="POST" style="padding-top: 50px;padding-left:50px">
	<div>
		<textarea class="form-control" id="exampleFormControlTextarea1" cols="73" rows="7" name="content" placeholder="Bạn đang nghĩ gì?"></textarea>
	</div>
		<button type="submit" class = " btn-post" id="btn-img" name="btn-img">Ảnh/video</button>
		<label class ="btn-post" id="btn-submit">Chia sẻ</label>
		<button type="dang"  name="quyen1" class = " btn-post" id="btn-share-public">Tất cả</button>
		<button type="dang"  name="quyen2" class = " btn-post" id="btn-share-friend">Bạn bè</button>
		<button type="dang"  name="quyen3" class = " btn-post" id="btn-share-me">Chỉ bạn</button>
	</form>
<?php endif; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	 	$('#btn-submit').click(function(){
				$('#btn-share-public').css('display','none');
				$('#btn-share-me').css('display','none');
				$('#btn-share-friend').css('display','none');
		 });
		 $('#btn-submit').dblclick(function(){
				$('#btn-share-public').css('display','inline');
				$('#btn-share-me').css('display','inline');
				$('#btn-share-friend').css('display','inline');
		 });
</script>
<?php include 'footer.php'; ?>
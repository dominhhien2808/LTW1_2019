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
		      	<li class="nav-item <?php echo $page === 'posts' ? 'active' :'' ?>"style="padding-top:50px"; >
		        <a class="nav-link" href="posts.php">Đăng trạng thái</a>
		      </li>
<?php endif; ?>   
<div class="container" style=" margin :100px;">
<?php foreach ($posts as $post) : ?>
<?php
$isFollowing = findRelationship($currentUser['id'], $post['userId']);
$isFollowed = findRelationship($post['userId'], $currentUser['id']);
$isFollow = findFollow($currentUser['id'], $post['userId']);
$quyen = $post['quyen'];
if ($quyen == 1) $phanquyen = 'Công khai';
else if($quyen == 2) $phanquyen = 'Bạn bè';
else $phanquyen = 'Chỉ mình tôi';
if(($post['userId'] == $currentUser['id']) || ($isFollow && $quyen == 1) || ($isFollowing && $isFollowed && $quyen != 3)) :?>
<div style="border:1px solid black" class="card">
  <div class="card-body">
  	 	<h5 class="card-title">
			<img style="width: 100px; height: 100px;" src="./img/<?php echo $post['userId']; ?>.png">
			<?php echo $post['fullName']; ?>
		</h5>
		<h6 class="card-subtitle mb-2">Chế độ: <?php echo $phanquyen; ?></h6>
	  	<h6 class="card-subtitle mb-2 text-muted"><?php echo $post['createdAt']; ?></h6>
    	<p class="card-text"><?php echo $post['content']; ?></p>
    	<img data-src="./img/30.png"width="765" height="474" class="lazy" style="transition: 1s" />
		<form action="LikePageHandle.php" method="GET">
			<input type ="hidden" name = "idPost" value = "<?=$post['id']?>">
			<input type ="hidden" name = "countPost" value ="<?=(int)$post['count'] + 1?>">
			<button type="submit" name="like" style="margin:10px;"><i class="far fa-thumbs-up" style='font-size:25px;'id="like"></i></button>
			<span style = "width:10px;height:20px;border-radius:5px;background:red;border:1px solid red;"><?=$post["count"]?></span>
		</form>
		<form action="LikePageHandle.php" method="GET">
			<input type ="hidden" name = "idPost" value = "<?=$post['id']?>">
			<input type ="hidden" name = "countPost" value ="<?=(int)$post['count'] - 1?>">
			<button type="submit" name="like" style="margin:10px;"><i class="far fa-thumbs-down" style='font-size:25px;'></i></button>
			<span style = "width:10px;height:20px;border-radius:5px;background:red;border:1px solid red;"><?=$post["count"]?></span>
		</form>
  </div>
<?php endif; ?>   
<?php endforeach; ?> 
<script>
	document.addEventListener("DOMContentLoaded", function() {
  var lazyloadImages = document.querySelectorAll("img.lazy");    
  var thoigianhienthi;
  
  function lazyload () {
    if(thoigianhienthi) {
      clearTimeout(thoigianhienthi);
    }    
    
    thoigianhienthi = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyloadImages.forEach(function(img) {
            if(img.offsetTop < (window.innerHeight + scrollTop)) {
              img.src = img.dataset.src;
              img.classList.remove('lazy');
            }
        });
        if(lazyloadImages.length == 0) { 
          document.removeEventListener("scroll", lazyload);
          window.removeEventListener("resize", lazyload);
          window.removeEventListener("orientationChange", lazyload);
        }
    }, 20);
  }
  
  document.addEventListener("scroll", lazyload);
  window.addEventListener("resize", lazyload);
  window.addEventListener("orientationChange", lazyload);
});
</script>
</div>
<?php include 'footer.php'; ?>





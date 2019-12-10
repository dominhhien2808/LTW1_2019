<?php
require_once 'init.php';
require_once 'function.php';
	//xu ly logic o day
$page = 'profile';
$user = findUserById($_GET['id']);

if (!$currentUser) {
    header('Location: index.php');
    exit(0);
}


$isFollowing = findRelationship($currentUser['id'], $user['id']);
$isFollowed = findRelationship($user['id'], $currentUser['id']);

?>

<?php include 'header.php'; ?>
<head>
    <link rel="stylesheet" href="style/style-profile.css">
</head>

<div class="">
    <div class="">
        <div class="">
            <img src="./img/<?php echo $user['id']; ?>.jpg" alt="Ảnh đại diện">
        </div>
        <div class="titleName">
            <h2><?php echo $user['fullname']; ?></h2>
        </div>
    </div>
        <?php if ($isFollowing && $isFollowed): ?>
            <form method="POST" action="remove_friend.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn_primary">Xóa bạn</button>
                </form>
        <?php else: ?>
            <?php if($isFollowing && !$isFollowed): ?>
                <form method="POST" action="remove_friend.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn_primary">Hủy yêu cầu kết bạn</button>
                </form>
            <?php endif; ?>
            <?php if(!$isFollowing && $isFollowed): ?>
                <form method="POST" action="add_friend.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn_primary">Chấp nhận yêu cầu kết bạn</button>
                </form>
            <?php endif; ?>
            <?php if(!$isFollowing && !$isFollowed): ?>
                <form method="POST" action="add_friend.php">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <button type="submit" class="btn btn_primary">Gửi yêu cầu kết bạn</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>




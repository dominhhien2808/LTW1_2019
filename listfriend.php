<?php
require_once 'init.php';
require_once 'function.php';
$page = 'listfriend';
//$listfriend=getListFriends($user["id"]);
$listUsers = GetListUser($currentUser['id']);

if(!$currentUser)
{
    header('Location: index.php');
    exit(0);
}

// nếu là bạn
// $isFriend=count($relationship)===2;
?>

<?php include 'header.php'; ?>
<head>
    <link rel="stylesheet" href="style/style-listfriend.css">
</head>
<?php
    foreach($listUsers as $user):
    {
        $isFollowing = findRelationship($currentUser['id'], $user['id']);
        $isFollowed = findRelationship($user['id'], $currentUser['id']); 
        if ($isFollowed && $isFollowing) :
        ?>
   
        <div class="contrainer">
            <div class="img-personal">
                <div class="img">
                    <img src="img/<?php echo $user['id']?>.jpg" alt="Ảnh đại diện">
                </div>
                <div class="titleName">
                    <h3>ID: <?php echo $user['id'];?> Tên:<?php echo $user['fullname']; ?></h2>
                    <h4><a href=http://localhost/ltw1_2019/profile.php?id=<?php echo $user['id']?>>Thăm tường</a>
                              <a href=http://localhost/ltw1_2019/chat.php?id=<?php echo $user['id']?>>Nhắn tin</a></h3>
                </div>
            </div>
        </div>
        <?php endif?>
<?php   
    }
?>
<?php endforeach?>












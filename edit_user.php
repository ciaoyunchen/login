<?php
//連結資料庫
include "connect.php";

$name=$_POST['name'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];
$birthday=$_POST['birthday'];
$email=$_POST['email'];

//設定id變數連結
$id=$_POST['id'];

//設定id變數連結
$sql="update user set name='$name',addr='$addr',tel='$tel',birthday='$birthday',email='$email' where id='$id'";
//利用session連結
//$sql="update user set name='$name',addr='$addr',tel='$tel',birthday='$birthday',email='$email' where id='".$_SESSION['id']."'";

//執行
$pdo->exec($sql);
echo "<a href='member_center.php'>編輯完成，返回會員中心</a>";


?>
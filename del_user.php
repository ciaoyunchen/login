<?php

include_once "connect.php";

$id=$_GET['id'];
$sql="delete from user where id='$id'";
// echo $sql;
$pdo->exec($sql);

// echo "<a href='admin2.php'>已刪除會員資料，回會員列表</a>";
header("location:admin2.php");


?>
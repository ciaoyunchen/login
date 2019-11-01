<?php
/***************************************************
 * 會員登入行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.從資料庫取得資料
 * 4.比對表單資料和資料庫資料是否一致
 * 5.根據比對的結果決定畫面的行為
  ***************************************************/

$acc=$_POST['acc'];
$pw=$_POST['pw'];

echo "acc=".$acc;
echo "<br>";
echo "pw=".$pw;

include "connect.php";

// for A & B
// $sql="select * from user where acc='$acc' && pw='$pw'";
// for C
// $sql="select count(*) as 'r' from user where acc='$acc' && pw='$pw'";
$sql="select id from user where acc='$acc' && pw='$pw'";

// for A & B & C
// fetch() 回傳陣列  fetchColumn() 回傳true或false/1或0
// $data= $pdo->query($sql)->fetch();
$data= $pdo->query($sql)->fetchColumn();

print_r($data);

// A累贅的判斷式
// if($acc==$data['acc'] && $pw==$data['pw']){
//   echo "登入成功";
// }else{
//   echo "登入失敗";
// }

// B浪費的判斷式(不管資料大小只會回傳有無值))
// if(!empty($data)){
//   echo "登入成功";
// }else{
//   echo "登入失敗";
// }

// C簡單判斷式
// if($data['r']==1){
//   echo "登入成功";
// }else{
//   echo "登入失敗";
// }

// D最簡單判斷式(判斷true或false/1或0)
if($data){
  echo "登入成功";
  // $_SESSION['login']=1;
  // $_SESSION['id']=$data['id'];
  // 建立 COOKIE
  setcookie("login",1,time()+3600);
  setcookie("id",$data['id'],time()+3600);
  header("location:member_center.php?");
}else{
  echo "登入失敗";
  header("location:index.php?err=1");
}

?>
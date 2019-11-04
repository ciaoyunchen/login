<?php
/***************************************************
 * 會員註冊行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.建立所需的SQL語法
 * 4.將表單資料以變數形式填入SQL語法中
 * 5.執行資料庫連線並送出SQL語法
 * 6.判斷SQL語法是否執行成功，執行下一步
 ***************************************************/

$data['acc']=$_POST['acc'];
$data['pw']=$_POST['pw'];
$data['name']=$_POST['name'];
$data['addr']=$_POST['addr'];
$data['tel']=$_POST['tel'];
$data['birthday']=$_POST['birthday'];
$data['email']=$_POST['email'];


include "connect.php";
//insert into user() values();
//$sql="insert into user (`acc`,`pw`,`name`,`addr`,`tel`,`birthday`,`email`)
// values ('$acc','$pw','$name','$addr','$tel','$birthday','$email')";
//echo "sql的語法是:".$sql;

//$pdo->exec($sql) exec執行:用在不需要回傳資料的場景(可用參數del,update,insert)
//$pdo->query($sql) query查詢:用在需要回傳資料的場景

//判斷是否新增成功
if(insert("user",$data)){
    // echo "新增資料成功";
    header("location:index.php?s=1");
}else{
    // echo "新增失敗，請洽資料庫管理人員";
    header("location:reg.php?s=2");
}

?>
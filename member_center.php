<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>會員中心</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table{
      border-collapse:collapse;
      border-spacing:0;
    }
    td{
      border:1px solid #ccc;
      padding:10px;
      text-align:center;
    }
  </style>
</head>
<body>
  <div class="member">
    <div class="wellcome">
      HI! 歡迎光臨!以下是你的個人資料:
      <a href="logout.php">登出</a>
    </div>
    <div class="private">
      <!--請自行設計個人資料的呈現方式並從資料庫取得會員資料-->
      <?php
        include "connect.php";

        if(empty($_COOKIE['login'])){
          header("location:index.php");
          exit(); //PHP的程式執行到此後停止
        }

        $sql="select * from user where id='".$_COOKIE['id']."'";
        // echo $sql;
        $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        // print_r($user);
        
      ?>

      <form action="edit_user.php" method="post">
      <table>
        <tr>
          <td>會員編號</td>
          <td><?=$user['id'];?></td>
        </tr>
        <tr>
          <td>會員帳號</td>
          <td><?=$user['acc'];?></td>
        </tr>
        <tr>
          <td>密碼</td>
          <td><?=$user['pw'];?></td>
        </tr>
        <tr>
          <td>姓名</td>
          <td><input type="text" name="name" id="name" value="<?=$user['name'];?>"></td>
        </tr>
        <tr>
          <td>地址</td>
          <td><input type="text" name="addr" id="addr" value="<?=$user['addr'];?>"></td>
        </tr>
        <tr>
          <td>電話</td>
          <td><input type="text" name="tel" id="tel" value="<?=$user['tel'];?>"></td>
        </tr>
        <tr>
          <td>生日</td>
          <td><input type="text" name="birthday" id="birthday" value="<?=$user['birthday'];?>"></td>
        </tr>
        <tr>
          <td>電子郵件</td>
          <td><input type="text" name="email" id="email" value="<?=$user['email'];?>"></td>
        </tr>
        <tr>
          <td colspan="2">
          <input type="hidden" name="id" value="<?=$user['id'];?>">
          <input type="submit" value="編輯">
          </td>
        </tr>
      </table>
      </form>


    </div>
    <a href="index.php">回首頁</a>
  </div>
 
</body>
</html>
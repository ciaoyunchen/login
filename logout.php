<?php
// time()-1 表過期一秒
setcookie("login","",time()-1);
setcookie("id","",time()-1);
header("location:index.php");

?>
<?php

include "connect.php";

$user=find('user',8);
echo $user['name'];

echo "<hr>";

$user2=find('user',2);
echo $user2['name'];

echo "<hr>";

$user3=find('user',4);
echo $user3['name'];






?>
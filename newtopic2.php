<?php
require('connect.php');
$time = time();
mysql_query("INSERT INTO threads VALUES(NULL,'$_POST[title]','$_POST[message]','$_COOKIE[username]','0','$time','$time','$_GET[f]')");
mysql_query("UPDATE forums SET posts = posts + 1 WHERE id = '$_GET[f]'");
mysql_query("UPDATE forums SET topics = topics + 1 WHERE id = '$_GET[f]'");	 
mysql_query("UPDATE forums SET action = $time WHERE id = '$_GET[f]'");
mysql_query("UPDATE user SET posts = posts + 1 WHERE username = '$_COOKIE[username]'");
require('template/header.php');
echo "Thread Posted.<br><a href='viewforum.php?f=$_GET[f]'>Return</a>";
require('template/footer.php');
?>
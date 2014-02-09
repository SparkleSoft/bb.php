<?php
require('connect.php');

$time = time();

mysql_query("INSERT INTO replies VALUES(NULL,'$_POST[thread]','$_POST[message]','$_COOKIE[username]','$time')");
mysql_query("UPDATE threads SET action = $time WHERE id = '$_POST[thread]'");
mysql_query("UPDATE threads SET replies = replies + 1 WHERE id = '$_POST[thread]'");
mysql_query("UPDATE forums SET posts = posts + 1 WHERE id = '$_GET[f]'");
mysql_query("UPDATE forums SET action = $time WHERE id = '$_GET[f]'");
mysql_query("UPDATE user SET posts = posts + 1 WHERE username = '$_COOKIE[username]'");


require('template/header.php');
echo "Reply Posted.<br><a href='viewtopic.php?f=$_GET[f]&id=$_POST[thread]'>Return</a>";
require('template/footer.php');
?>
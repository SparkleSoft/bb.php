<?php
require('connect.php');

$time = time();
mysql_query("INSERT INTO forums VALUES(NULL,'$_POST[title]','$_POST[message]',0,0,$time)");	 

require('template/header.php');
echo "Forum Created!<br><a href='index.php'>Return</a>";
require('template/footer.php');
?>
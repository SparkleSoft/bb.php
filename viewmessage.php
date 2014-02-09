<?php
	require "connect.php";

	$inbox = 1;

	include "template/header.php";
	if (!is_authed()) {
		echo 'You must be logged in to view this page, <a href="login.php">click here</a> to login.';
		echo '<br><br>';
		include 'template/footer.php';
		exit;
	}
?>

<?php
	$message_id=$_GET["msg"];
	$userfinal=$_SESSION['username'];

	$message = mysql_query("SELECT * FROM `messages` WHERE `message_id` = '$message_id' AND `to_user` = '$userfinal'");
	mysql_query("UPDATE `messages` SET `message_read` = '1' WHERE `message_id` = '$message_id' AND `message_read` = '0'");
	$message=mysql_fetch_assoc($message);
	$posted = date("jS M Y h:i",$message["action"]);
	echo "<table width=100%><tr><td><div align=center><h2>" . $message["message_title"] . "</h2></div></td></tr></table>";
	echo "<table cellpadding=2px width=100% style=\"border:0px solid;border-collapse:collapse;\"><tr style=\"border:1px solid;\"><td style=\"border:1px solid;\"></td><td style=\"margin:0px 10px;border:1px solid;\">Sent on $posted:</td></tr><tr style=\"border:1px solid;\"><td style=\"border:1px solid;\" width=128>" . $message["from_user"] . "</td><td style=\"border:1px solid;\">" . $message["message_contents"] . "</td></tr></td></tr><tr height=15 style=\"border:0px solid;\"><td></td></tr></table>";
?>

<?php 
	include "template/footer.php";
?>
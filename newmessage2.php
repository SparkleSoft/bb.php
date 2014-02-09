<?php
	$inbox = 1;

	include 'init.php';

	require "connect.php";

	session_start();

	include "template/header.php";

	if (!is_authed()) {
		die ('You must be logged in to view this page, <a href="login_form.inc.php">click here</a> to login.');
	}
?>

<?php
	$time = time();
	$title=$_POST['message_title'];
	$to=$_POST['message_to'];
	$content=$_POST['message_content'];
	$from=$_POST['message_from'];

	$ck_reciever = "SELECT username FROM user WHERE username = '".$to."'";       

	if( mysql_num_rows( mysql_query( $ck_reciever ) ) == 0 ){

		die("The user you are trying to contact don't exist. Please go back and try again.<br>
		<form name=\"back\" action=\"newmessage.php\"
		method=\"post\">
		<input type=\"submit\" value=\"Try Again\">
		</form>
		");

	}

	elseif(strlen($content) < 1){
		die("Your can't send an empty message!<br>
		<form name=\"back\" action=\"newmessage.php\"
		method=\"post\">
		<input type=\"submit\" value=\"Try Again\">
		</form>
		");

	}

	elseif(strlen($title) < 1){
		die("You must have a title!<br>
		<form name=\"back\" action=\"newmessage.php\"
		method=\"post\">
		<input type=\"submit\" value=\"Try Again\">
		</form>
		");
	} else {
		mysql_query("INSERT INTO messages (from_user, to_user, message_title, message_contents, action) VALUES ('$from','$to','$title','$content', '$time')") OR die("Could not send the message: <br>".mysql_error());
		echo "The message was successfully sent!";
?>

<br>

<a href="inbox.php">Back to Inbox</a>

<?php
	}
	include "template/footer.php";
?>
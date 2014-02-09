<?php
$inbox = 1;
include 'init.php';
require "connect.php";

if ($_GET[reply] == true) {
$message_id=$_GET[msg];
$userfinal=$_SESSION['username'];

$messageid = $_GET['message'];
$message = mysql_query("SELECT * FROM messages WHERE message_id = '$message_id' AND to_user = '$userfinal'");
$message=mysql_fetch_assoc($message);
$posted = date("jS M Y h:i",$message[action]);
$to = $message[from_user];
$title = "RE: " . $message[message_title];
}
else
{
$to = "";
$title = "";
}
session_start();
include "template/header.php";
$userfinal=$_SESSION['username'];
$user=$userfinal;
if (!is_authed())
{
	echo 'You must be logged in to view this page, <a href="login.php">click here</a> to login.';
	echo '<br><br>';
	include 'template/footer.php';
	exit;
}
?>
<table>
<form name="message" action="newmessage2.php" method="post">
<tr><td>Title: </td><td><input type="text" name="message_title" id="message_title" value = "<?php echo $title; ?>"></td></tr>
<tr><td>To: </td><td><input type="text" name="message_to" id="message_to" value="<?php echo $to; ?>"></td></tr></table>
<tr><td>Message: <br></td></tr><textarea rows="20" cols="50" name="message_content" id="message_content"></textarea>
<input type="hidden" name="message_from" id="message_from" value="<?php echo $_SESSION['username']; ?>">
<br><input type="submit" value="Submit">
</form>
<?php
include "template/footer.php";
?>
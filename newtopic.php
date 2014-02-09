<?php
require 'template/header.php';
?>

<?php
if (!is_authed())
{
	echo 'You must be logged in to view this page, <a href="login.php">click here</a> to login.';
	echo '<br><br>';
	include 'template/footer.php';
	exit;
}
?>

<form action="newtopic2.php?f=<?php echo $_GET[f]; ?>" method="POST">
<input style="border: 1px solid;width: 500px;" type="text" name="title" id="title" value="Thread Title"><br>
<textarea style="border: 1px solid;width: 500px;" rows="10" name="message" id="topic">Topic</textarea><br>
<input style="border: 1px solid;" type="submit" value="Post Thread">
</form>

<?php
require 'template/footer.php';
?>
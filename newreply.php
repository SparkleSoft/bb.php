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

<form action="newreply2.php?f=<?php echo $_GET[f]; ?>" method="POST">
<input type="hidden" value="<?php echo $_GET[id]; ?>" name="thread">
<textarea  style="border: 1px solid;width: 500px;" cols="60" rows="10" name="message"></textarea><br>
<input style="border: 1px solid;" type="submit" value="Post Reply">
</form>

<?php
require 'template/footer.php';
?>

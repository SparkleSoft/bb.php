<?php
	require 'template/header.php';
?>

<?php
	if (!is_authed_adm()) {
		echo 'You do not have the required privliges to view this page...<br><br>';
		include 'template/footer.php';
		exit;
	}
?>

<form action="newforum2.php" method="POST">
<table>
<tr><td>Title: </td><td><input style="border: 1px solid;width: 500px;" type="text" name="title"></td></tr>
<tr><td>Description: </td><td><input style="border: 1px solid;width: 500px;" type="text" name="message"></td></tr>
</table>
<input type="submit" style="border: 1px solid;" value="Create">
</form>

<?php
	require 'template/footer.php';
?>
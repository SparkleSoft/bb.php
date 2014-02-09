<?php if (isset($login_error)) { ?>
There was an error: <?php echo $login_error; ?>, please try again.
<?php } ?>
<form action="login.php" method="post">
<table>
  <tr>
    <td>Username: </td>
	<td><input style="border: 1px solid;" type="text" size="20" maxlength="20" name="username" id="username"
<?php if (isset($_POST['username'])) { ?> value="<?php echo $_POST['username']; ?>" <?php } ?>/></td>
  <tr>
    <td>Password: </td>
	<td><input style="border: 1px solid;" type="password" size="20" maxlength="10" name="password" id="password" /></td>
<tr><td></td><td><input style="border: 1px solid;" type="submit" name="submit" value="Login" /></td></tr></table>
</form>
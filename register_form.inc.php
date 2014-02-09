<?php if (isset($reg_error)) { ?>
There was an error: <?php echo $reg_error; ?>, please try again.
<?php } ?>
<form action="register.php" method="post">
<table>
<tr><td>Username: </td><td><input style="border: 1px solid;" type="text" size="20" maxlength="20" name="username"
<?php if (isset($_POST['username'])) { ?> value="<?php echo $_POST['username']; ?>" <?php } ?>/></td></tr>
<tr><td>Password: </td><td>	<input style="border: 1px solid;" type="password" size="20" maxlength="10" name="password" id="password" /></td></tr>
<tr><td>Confirm Password: </td><td>	<input style="border: 1px solid;" type="password" size="20" maxlength="10" name="confirmpass" id="confirmpass" /></td></tr>
<tr><td>Email Address: </td><td><input style="border: 1px solid;" type="text" size="20" name="email" id="email" /></td></tr>
<tr><td>Confirm Email: </td><td><input style="border: 1px solid;" type="text" size="20" name="cemail" id="cemail" /></td></tr>
<tr><td></td><td><input style="border: 1px solid;" type="submit" name="submit" value="Register!" /></td></tr>
</table>
</form>
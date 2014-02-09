<?php
	include 'connect.php';

	if (!isset($_POST['submit'])) {
		// Show the form
		require('template/header.php');
		include 'login_form.inc.php';
		require('template/footer.php');
		exit;
	} else {
		// Try and login with the given username & pass

		$result = user_login($_POST['username'], $_POST['password']);

		if ($result != 'Correct') {
			// Reshow the form with the error

			$login_error = $result;
			require('template/header.php');
			include 'login_form.inc.php';
			require('template/footer.php');
		} else {
			require('template/header.php');
			echo 'Login successful.';
			require('template/footer.php');
		}
	}
?>
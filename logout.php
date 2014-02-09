<?php
	// Include init file
	include_once 'connect.php';

	user_logout();
	require('template/header.php');
	echo "You have been logged out.";
	require('template/footer.php');
?>
<?php
	include_once 'init.php';
	include_once 'connect.php';

	require('template/header.php');

	if (!is_authed_adm())
	{
		echo 'You do not have the required privliges to view this page...<br><br>';
		include 'template/footer.php';
		exit;
	}

	echo "<h4 align=center>Admin Control Panel</h4><h5>Move Topic :: Lock Topic :: Delete Topic</h5><h5><a href='newforum.php'>Create Forum</a> :: Modify Forum :: Delete Forum</h5><h5>Modify User :: Warn User :: Ban User :: Delete User</h5>";
	require('template/footer.php');
?>
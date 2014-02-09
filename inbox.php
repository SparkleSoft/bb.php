<?php
	$inbox = 1;
	require "connect.php";
	session_start();
	include "template/header.php";
	if (!is_authed()) {
		echo 'You must be logged in to view this page, <a href="login.php">click here</a> to login.';
		echo '<br><br>';
		include 'template/footer.php';
		exit;
	}

	$userfinal=$_SESSION['username'];
	echo '<table cellpadding=2px width=100% style="border:0px solid;border-collapse:collapse;"><tr style="border:1px solid;"><th style="border:1px solid;"><pre>     </pre></th><th style="border:1px solid;">Title</th><th style="border:1px solid;">From User</th><th style="border:1px solid;">Date Sent</th></tr>';

	$get_messages = mysql_query("SELECT message_id FROM messages WHERE to_user='$userfinal' ORDER BY message_id DESC") or die(mysql_error());
	$get_messages2 = mysql_query("SELECT * FROM messages WHERE to_user='$userfinal' ORDER BY message_id DESC") or die(mysql_error());
	$num_messages = mysql_num_rows($get_messages);

	for($count = 1; $count <= $num_messages; $count++) {
		$row = mysql_fetch_array($get_messages2);
		$action = date("jS M Y h:i",$row[action]);
		if($row['message_read'] == 0){
		echo "<tr><td width=32 style=\"border:1px solid;\"><div align=center>NEW</div></td><td style=\"border:1px solid;\" width=50%><a href=\"viewmessage.php?msg=$row[message_id]\">$row[message_title]</a></td><td style=\"border:1px solid;\" width=20% align=center>$row[from_user]</td><td style=\"border:1px solid;\" width=30% align=center>$action<br></td></tr>"; }
		else 
		echo "<tr><td width=32 style=\"border:1px solid;\"><pre>     </pre></td><td style=\"border:1px solid;\" width=50%><a href=\"viewmessage.php?msg=$row[message_id]\">$row[message_title]</a></td><td style=\"border:1px solid;\" width=20% align=center>$row[from_user]</td><td style=\"border:1px solid;\" width=30% align=center>$action<br></td></tr>";
	}

	echo '</table>';

	echo '<br>';

	include "template/footer.php";
?>
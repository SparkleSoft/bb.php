<?php
	require('template/header.php');

	require_once('connect.php');

	// This query selects the current thread using the $_GET value.
	$sql = mysql_query("SELECT * FROM threads WHERE id = '$_GET[id]'");

	// Now we are getting our results and making them an array
	while($r = mysql_fetch_array($sql)) {
		// Here is the thread title.
		echo "<table width=100%><tr><td><div align=center><h2>$r[title]</h2></div></td></tr></table>";

		// Everything within the two curly brackets can read from the database using $r[]
		// We need to convert the UNIX Timestamp entered into the database for when a thread...
		// ... is posted into a readable date, using date().
		$posted = date("jS M Y h:i",$r["posted"]);	 

		// Now this shows the thread with a horizontal rule after it.
		echo "<table cellpadding=2px width=100% style=\"border:0px solid;border-collapse:collapse;\"><tr style=\"border:1px solid;\"><td style=\"border:1px solid;\"></td><td style=\"margin:0px 10px;border:1px solid;\">Posted on $posted:</td></tr><tr style=\"border:1px solid;\"><td style=\"border:1px solid;\" width=128>$r[author]</td><td style=\"border:1px solid;\">$r[message]</td></tr></td></tr><tr height=15 style=\"border:0px solid;\"><td></td></tr>";
		 

		// End of Array
	}

	// Here we will get it to show the replies
	// This query selects the replies from the database where the thread ID matches the thread $_GET value.
	$sql = mysql_query("SELECT * FROM replies WHERE thread = '$_GET[id]'");	 

	// Now we are getting our results and making them an array
	while($r = mysql_fetch_array($sql)) {

		// Everything within the two curly brackets can read from the database using $r[]
		// We need to convert the UNIX Timestamp entered into the database for when a thread...
		// ... is posted into a readable date, using date().
		$posted = date("jS M Y h:i",$r["posted"]);

		// Now this shows the thread with a horizontal rule after it.
		echo "<tr style=\"border:1px solid;\"><td style=\"border:1px solid;\"></td><td style=\"margin:0px 10px;border:1px solid;\">Posted on $posted:</td></tr><tr style=\"border:1px solid;\"><td style=\"border:1px solid;\" width=128>$r[author]</td><td style=\"border:1px solid;\">$r[message]</td></tr></td></tr><tr height=15 style=\"border:0px solid;\"><td></td></tr>";

		// End of Array
	}
?>

</table>

<?php
	require('template/footer.php');
?>
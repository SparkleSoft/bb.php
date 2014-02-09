<?php
	require 'template/header.php';
?>

<?php
	$headertype="b";
?>

<table width=100% style="border:1px solid;border-collapse:collapse;">
<tr style="border:1px solid;"><td width=32 style="border:1px solid;"><pre>     </pre></td><th width=40% style="border:1px solid;">Thread Title</th><th style="border:1px solid;" width=15%>Replies</th><th style="border:1px solid;" width=20%>Thread Starter</th><th  style="border:1px solid;"width=30%>Last Action</th></tr>

<?php
	// We are selecting everything from the threads section in the database and ordering them newest to oldest.
	$sql = mysql_query("SELECT * FROM threads WHERE forum = $_GET[f] ORDER BY action DESC"); 

	// Now we are getting our results and making them an array
	while($r = mysql_fetch_array($sql)) {
		// Everything within the two curly brackets can read from the database using $r[]
		// We need to convert the UNIX Timestamp entered into the database for when a thread...
		// ... is posted into a readable date, using date().

		$posted = date("jS M Y h:i",$r[posted]);
		$action = date("jS M Y h:i",$r[action]);

		// Now we will show the available threads

		echo "<tr style=\"border:1px solid;\"><td style=\"border:1px solid;\"><pre>     </pre></td><td style=\"border:1px solid;\" width=240><a href='viewtopic.php?f=$_GET[f]&id=$r[id]'>$r[title]</a></td><td style=\"border:1px solid;\" width=120>$r[replies]</td><td style=\"border:1px solid;\" width=200>$r[author]</td><td style=\"border:1px solid;\" width=120>$action</td></tr>";

		// End of Array
	}
?>

</table>

<br>

<?php
	require 'template/footer.php';
?>
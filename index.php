<?php
	require 'template/header.php';
?> 
<table width=100% style="border:1px solid;border-collapse:collapse;">
	<tr style="border:1px solid;">
		<td><pre>     </pre> 		</td>
		<th style="border:1px solid;">Forum Name</th>
		<th style="border:1px solid;">Topics</th>
		<th style="border:1px solid;">Posts</th>
		<th style="border:1px solid;">Last Action</th>
	</tr>

<?php
	// We are selecting everything from the threads section in the database and ordering them newest to oldest.
	$sql = mysql_query("SELECT * FROM forums ORDER BY id ASC");

	// Now we are getting our results and making them an array
	while($r = mysql_fetch_array($sql)) {
		// Everything within the two curly brackets can read from the database using $r[]
		// We need to convert the UNIX Timestamp entered into the database for when a thread...
		// ... is posted into a readable date, using date().

		$action = date("jS M Y h:i",$r["action"]);
		// Now we will show the available threads

		echo "<tr><td width=32 style=\"border:1px solid;\"><pre>     </pre></td><td style=\"border:1px solid;\" width=40%><a href=\"viewforum.php?id=" . $r["id"] . "\">$r[name]</a><br>" . $r["desc"] . "</td><td style=\"border:1px solid;\" width=15% align=center>" . $r["topics"] . "<br></td><td style=\"border:1px solid;\" width=15% align=center>$r[posts]<br></td><td style=\"border:1px solid;\" width=30% align=center>" . $action . "<br></td></tr>";
		// End of Array
	}
?>

</table>
<br>

<?php
	require 'template/footer.php';
?>
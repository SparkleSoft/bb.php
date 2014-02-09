<?php
	require_once 'connect.php';
	$time = time(); 	

	mysql_query("UPDATE user SET active = $time WHERE username = '$_COOKIE[username]'"); 
?> 

<title>bb.php - <?php $path_parts = pathinfo($_SERVER[PHP_SELF]); echo $path_parts['basename']; ?></title>

<style> 
	body { 
		font: 12px tahoma, sans-serif;
	}

	table { 
		font: 12px tahoma, sans-serif;
	}
</style>

<body style="background-color:grey;">
	<div align=center>
		<div align=left style="background-color:white;width:800px;border:1px solid;">
			<div align=left style="background-color:white;width:800px;border:0px solid;">
				<div style="margin:0px 10px;">
					<div>
						<table>
							<tr>
								<td width=300>
									<a href="index.php">Forum Index</a>
										<?php 
											if (isset($_GET[f])) { 
												echo " > ";

												$sql = mysql_query("SELECT * FROM forums WHERE id = $_GET[f]");
												$r = mysql_fetch_array($sql);
												echo "<a href='bb/forum/$_GET[f]'>";
												echo $r[name];
												echo "</a>"; 	
											} 

											if (isset($_GET[id])) {
												echo " > "; 
												$sql = mysql_query("SELECT * FROM threads WHERE id = $_GET[id]");
												$r = mysql_fetch_array($sql);
												echo "<a href='bb/forum/$_GET[f]/topic/$_GET[id]>";
												echo $r[title];
												echo "</a>";
											}
										?>
								</td>

								<td width=200>
									<div align=center>
										<?php
											if (isset($_GET[f])) {
												echo "<a href=\"bb/topic/new/";
												echo $_GET[f];
												echo "\">New Topic</a>";
											} 

											if (isset($_GET[id])) {
												echo " - <a href=\"bb/forum/";
												echo $_GET[f]; 
												echo "/topic/"; 
												echo $_GET[id] . "/reply"; 
												echo "\">Post Reply</a>";
											}

											if ($inbox) {
												echo "<a href=\"newmessage.php\">Send Message</a>"; 

												if (isset($_GET[msg])) {
													echo " - <a href=\"newmessage.php?reply=true&msg=$_GET[msg]\">Reply</a>";
												} 
											}

										?> 
									</div>
								</td>

								<td width=300>
									<div align=right>
										<?php
											$unreadmsg = 0;
											$userfinal=$_COOKIE['username'];
											$get_messages = mysql_query("SELECT message_id FROM messages WHERE to_user='$userfinal' ORDER BY message_id DESC") or die(mysql_error());

											$get_messages2 = mysql_query("SELECT * FROM messages WHERE to_user='$userfinal' ORDER BY message_id DESC") or die(mysql_error()); 

											$num_messages = mysql_num_rows($get_messages);  											

											for($count = 1; $count <= $num_messages; $count++) { 
											    $row = mysql_fetch_array($get_messages2); 
											    if($row['message_read'] == 0) {
											    	$unreadmsg = $unreadmsg + 1;
											    } 
											}

											if (!is_authed()) {
												echo "<a href=\"inbox.php\">Inbox</a> - ";

												echo '<a href="login.php">Login</a>/<a href="register.php">Register</a>';

											} else { 
												echo "<a href=\"inbox.php\">Inbox (+$unreadmsg)</a> - ";
												echo '<a href="logout.php">Logout (';
												echo $_COOKIE[username];
												echo ')</a>';
											}
										?>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<?php
					echo "<div align=left style=\"background-color:white;width:800px;border:0px solid;\"><div style=\"margin:5px 10px;\">";
				?>	
<?php
	$time = time();

	mysql_connect("localhost", "root", "");
	mysql_select_db("lol");
	
	// Salt Generator
	function generate_salt ()
	{
		// Declare $salt
		$salt = '';
	
		// And create it with random chars
		for ($i = 0; $i < 3; $i++)
		{
			$salt .= chr(rand(35, 126));
		}
			return $salt;
	}
	
	function user_register($username, $password, $email)
	{
		$sql = mysql_query("SELECT * FROM user WHERE username = '$username'");
		$row = mysql_fetch_row($sql); 	

		if ($row<1)
		{
			// Get a salt using our function
			$salt = generate_salt();
		
			// Now encrypt the password using that salt
			$encrypted = md5(md5($password).$salt);
			$time = time();
			// And lastly, store the information in the database
			$query = "insert into user (username, password, salt, email, joined, active, posts, admin) values ('$username', '$encrypted', '$salt', '$email', '$time', '$time', 0, 0)";
			mysql_query ($query) or die ('Could not create user.');
		} 
		else
		{
			echo 'Error: A user with that name allready exists.';
			include('template/footer.php');
			exit;
		}
	}
	
	function user_login($username, $password)
	{
		// Try and get the salt from the database using the username
		$query = "select salt from user where username='$username' limit 1";
		$result = mysql_query($query);
		$user = mysql_fetch_array($result);
	
		// Using the salt, encrypt the given password to see if it
		// matches the one in the database
		$encrypted_pass = md5(md5($password).$user['salt']);
	
		// Try and get the user using the username & encrypted pass
		$query = "select userid, username from user where username='$username' and password='$encrypted_pass'";
		$result = mysql_query($query);
		$user = mysql_fetch_array($result);
		$numrows = mysql_num_rows($result);
	
		// Now encrypt the data to be stored in the session
		$encrypted_id = md5($user['userid']);
		$encrypted_name = md5($user['username']);
	
		// Store the data in the session
		$_SESSION['userid'] = $userid;
		setcookie("userid", $userid);
		$_SESSION['username'] = $username;
		setcookie("username", $username);
		$_SESSION['encrypted_id'] = $encrypted_id;
		setcookie("encrypted_id", $encrypted_id);
		$_SESSION['encrypted_name'] = $encrypted_name;
		setcookie("encrypted_name", $encrypted_name);
	
		if ($numrows == 1)
		{
		    return 'Correct';
		}
		else
		{
		    return false;
		}
	}
	
	function user_logout()
	{
		setcookie("username", "NULL");
		// End the session and unset all vars
		session_unset ();
		session_destroy ();

	}

	function is_authed()
	{
		// Check if the encrypted username is the same
		// as the unencrypted one, if it is, it hasn't been changed
		if (isset($_COOKIE['username']) && (md5($_COOKIE['username']) == $_COOKIE['encrypted_name']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function is_authed_adm()
	{	
		if (is_authed()) {
			// Check if the encrypted username is the same
			// as the unencrypted one, if it is, it hasn't been changed
			$sql = mysql_query("SELECT * FROM user WHERE username='$_COOKIE[username]'") or die(mysql_error());
			$row = mysql_fetch_array($sql);
			if($row['admin'] == 1)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else {
			return false;
		}
	}
?>
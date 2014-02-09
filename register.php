<?php

// Include init file
include 'init.php';
include 'connect.php';

require('template/header.php');

if (!isset($_POST['submit']))
{
     // Show the form
     include 'register_form.inc.php';
require_once('template/footer.php');
     exit;
}
else
{
     // Check if any of the fields are missing
     if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirmpass']) || empty($_POST['email']) || empty($_POST['cemail']))
     {
          // Reshow the form with an error
          $reg_error = 'One or more fields missing';
          include 'register_form.inc.php';
require_once('template/footer.php');
          exit;
     }

     // Check if the passwords match
     if ($_POST['password'] != $_POST['confirmpass'])
     {
          // Reshow the form with an error
          $reg_error = 'Your passwords do not match';
          include 'register_form.inc.php';
require_once('template/footer.php');
          exit;
     }

     if ($_POST['email'] != $_POST['cemail'])
     {
          // Reshow the form with an error
          $reg_error = 'Email addresses do not match';
          include 'register_form.inc.php';
require_once('template/footer.php');
          exit;
     }

     // Everything is ok, register
     user_register ($_POST['username'], $_POST['password'], $_POST['email']);

     echo 'Thank you for registering, <a href="login.php">click here</a> to login.';

}
require_once('template/footer.php');
?>
<br>
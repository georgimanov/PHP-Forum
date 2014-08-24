<?php
require_once 'header.php';
require_once 'config.php';
?>
<form action="register.php" method="post">
	First Name :
	<input type="text" name="name" />
	<br/>
	Last Name :
	<input type="text" name="lname" />
	<br/>
	Username :
	<input type="text" name="uname" />
	<br/>
	Email :
	<input type="email" name="email" />
	<br/>
	Confirm Email :
	<input type="email" name="email2" />
	<br/>
	Password :
	<input type="password" name="pass" />
	<br/>
	Confirm Password
	<input type="password" name="pass2" />
	<br/>
	<input type="submit" name="submit" value="Register"/>
	<br/>
</form>
<?php
require_once 'footer.php';
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$email2 = $_POST['email2'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	if ($email == $email2) {
		if ($pass == $pass2) {
			$name = mysql_escape_string($_POST['name']);
			$uname = mysql_escape_string($_POST['uname']);
			$lname = mysql_escape_string($_POST['lname']);
			$email = mysql_escape_string($email);
			$email2 = mysql_escape_string($email2);
			$pass = mysql_escape_string($pass);
			$pass2 = mysql_escape_string($pass2);
			$pass = md5($pass);
			$sql = mysql_query("SELECT * FROM `usersdb` WHERE `uname` = '$uname'");
			if (mysql_num_rows($sql) > 0) {
				echo "User with that name already exists.";
				exit();
			}
			mysql_query("INSERT INTO `usersdb` (`id`,`name`,`lname`,`uname`,`pass`,`email`) 
				VALUES (NULL,'$name','$lname','$uname','$pass','$email')") or die(mysql_error());
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'login.php';
			header("Location: http://$host$uri/$extra");
			exit ;
			//  register.php
			//  PHPTeamProject
			//
			//  Created by iliq9204 on 2014-08-22.
			//  Copyright 2014 iliq9204. All rights reserved.
			//

		} else {
			echo "Password doesn't match";
		}
	} else {
		echo "Email doesn't match";
	}
}


?>

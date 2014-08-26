<?php
require_once 'header.php';
?>
<form method="post">
	Username:
	<input type="text" name="uname" />
	<br/>
	Password:
	<input type="password" name="pass"/>
	<br/>
	<input type="submit" name="submit" value="Login"/>
</form>

<?php
session_start();
	require_once 'config.php';
	require_once 'footer.php';
	if (isset($_POST['submit'])) {
		$uname = mysql_escape_string($_POST['uname']);
		$pass = mysql_escape_string($_POST['pass']);
		$pass = md5($pass);
		$sql = mysql_query("SELECT * FROM `users` WHERE `uname` = '$uname' AND `pass` = '$pass'");
		if (mysql_num_rows($sql) > 0) {
			
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'content.php';
			$_SESSION['uname'] = $uname;
				echo $_SESSION['uname'];
			header("Location: http://$host$uri/$extra");
			
		
		}else{
			echo "Unvalid username or password";
		}
	}
?>

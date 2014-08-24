<?php
require_once 'header.php';
?>
<div id="login-form">
    <a href="#"><img src="images/logo.png" id="logo-img"/></a>
    <form method="post">
        <input type="text" id="user" name="uname" placeholder="username">
        <input type="password" id="pass" name="pass" placeholder="password">
        <input type="submit" name="submit" id="submit-button" value="login">
    </form>
</div>
<?php
	require_once 'config.php';
	//require_once 'footer.php';
	if (isset($_POST['submit'])) {
		$uname = mysql_escape_string($_POST['uname']);
		$pass = mysql_escape_string($_POST['pass']);
		$pass = md5($pass);
		$sql = mysql_query("SELECT * FROM `usersdb` WHERE `uname` = '$uname' AND `pass` = '$pass'");
		if (mysql_num_rows($sql) > 0) {
			session_start();
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'content.php';
			header("Location: http://$host$uri/$extra");
			exit ;
		}else{
			echo "Invalid username or password";
		}
	}
?>

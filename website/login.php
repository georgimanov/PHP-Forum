<?php
require_once 'header.php';
?>
<div id="login-form">
    <a href="index.php"><img src="images/logo.png" id="logo-img"  class="animated fadeInDown"/></a>
    <form method="post" class="animated fadeInUp">
        <input type="text" id="user" name="uname" placeholder="username">
        <input type="password" id="pass" name="pass" placeholder="password">
        <input type="submit" name="submit" id="submit-button" value="login">
    </form>
</div>
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
      header("Location: http://$host$uri/$extra");
      
    
    }else{
      echo "<div id=\"warning-message\" class=\"animated fadeInUp\">Invalid username or password</div>";
    }
  }
?>

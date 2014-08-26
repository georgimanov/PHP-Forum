<?php
session_start();

require_once 'header.php';?>
Hello <?php echo $_SESSION['uname'] ?>! <a href="logout.php" >Logout</a>
<?php
require_once 'config.php';
?>
<?php if (isset($_SESSION['uname'])) {
	$cid = $_GET['cid'];
	$tid = $_GET['cid'];
	$sql = "SELECT * FROM topics WHERE category_id=$cid AND id=$tid LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) ==1){
		
	}else{
		echo "<p>This topic does not exist!</p>";
	}
?>

<?php } else {
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login.php';
	header("Location: http://$host$uri/$extra");
	}
?>

<?php
require_once 'footer.php';
?>
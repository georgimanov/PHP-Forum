<?php
session_start();
require_once 'header.php';
?>
Hello <?php echo $_SESSION['uname'] ?>! <a href="logout.php" >Logout</a>
<?php
require_once 'config.php';
?>
<?php 
if(!isset($_GET['cid']) || !isset($_SESSION['uname'])){
	$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'login.php';
			header("Location: http://$host$uri/$extra");
	exit();
}
$cid = $_GET['cid'];

 ?>
 <hr />
 <div id="wrapper">
 	<form action="create_topic_parse.php" method="post">
 		<p>Topic Title</p>
 		<input type="text" name="topic_title" size="90" maxlength="150" />
 		<p>Topic Content</p>
 		<textarea name="topic_content" rows="4" cols="60"></textarea>
 		<input type="hidden" name="cid" value="<?php echo $cid ?>" /> 		
 		<input type="submit" name="submit" value="Create Topic" />
 	</form>
 </div>
<?php
require_once 'footer.php';
?>
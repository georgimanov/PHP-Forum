<?php session_start();
require_once 'header.php';
?>
Hello <?php echo $_SESSION['uname'] ?>! <a href="logout.php" >Logout</a>
<?php
echo $_SESSION['uname'];
if ($_POST['cid'] == "" || !isset($_SESSION['uname'])) {
	
	$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'login.php';
	header("Location: http://$host$uri/$extra");
	exit();
}
if (isset($_POST['submit'])) {
	if (($_POST['topic_title'] == "") || ($_POST['topic_content'] == "")) {
	echo "You not fill all fields.Please return.";
		exit();
	}else{
		require_once 'config.php';
		$cid = $_POST['cid'];
		$title = $_POST['topic_title'];
		$content = $_POST['topic_content'];
		$creator = $_SESSION['uname'];
		$sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES 
		('".$cid."', '".$title."', '".$creator."' , now() , now())";
		$res = mysql_query($sql) or die (mysql_error());
		$new_topic_id = mysql_insert_id();
		$sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES (
		'".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now())";		
		$res2 = mysql_query($sql2) or die(mysql_error());
		$sql3 = "UPDATE categories SET last_post_date = now(), last_user_posted='".$creator."' WHERE id='".$cid."'
		LIMIT 1 ";
		$res3 = mysql_query($sql3) or die(mysql_error());
		if(($res) && ($res2) && ($res)){
			$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = "view_topic.php?cid=".$cid."&tid=".$new_topic_id;
			header("Location: http://$host$uri/$extra");
		 }else{
			 echo "Fuck You";
		 } 
	}
}
require_once 'footer.php';
?>
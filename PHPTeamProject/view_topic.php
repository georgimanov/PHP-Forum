<?php
session_start();

require_once 'header.php';
?>
Hello <?php echo $_SESSION['uname'] ?>!
<a href="logout.php" >Logout</a>
<?php
require_once 'config.php';
?>
<?php if (isset($_SESSION['uname'])) {
	$cid = $_GET['cid'];
	$tid = $_GET['tid'];
	$sql = "SELECT * FROM topics WHERE id=$tid";
	echo "$tid";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res)  > 0 ){
		$title = "";
		$topic_creator = "";
		$topic_date = "";
		while ($row = mysql_fetch_assoc($res)){
			$title = $row['topic_title'];
			$topic_creator = $row['topic_creator'];
			$topic_date = $row['topic_date'];
		}
		?>
		<table border="1">
			<tr><th><?php echo $topic_creator ;?></th><th><?php echo $title ;?></th><th><?php echo $topic_date ; ?></th></tr>
			<?php $sql2 = "SELECT * FROM posts WHERE topic_id=$tid";
			$res2 = mysql_query($sql2) or die(msql_error());
			while ($row = mysql_fetch_assoc($res2)) { 
				$post_creator = $row['post_creator'];
				$content = $row['post_content'];
				$post_date = $row['post_date'];
				?><tr>
				<td><?php echo $post_creator; ?></td><td><?php echo $content; ?></td><td><?php echo $post_date; ?></td>
				</tr>
		<?php	}
			 ?>
		</table>
		<form method="post">
		<div>Your reply: <br/><textarea name="answer"></textarea><input type="submit" name="submit" value="Add reply" /></div>
		</form>
		<?php
		if(isset($_POST['answer'])){
			$answer = $_POST['answer'];
			$name = $_SESSION['uname'];
			$sql3 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES (
			'".$cid."', '".$tid."', '".$name."', '".$answer."', now())";
			$res3 = mysql_query($sql3) or die(mysql_error());	
			unset($_POST['answer']);
			$host = $_SERVER['HTTP_HOST'];
	$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'view_topic.php';
	header("Location: http://$host$uri/$extra?cid=$cid&tid=$tid"); 
		}
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
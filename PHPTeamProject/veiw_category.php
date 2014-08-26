<?php
session_start();

require_once 'header.php';
?>
Hello <?php echo $_SESSION['uname'] ?>! <a href="logout.php" >Logout</a>
<?php
require_once 'config.php';

?>
<?php
if (isset($_SESSION['uname'])) {
	$cid = $_GET['cid'];
	
	$sql = "SELECT id FROM categories WHERE id='" . $cid . "' LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($res) == 1) {
		$sql2 = "SELECT * FROM topics WHERE category_id='" . $cid . "' ORDER BY topic_reply_date DESC";
		$res2 = mysql_query($sql2) or die(mysql_error());
		if(mysql_num_rows($res2) > 0){ ?>
			<table width="95%">
				<th>Topic title</th><th>Views</th>
			<?php while ($row = mysql_fetch_assoc($res2)) { 
				$tid = $row['id'];
				$title = $row['topic_title'];
				$views = $row['topic_views'];
				$date = $row['topic_date'];
				$creator = $row['topic_creator'];
				?>
				
					<tr>
						<td><a href='view_topic.php?cid=<?php echo $cid ?>&tid=<?php echo $tid ?>'>
							<?php echo "$title"; ?></a></td><td><?php echo $views ?></td>
					</tr>
					<tr><td>Posted by: <?php echo $_SESSION['uname']; ?> on <?php echo $date ?> </td> </tr>
				
		<?php	} ?>
		</table>
		<?php
		echo "<div class='create topic'><a href='create_topic.php?cid=$cid
		'>Create New Topic</a></div>";
		}else{
			echo "<div class='create topic'><p>There are no topics</p><a href='create_topic.php?cid=$cid
		'>Create Topic</a><br/><a href='content.php'>Return</a>	
	</div>";
		}
	} else {
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		$extra = 'login.php';
		header("Location: http://$host$uri/$extra");
	}
}
?>
<?php
require_once 'footer.php';
?>
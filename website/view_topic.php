<?php
session_start();

require_once 'header.php';
?>

<div class="welcome">
    <h1>Hello, <?php echo htmlentities($_SESSION['uname']) ?> !</h1>  <a href="logout.php" >Logout</a>
</div>

<div id="back-button"><a href="content.php" class="animated fadeInRight">Go back</a></div>

<?php
require_once 'config.php';
?>
<?php if (isset($_SESSION['uname'])) {
	$cid = $_GET['cid'];
	$tid = $_GET['tid'];
	$sql = "SELECT * FROM topics WHERE id=$tid";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res)  > 0 ){
		$title = "";
		$topic_creator = "";
		$topic_date = "";
		$oldViews = "";
		while ($row = mysql_fetch_assoc($res)){
			$title = $row['topic_title'];
			$topic_creator = $row['topic_creator'];
			$topic_date = $row['topic_date'];
			$oldViews = $row['topic_views'];
		}
		$oldViews +=1;	
		$sqlUpdate = mysql_query("UPDATE topics SET topic_views='".$oldViews."' WHERE id = $tid");
		?>
        <div class="div-table">
            <table class="topics">
                <tr><th><?php echo htmlentities($topic_creator) ;?></th><th><?php echo $title ;?></th><th><?php echo $topic_date ; ?></th></tr>
                <?php $sql2 = "SELECT * FROM posts WHERE topic_id=$tid";
                $res2 = mysql_query($sql2) or die(msql_error());
                while ($row = mysql_fetch_assoc($res2)) {
                    $post_creator = $row['post_creator'];
                    $content = $row['post_content'];
                    $post_date = $row['post_date'];
                    ?><tr>
                    <td><?php echo htmlentities($post_creator); ?></td><td><?php echo htmlentities($content); ?></td><td><?php echo $post_date; ?></td>
                    </tr>
            <?php	} ?>
            </table>
        </div>
		<div class="reply-msg">
            <form method="post">
                <h3>Post reply</h3>
                <textarea name="answer" id="reply-textarea" rows="10" placeholder="Your text"></textarea>
                <input type="submit" name="submit" id="reply-button" value="REPLY" />
            </form>
        </div>
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
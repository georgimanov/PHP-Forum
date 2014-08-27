<?php 
    session_start();
    require_once 'header.php';
	require_once 'queries.php';
?>

<?php require_once 'config.php'; 
if(!isset($_SESSION['uname'])){
    
    $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
    exit();
}
?>
<div class="welcome animated fadeInDown">
    <h1>Hello, <?php echo htmlentities($_SESSION['uname']) ?> !</h1>  <a href="logout.php" >(Logout)</a>
</div>


<div class="top animated fadeInDown">
    <a href="content.php"><img src="images/logo-small.png" class="content-img"></a>
</div>
<div class="top animated fadeInDown">
    <div class="post-button">
        <a href="create-post.php">POST SOMETHING</a>
    </div>
</div>
<div class="content left animated fadeInRight">
    <h1>CATEGORIES</h1>
    <div class="table">
        <div class="row">
            <div class="cell">
                <a href="content.php"><h3>ALL</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories"><?php echo countTopics(""); ?></span>
            </div>
        </div>
        
        <div class="row">
            <div class="cell">
                <a href="content.php?cid=1"><h3>RECIPES</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories"><?php echo countTopics("WHERE category_id=1"); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="content.php?cid=2"><h3>UTENSILS</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories"><?php echo countTopics("WHERE category_id=2"); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="content.php?cid=3"><h3>SOUP PLACES</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories"><?php echo countTopics("WHERE category_id=3"); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="content.php?cid=4"><h3>SPICES</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories"><?php echo countTopics("WHERE category_id=4"); ?></span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="content.php?cid=5"><h3>CHEFS</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories"><?php echo countTopics("WHERE category_id=5"); ?></span>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="content center animated fadeInUp">
    <h1>POSTS</h1>
    <?php 
    if(!isset($_GET['cid'])){
    $sql = "SELECT * FROM topics ORDER BY id DESC";
	$res = mysql_query($sql) or die(mysql_error());
	while ($row = mysql_fetch_assoc($res)) { 
		$title = $row['topic_title'];
		$id = $row['id'];
		$cat_id = $row['category_id'];
		$views = $row['topic_views'];
		$creator = $row['topic_creator'];
		$date = $row['topic_date'];
		?>
		<div class="post-titles"> <a href="view_topic.php?cid=<?php echo $cat_id; ?>&tid=<?php echo $id; ?>"><?php echo htmlentities($title) ?> </a>
			<div class="post-views">Views <?php echo $views; ?></div>
			<div class="post-count">Replies <?php echo countPosts($id); ?></div>
			<div class="post-creator">Posted by <?php echo htmlentities($creator) ;?></div>
		</div>
	
<?php	
	}
		
	}else{
		$cid = $_GET['cid'];
		$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY id DESC";
		$res2 = mysql_query($sql2) or die(mysql_error());
		?>
	<?php	while ($row = mysql_fetch_assoc($res2)) { 
		$title = $row['topic_title'];
		$id = $row['id'];
		$cat_id = $row['category_id'];
		$views = $row['topic_views'];
		$creator = $row['topic_creator'];
		$date = $row['topic_date'];
		?>
		<div class="post-titles"> <a href="view_topic.php?cid=<?php echo $cat_id; ?>&tid=<?php echo $id; ?>"><?php echo htmlentities($title) ?> </a>
			<div class="post-views">Views <?php echo $views; ?></div>
			<div class="post-count">Replies <?php echo countPosts($id); ?></div>
			<div class="post-creator">Posted by <?php echo htmlentities($creator) ;?></div>
		</div>
	

<?php	
	}
	}
	
     ?>
</div>

<div class="content right animated fadeInLeft">
    <h1>TAGS</h1>
    <p>soup, spoon, fork, bowl, kitchen, places, spices, utensils, eat me, bite me</p>
</div>

    <div id="fork-image">
        <a href="02.About.html"><img src="images/fork-small.png"></a>
    </div>

<?php include 'footer.php'; ?>
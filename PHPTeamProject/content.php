<?php
session_start();
require_once 'header.php';

?>
<?php require_once 'config.php'; 
if(!isset($_SESSION['uname'])){
	
	$host = $_SERVER['HTTP_HOST'];
			$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$extra = 'login.php';
			header("Location: http://$host$uri/$extra");
	exit();
}
?>
Hello <?php echo $_SESSION['uname'] ?>! <a href="logout.php" >Logout</a>
<?php

$sql = "SELECT * FROM categories ORDER BY category_title ASC";
$res = mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($res) > 0){
	
?>

	<?php
while ($row = mysql_fetch_assoc($res)) {
$id = $row['id'];
$title = $row['category_title'];
$description = $row['category_description'];

	?>
	<div class="categories"><a href="veiw_category.php?cid=<?php echo "$id"; ?>
		" class="cat_links"><?php echo "$title"; ?></a>
		<p class="cat_disc"><?php echo "$description"; ?></p>
	</div>
	<?php

	}
	?>

<?php

}else{
echo "<p>There is no categories</p>";
}
?>

<?php
require_once 'footer.php';
?>
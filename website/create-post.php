<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Soupaholic</title>
  <link rel="stylesheet" href="styles/create-post-styles.css">
</head>
<body>
Hello <?php echo $_SESSION['uname'] ?>! <a href="logout.php" >Logout</a>
<?php
require_once 'config.php';
?>

<?php 
if(!isset($_SESSION['uname'])){
  $host = $_SERVER['HTTP_HOST'];
      $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
      $extra = 'login.php';
      header("Location: http://$host$uri/$extra");
  exit();
}
?>

  <div id="back-button"><a href="content.php" class="animated fadeInRight">Go back</a></div>
  <img src="images/spoon-big.png" id="spoon" class="animated fadeInLeft">
  <div id="post-page-title" class="animated fadeInDown">Post something</div>
  <div id="register-wrapper">
    <form action="create_topic_parse.php" method="post" id="register-form" class="animated fadeInUp">
        <input type="text" name="topic_title" placeholder="post title"/>
        <textarea name="topic_content" rows="10" placeholder="Your text"></textarea>
        <select name="cid" id="category-select" placeholder="something">
          <option value="" disabled selected>Pick a category...</option>
          <option value="1">Recipe</option>
          <option value="2">Utencils</option>
          <option value="3">Soup places</option>
          <option value="4">Spices</option>
          <option value="5">Chefs</option>
        </select>
        <input type="submit" name="submit" value="Post" id="submit-post"/>
        <br/>
    </form>
</div>
</body>
</html>
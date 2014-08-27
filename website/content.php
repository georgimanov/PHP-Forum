<?php 
    session_start();
    require_once 'header.php';
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
<div class="welcome">
    <h1>Hello, <?php echo $_SESSION['uname'] ?> !</h1>  <a href="logout.php" >Logout</a>
</div>


<div class="top">
    <a href="index.php"><img src="images/logo-small.png" class="content-img"></a>
</div>
<div class=top>
    <div class="post-button">
        <a href="create-post.php">POST SOMETHING</a>
    </div>
</div>
<div class="content left">
    <h1>CATEGORIES</h1>
    <div class="table">
        <div class="row">
            <div class="cell">
                <a href="view_category.php?cid=1"><h3>RECIPES</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories">12</span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="view_category.php?cid=2"><h3>UTENSILS</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories">34</span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="view_category.php?cid=3"><h3>SOUP PLACES</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories">56</span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="view_category.php?cid=4"><h3>SPICES</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories">78</span>
            </div>
        </div>
        <div class="row">
            <div class="cell">
                <a href="view_category.php?cid=5"><h3>CHEFS</h3></a>
            </div>
            <div class="cell">
                <span class="list-categories">90</span>
            </div>
        </div>
        </div>
    </div>
</div>

<div class="content center">
    <h1>POSTS</h1>
    <p>Lorem ipsum</p>
</div>

<div class="content right">
    <h1>TAGS</h1>
    <p>soup, spoon, fork</p>
</div>

<?php include 'footer.php'; ?>
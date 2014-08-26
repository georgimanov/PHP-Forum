<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Soupaholic</title>
  <link rel="stylesheet" href="styles/create-post-styles.css">
</head>
<body>
  <div id="back-button"><a href="content.php">Go back</a></div>
  <div id="post-page-title">Post something</div>
  <div id="register-wrapper">
    <form action="register.php" method="post" id="register-form" class="animated fadeInLeft">
        <input type="text" name="title" placeholder="post title"/>
        <textarea name="post-description" rows="10" placeholder="Your text"></textarea>
        <select name="category-select" id="category-select" placeholder="something">
          <option value="" disabled selected>Pick a category...</option>
          <option value="assdf">Recipe</option>
          <option value="assdf">Utencils</option>
          <option value="assdf">Soup places</option>
          <option value="assdf">Spices</option>
          <option value="assdf">Chefs</option>
        </select>
        <input type="submit" name="submit" value="Post" id="submit-post"/>
        <br/>
    </form>
</div>
</body>
</html>
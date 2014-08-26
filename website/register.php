<?php
require_once 'header.php';
require_once 'config.php';
?>
<a href="index.php"><img src="images/logo-fulll.png" class="logo-img-fulll animated fadeInRight"></a>
<div id="register-wrapper">
    <form action="register.php" method="post" id="register-form" class="animated fadeInLeft">
        <input type="text" name="name" placeholder="first name"/>
        <input type="text" name="lname" placeholder="last name"/>
        <input type="text" name="uname" placeholder="username"/>
        <input type="email" name="email" placeholder="email"/>
        <input type="email" name="email2" placeholder="confirm email"/>
        <input type="password" name="pass" placeholder="password"/>
        <input type="password" name="pass2" placeholder="confirm password"/>
        <input type="submit" name="submit" value="Register" id="submit-register"/>
        <br/>
    </form>
</div>
<?php
require_once 'footer.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email2 = $_POST['email2'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    if ($email == $email2) {
        if ($pass == $pass2) {
            $name = mysql_escape_string($_POST['name']);
            $uname = mysql_escape_string($_POST['uname']);
            $lname = mysql_escape_string($_POST['lname']);
            $email = mysql_escape_string($email);
            $email2 = mysql_escape_string($email2);
            $pass = mysql_escape_string($pass);
            $pass2 = mysql_escape_string($pass2);
            $pass = md5($pass);
            $sql = mysql_query("SELECT * FROM `users` WHERE `uname` = '$uname'");
            if (mysql_num_rows($sql) > 0) {
                echo "<div class=\"warning animated fadeInLeft\">User with that name already exists.</div>";
                exit();
            }
            mysql_query("INSERT INTO `users` (`id`,`name`,`lname`,`uname`,`pass`,`email`)
				VALUES (NULL,'$name','$lname','$uname','$pass','$email')") or die(mysql_error());
            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login.php';
            header("Location: http://$host$uri/$extra");
            exit;
            //  register.php
            //  PHPTeamProject
            //
            //  Created by iliq9204 on 2014-08-22.
            //  Copyright 2014 iliq9204. All rights reserved.
            //

        } else {
            echo "<div class=\"warning animated fadeInLeft\">Password doesn't match.</div>";
        }
    } else {
        echo "<div class=\"warning animated fadeInLeft\">Email doesn't match.</div>";
    }
}


?>

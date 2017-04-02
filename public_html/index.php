<?php
require("../includes/config.php");
$values["title"] = "Home";
render("../templates/home.php", $values, __FILE__);

if (isset($_SESSION['memberID'])) {
    //header('location')
    echo "You are logged in already!";
}
?>
<a href="login.php" class="btn btn-default">Login</a>
<a href="signup.php" class="btn btn-default">Sign Up</a>
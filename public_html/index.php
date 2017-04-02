<?php
require("../includes/config.php");
$values["title"] = "Home";
render("../templates/home.php", $values, __FILE__);

if (isset($_SESSION['memberID'])) {
    //header('location')
    echo "You are logged in already!";
}
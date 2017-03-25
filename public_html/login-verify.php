<?php
require("../includes/config.php");

$username = $_POST['username'];
$password = $_POST['password'];

if($auth == false) {
    $value['title'] = "Login";
    $value['message'] = "Sorry, those credential didn't work. Please try again!";
    render("../templates/login-form.php", $value, __FILE__);
}

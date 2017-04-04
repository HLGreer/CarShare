<?php
require("../includes/config.php");
$values = [];
if (!(isset($_SESSION['memberID']))) {
    header('Location: login.php');
}
render("../templates/home.php", $values, __FILE__);
/**
 * Where members are redirected to once logged in.
 */
//echo "Hello this is memberHome.php";

?>
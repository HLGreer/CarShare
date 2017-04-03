<?php
require("../includes/config.php");
$values = [];
if (!(isset($_SESSION['adminID']))) {
    header('Location: adminLogin.php');
}
render("../templates/adminHome-view.php", $values, __FILE__);
/**
 * Where members are redirected to once logged in.
 */
//echo "Hello this is memberHome.php";

?>
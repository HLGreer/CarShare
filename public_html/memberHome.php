<?php
require("../includes/config.php");
$values = [];
render("../templates/memberHome-view.php", $values, __FILE__);
/**
 * Where members are redirected to once logged in.
 */
echo "Hello this is memberHome.php";



?>
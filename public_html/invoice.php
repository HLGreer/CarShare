<?php
require("../includes/config.php");
$values["title"] = "Invoice";
if (!(isset($_SESSION['adminID']))) {
    header('Location: adminLogin.php');
}
render("../templates/invoice.php", $values, __FILE__);
?>
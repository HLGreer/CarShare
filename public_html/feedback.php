<?php
require("../includes/config.php");
$values["title"] = "Feedback";
if (!(isset($_SESSION['memberID']))) {
    header('Location: login.php');
}
render("../templates/feedback.php", $values, __FILE__);
?>
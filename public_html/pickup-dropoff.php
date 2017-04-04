<?php

require("../includes/config.php");
$memID= $_SESSION['memberID'];
$values["title"] = "Pickup Dropoff";
render("../templates/pickup-dropoff.php", $values, __FILE__);
<?php
require("../includes/config.php");
require("../templates/header.php");
$tbl_name = "rentalcomments";
    foreach ($_POST as $param_name => $param_val) {
        echo "<div class='container'>Res#:". $param_name." comment:". $param_val."<br>\n</div>";
        $reservationNUM=$param_name;
        $commentReply=$param_val;
    }
    /*$allVars = array($_POST);
    echo $allVars;
    foreach ($allVars as $key => $value) { //there should only be one, but need $x as $a=>$b
        $reservationNUM = $key;
        $commentReply = $value;
    }*/
    echo "<div class='container'>".$reservationNUM, "<br>", $commentReply, "<br></div>";
    $db = getDB();
    $query = $db->prepare("UPDATE $tbl_name SET commentReply = :commentReply WHERE reservationNUM = :reservationNUM;");
    $query->bindParam(":commentReply", $commentReply, PDO::PARAM_STR);
    $query->bindParam(":reservationNUM", $reservationNUM, PDO::PARAM_INT);
    if ($query->execute()){
        echo "<div class='container'><h3>Successfully replied to comment.</h3></div>";
    } else {
        // TODO: redirect
        echo "woops!!!!! didnt find the reservation number";
    }

//$db->prepare(UPDATE $tbl_name SET commentReply = :commentReply WHERE reservationNUM = :reservationNUM)
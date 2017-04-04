<?php
require("../includes/config.php");
$tbl_name = "rentalhistory";


if ($_POST['pord']=="pickup") {
    $db = getDB();
    $query = $db->prepare("SELECT VIN from reservation WHERE reservationNUM=:reservationNUM;");
    $query->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $query->execute();
    $count = $query->rowCount();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    if ($count) {// there should only be one matching entry
        foreach($data as $output) {
            $VIN =  $output->VIN;
        }
    } else {
        echo "Well here we are";
        //header('Location: login.php'); // TODO: We should add an error message if redirect to login.php

    }
    $db = getDB();
    $insert = $db->prepare("INSERT INTO $tbl_name (reservationNUM, memberID, VIN, pickUpOdometer) VALUES (:reservationNUM, :memberID, :VIN, :pickUpOdometer);");
    $insert->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $insert->bindParam(":memberID", $_SESSION['memberID'], PDO::PARAM_INT);
    $insert->bindParam(":pickUpOdometer", $_POST['odometer'], PDO::PARAM_INT);
    $insert->bindParam(":VIN", $VIN, PDO::PARAM_INT);
    if ($insert->execute()) {
        echo "<h3>Successfully picked up car. Enjoy!</h3>";
    } else {
        echo "Welp...";
    }
    $db=null;

} else { // ="dropoff"
    $db = getDB();
    $query = $db->prepare("UPDATE $tbl_name SET dropOffOdometer = :dropOffOdometer, statusOnReturn=:carstatus WHERE reservationNUM=:reservationNUM;");
    $query->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $query->bindParam(":dropOffOdometer", $_POST['odometer'], PDO::PARAM_INT);
    $query->bindParam(":carstatus", $_POST['carstatus'], PDO::PARAM_STR);
    $db=null;
    if ($query->execute()){
        echo "<h3>Successfully dropped off car. Don't forget to leave feedback!</h3>";
    } else {
        // TODO: redirect
        echo "woops!!!!!";
    }
}
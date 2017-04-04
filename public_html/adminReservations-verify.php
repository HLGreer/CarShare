<?php
require("../includes/config.php");

try {
    $db = getDB();
    //Find VIN based using reservationNUM and reservation
    $query = $db->prepare("SELECT car.VIN, make, model, memberID FROM reservation, car WHERE car.VIN=reservation.VIN AND(:d BETWEEN pickUpDate AND dropOffDate);");
    $query->bindParam(":d", $_POST['d'], PDO::PARAM_STR);
    $query->execute();
    $count = $query->rowCount();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    $count = $query->rowCount();
    $db = null;
    $arr=array('VIN', 'make', 'model', 'memberID');
    if ($count) {
        echo "<h3>These cars have been rented on ".$_POST['d'].":</h3>";
        buildTable($arr, $data);
    } else {
        echo "uh oh";
    }
} catch (PDOException $e) {
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
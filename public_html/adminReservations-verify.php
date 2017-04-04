<?php
require("../includes/config.php");
$values['title'] = 'Reservation View';
render("../templates/adminReservationResults-view.php", $values, __FILE__);

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
        echo "<div class='container'><h3>These cars have been rented on ".$_POST['d'].":</h3></div>";
        buildTable($arr, $data);
        echo"</table></div>";
    } else {
        echo "<div class='container'><h3>No cars have been rented today</h3></div>";
    }

} catch (PDOException $e) {
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
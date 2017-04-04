<?php
require("../includes/config.php");
$values["title"] = "Cars in Need of Maintenance";
render("../templates/carMaintenance-view.php", $values, __FILE__);

try {
    //kms
    $conn = getDB();
    //unique VIN row for most recent odometer reading
    $stmt = $conn->prepare("SELECT rentalhistory.VIN, dropOffOdometer, odometerReading FROM rentalhistory, reservation, carmaintenance WHERE rentalhistory.VIN=reservation.VIN AND reservation.VIN=carmaintenance.VIN AND (dropOffOdometer-odometerReading >5000) AND (maintenanceType = 'scheduled');");
    $stmt->execute();
    $count = $stmt->rowCount();
    echo $count;
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $header = array("VIN", "Drop off odometer reading", "Odometer reading at last maintenance");
    buildTable($header,$result);
    $conn = null;


    //carstatus
    $conn = getDB();
    $stmt = $conn->prepare("SELECT VIN, statusOnReturn FROM rentalhistory WHERE NOT(statusOnReturn = 'normal');");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $header = array('VIN', 'Status');
    echo "<h3>Cars in need of Repairs:</h3>";
    buildTable($header,$result);
    $conn=null;

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

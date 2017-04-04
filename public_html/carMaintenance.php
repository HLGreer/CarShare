<?php
require("../includes/config.php");
$values["title"] = "Cars in Need of Maintenance";
render("../templates/carMaintenance-view.php", $values, __FILE__);

try {
    $conn = getDB();
    $stmt = $conn->prepare("SELECT VIN, statusOnReturn, dropOffOdometer, odometerReading FROM rentalhistory NATURAL JOIN reservation LEFT NATURAL OUTER JOIN carmaintenance WHERE (statusOnReturn is not 'normal' AND (dropOffDate > mDate OR maintenanceType='scheduled')) OR (dropOffOdometer- odometerReading >5000 AND (dropOffDate > mDate OR maintenanceType is not 'scheduled'))");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $raw = $stmt->fetchall();
    $result = array();
    foreach($raw as $car){
        $result['VIN'] = $raw['VIN'];
        $result['statusOnReturn'] = $raw['statusOnReturn'];
        $result['odometerReading'] = $raw['dropOffOdometer'] - $raw['odometerReading'];
    }
    buildTable(["Car VIN Number","Status of Car", "KM since last regular repair"],$result);
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

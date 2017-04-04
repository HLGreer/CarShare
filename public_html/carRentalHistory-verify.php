<?php
require("../includes/config.php");
$values["title"] = "Car Rental History";
render("../templates/carRentalHistory-results.php", $values, __FILE__);


try {
    $conn = getDB();
    $stmt = $conn->prepare("SELECT reservationNum,memberID,pickUpOdometer,dropOffOdometer,statusOnReturn,pickUpDate,daysReserved FROM rentalHistory NATURAL JOIN reservation WHERE VIN = :vin");
    $stmt->bindParam(":vin", $_POST['vin'], PDO::PARAM_INT);
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchall();
    buildTable(["Reservation Number","MemberID","PickUp Odometer","DropOff Odometer","Status On Return","PickUp Date","Number of Days Reserved"],$result);
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
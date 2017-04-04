<?php

require("../includes/config.php");
$memID= $_SESSION['memberID'];
$values["title"] = "Rental History";
render("../templates/memberRental-history.php", $values, __FILE__);
try {
    $conn = getDB();
    $stmt = $conn->prepare("SELECT reservationNum,VIN,pickUpOdometer,dropOffOdometer,statusOnReturn,make,model,year,rentalFee,pickUpDate,daysReserved FROM rentalHistory NATURAL JOIN (car NATURAL join reservation) WHERE memberID=$memID");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    buildTable(["Reservation Number","Car Number","PickUp Odometer","DropOff Odometer","Status On Return","Make","Model","Year","Rental Fee","PickUp Date","Number of Days Reserved"],$stmt->fetchAll());
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
<?php

require("../includes/config.php");

$values["title"] = "Invoice";
if (!(isset($_SESSION['adminID']))) {
    header('Location: adminLogin.php');
}


try {
    $values["memberID"] = $_POST['memberID'];
    $values["startDate"] = $_POST["month"];
    $values["endDate"] = ((new datetime($_POST["month"]))->modify('+1 month'));
    $values["endDate"] = $values["endDate"]->format('Y-m-d');

    $conn = getDB();
    $rentalStmt = $conn->prepare("SELECT reservationNum, rentalFee, daysReserved, pickUpDate FROM car NATURAL JOIN (SELECT VIN,reservationNum,daysReserved,dropOffDate,pickUpDate FROM reservation WHERE dropOffDate < '".$values["endDate"]."' AND dropoffDate > '".$values["startDate"]."') temp1 NATURAL JOIN (SELECT reservationNum FROM rentalHistory WHERE memberID = ".$values["memberID"].") temp2");
    $rentalStmt->execute();

    // set the resulting array to associative
    $rentalStmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultsRent = $rentalStmt->fetchAll();
    $values['fees'] = $resultsRent;

    $memberStmt = $conn->prepare("SELECT membershipFee,firstName,lastName from member WHERE memberID= ".$values["memberID"]);
    $memberStmt->execute();

    $resultsMem = $memberStmt->fetchAll();

// remove useless outer array
    foreach($resultsMem as $what){
        $values['memberInfo']= $what;
    }
    $conn = null;

    render("../templates/invoice-result.php", $values, __FILE__);
}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
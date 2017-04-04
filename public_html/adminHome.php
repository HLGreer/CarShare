<?php
require("../includes/config.php");
$values = [];
if (!(isset($_SESSION['adminID']))) {
    header('Location: adminLogin.php');
}
render("../templates/adminHome-view.php", $values, __FILE__);
try {
    //kms
    $conn = getDB();
    //unique VIN row for most recent odometer reading
    $stmt = $conn->prepare("SELECT *
FROM( SELECT VIN, make, model, year, COUNT(reservationNum) as numRentals 
FROM rentalhistory NATURAL RIGHT OUTER JOIN car 
GROUP BY VIN ) temp1
HAVING MIN(numRentals) OR MAX(numRentals);");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    $header = array("VIN", "Make","Model","Year","Number of Reservations");
    echo "<div class='container'>";
    buildTable($header,$result);
    echo "</div>";
    echo "</table>";
    $conn = null;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
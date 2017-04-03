<?php
require("../includes/config.php");

$tbl_name = "rentalcomments";

try {
    $db = getDB();

    //Find VIN based using reservationNUM and reservation
    $query = $db->prepare("SELECT VIN from reservation WHERE reservationNUM=:reservationNUM;");
    $query->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    $count = $query->rowCount();
    //echo $count;
    $db = null;
    if ($count == 1) {// there should only be one matching entry
        $VIN = $data;
    } else {
        echo "Uh oh... invalid reservation number";
        echo "redirect~~~";
    }
    $db = getDB();
    echo "made it past query";
    $insert = $db->prepare("INSERT INTO $tbl_name (reservationNUM, memberID, VIN, commentText, rating, NULL) VALUES (:reservationNUM, :, :memberID, :VIN, :commentText, :rating);");
    $insert->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $insert->bindParam(":rating", $_POST['rating'], PDO::PARAM_INT);
    $insert->bindParam(":commentText", $_POST['commentText'], PDO::PARAM_STR);

    //session holds memberID
    $insert->bindParam(":memberID", $_SESSION['memberID'], PDO::PARAM_INT);
    echo "your memberID is", $_SESSION['memberID'], "<br>";
    $insert->bindParam(":VIN", $VIN, PDO::PARAM_INT);
    echo "your VIN number is", $VIN;
    $result = $insert->execute();

    if ($result) {
        echo "<h1>Comment has been submitted!</h1>";
    }
} catch (PDOException $e){
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
?>
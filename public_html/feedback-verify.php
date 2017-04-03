<?php
require("../includes/config.php");

$tbl_name = "rentalcomments";

try {
    $db = getDB();

    //Find VIN based using reservationNUM and reservation
    $query = $db->prepare("SELECT VIN from reservation WHERE reservationNUM=:reservationNUM;");
    $query->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $query->execute();


    $insert = $db->prepare("INSERT INTO $tbl_name (reservationNUM, memberID, VIN, commentText, rating, NULL) VALUES (:reservationNUM, :, :memberID, :VIN, :commentText, :rating);");
    $insert->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $insert->bindParam(":rating", $_POST['rating'], PDO::PARAM_INT);
    $insert->bindParam(":commentText", $_POST['commentText'], PDO::PARAM_STR);

    //session holds memberID
    $insert->bindParam(":memberID", $_SESSION['memberID'], PDO::PARAM_INT);



    $insert->bindParam(":VIN", $_POST['VIN'], PDO::PARAM_INT);
    $result = $insert->execute();

    if ($result) {
        echo "<h1>Comment has been submitted!</h1>";
    }
} catch (PDOException $e){
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
?>
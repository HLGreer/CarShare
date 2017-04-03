<?php
require("../includes/config.php");

$tbl_name = "rentalcomments";

try {
    echo "<h1>HELLO!!!</h1>";
    $db = getDB();

    //Find VIN based using reservationNUM and reservation
    $query = $db->prepare("SELECT VIN from reservation WHERE reservationNUM=:reservationNUM;");
    $query->bindParam(":reservationNUM", $_POST['reservationNUM'], PDO::PARAM_INT);
    $query->execute();
    $count = $query->rowCount();
    echo $count;
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    if ($count) {// there should only be one matching entry
        $carsAvailable = array();
        foreach($data as $output) {
            $VIN =  $output->VIN;
        }
    } else {
        echo "Well here we are";
        //header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
    }

    //$db = null;
    $db = getDB();
    echo "made it past query";
    $insert = $db->prepare("INSERT INTO $tbl_name (reservationNUM, memberID, VIN, commentText, rating, commentReply) VALUES (:reservationNUM, :memberID, :VIN, :commentText, :rating, NULL);");
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
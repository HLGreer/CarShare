<?php
require("../includes/config.php");

$tbl_name = "car";

try {
    $db = getDB();
    $query = $db->prepare("INSERT INTO $tbl_name (VIN, make, model, year, rentalFee, parkID) VALUES (:VIN, :make, :model, :year, :rentalFee, :parkID);");
    $query->bindParam(":VIN", $_POST['VIN'], PDO::PARAM_INT);
    $query->bindParam(":make", $_POST['make'], PDO::PARAM_STR);
    $query->bindParam(":model", $_POST['model'], PDO::PARAM_STR);
    $query->bindParam(":year", $_POST['year'], PDO::PARAM_INT);
    $query->bindParam(":rentalFee", $_POST['rentalFee'], PDO::PARAM_INT);
    $query->bindParam(":parkID", $_POST['parkID'], PDO::PARAM_INT);
    $result = $query->execute();
    /*
    $query->execute(array(
        "vin" => $_POST['vin'],
        "make" => $_POST['make'],
        "model" => $_POST['model'],
        "year" => $_POST['year'],
        "rentalFee" => $_POST['rentalFee'],
        "parkID" => $_POST['parkID'])
    );*/
    //dont know what happens here ****
    if ($result) {
        echo "<h1>Car has been added!</h1>";
    }
} catch (PDOException $e){
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
?>



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

    if ($result) {
        $values["title"] = "CarAdd";
        render("../templates/addCarConfirm.php", $values, __FILE__);;
    }
} catch (PDOException $e){
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}
?>



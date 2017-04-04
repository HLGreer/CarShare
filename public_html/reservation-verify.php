<?php
require("../includes/config.php");
//print_r($_SESSION);
$date = new DateTime($_POST['resDate']);
$date->add(new DateInterval('P1D'));
//echo $date->format('Y-m-d');
/**
 * Verify and produce the query to insert a reservation into the database HERE!

echo "hello";
print_r($_POST);
echo $_POST['resDate'];
echo $_POST['lot'];
?>
 */
if (isset($_POST['resDate']) & isset($_POST['carSelect'])) {
    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("INSERT INTO reservation (VIN, memberID, pickUpDate, dropOffDate, accessCode, daysReserved) VALUES (:carSelect, :memberID, :pickUpDate, :dropOffDate, :accessCode, :resLength);");
        $query->bindParam("carSelect", $_POST['carSelect'], PDO::PARAM_STR);
        $query->bindParam("memberID", $_SESSION['memberID'], PDO::PARAM_STR);
        $query->bindParam("pickUpDate", $_POST['resDate'], PDO::PARAM_STR);
        $query->bindParam("dropOffDate", $date->format('Y-m-d'), PDO::PARAM_STR);
        $code = 698;
        $query->bindParam("accessCode", $code, PDO::PARAM_STR );
        $resLength = 1;
        $query->bindParam("resLength", $resLength, PDO::PARAM_STR );
        $result=$query->execute();
        $db = null;
        if ($result) {// there should only be one matching entry
            //$values['data'] = $data;
            $values['resDate'] = $_POST['resDate'];
            header('location: reservationSuccessful.php');
        } else {
            // no cars available on that day!!!
            echo "Well here we are";
            //header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
}
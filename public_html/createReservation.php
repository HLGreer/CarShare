<?php
require("../includes/config.php");
/**
 *
 */

if ((isset($_POST['resDate']) & (isset($_POST['lot'])))) {

echo print_r($_POST['resDate']);
    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("SELECT tempTable.* FROM (SELECT * FROM car WHERE VIN NOT IN (SELECT VIN FROM reservation WHERE ((pickUpDate <= '2017-08-09' AND dropOffDate >= '2017-08-09') OR (pickUpDate = '2017-08-09') OR (dropOffDate = '2017-08-09')) ) ) tempTable WHERE parkID=:lot;");
        $query->bindParam("resDate", $_POST['resDate'], PDO::PARAM_STR);
        $query->bindParam("lot", $_POST['lot'], PDO::PARAM_STR);
        $query->execute();
        //echo "hello" . "<br>";
        $count = $query->rowCount();
        //echo $count;
        global $data;
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        if ($count) {// there should only be one matching entry
            //display array elements
            //print_r($data);

            $carsAvailable = array();

            $values['title'] = "Choose A Car";
            $values['data'] = $data;
            $values['resDate'] = $_POST['resDate'];
            render("../templates/chooseACar-view.php", $values, __FILE__);

            /*
            foreach($data as $output) {
                genCarTableEntry($output->make, $output->model, $output->year, $output->rentalFee);
            }
            */

        } else {
            // no cars available on that day!!!
            echo "Well here we are";
            //header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }






} elseif (isset($_POST['resDate'])) {
    //echo $_POST['resDate'];
    // If the page has the location and the date requested to make
    // a reservation, you can try to execute an SQL query to
    // pull up all the cars available on that day.

    // A car is available if there is not a reservation on that day.


    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("SELECT * FROM car WHERE VIN NOT IN (SELECT VIN FROM reservation WHERE ((pickUpDate <= :resDate AND dropOffDate >= :resDate) OR (pickUpDate = :resDate) OR (dropOffDate = :resDate)));");
        $query->bindParam("resDate", $_POST['resDate'], PDO::PARAM_STR);
       // $query->bindParam("password", $_POST['password'], PDO::PARAM_STR);
        $query->execute();
        //echo "hello" . "<br>";
        $count = $query->rowCount();
        //echo $count;
        global $data;
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        if ($count) {// there should only be one matching entry
            //display array elements
            //print_r($data);

            $carsAvailable = array();

            $values['title'] = "Choose A Car";
            $values['data'] = $data;
            $values['resDate'] = $_POST['resDate'];
            render("../templates/chooseACar-view.php", $values, __FILE__);

            /*
            foreach($data as $output) {
                genCarTableEntry($output->make, $output->model, $output->year, $output->rentalFee);
            }
            */

        } else {
            // no cars available on that day!!!
            echo "Well here we are";
            //header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }


    //SELECT * FROM car LEFT OUTER JOIN (SELECT * FROM reservation WHERE ((pickUpDate > '2017-04-02' AND dropOffDate > '2017-04-02') OR (pickUpDate < '2017-04-02' AND dropOffDate < '2017-04-02'))) tempTable ON car.VIN = tempTable.VIN
} else {
    $values['title'] = 'Reserve a Car';
    render("../templates/createReservation-view.php", $values, __FILE__);
}

?>
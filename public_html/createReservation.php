<?php
require("../includes/config.php");
/**
 *
 */

//if (isset($_POST['location']) & isset($_POST['resDate'])) {
if (isset($_POST['pickupDate'])) {
    echo "Me";
    // If the page has the location and the date requested to make
    // a reservation, you can try to execute an SQL query to
    // pull up all the cars available on that day.

    // A car is available if there is not a reservation on that day.

    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("SELECT * FROM car LEFT OUTER JOIN (SELECT * FROM reservation WHERE ((pickUpDate > '2017-04-02' AND dropOffDate > '2017-04-02') OR (pickUpDate < '2017-04-02' AND dropOffDate < '2017-04-02'))) tempTable ON car.VIN = tempTable.VIN;");
        //$query->bindParam("email", $_POST['email'], PDO::PARAM_STR);
       // $query->bindParam("password", $_POST['password'], PDO::PARAM_STR);
        $query->execute();
        echo "hello" . "<br>";
        $count = $query->rowCount();
        echo $count;
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        if ($count) {// there should only be one matching entry
            //display array elements

            print_r($data);
            foreach($data as $output) {
                echo "cat";
                echo $output->VIN . "<br>";
            }
        } else {
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
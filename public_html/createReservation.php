<?php
require("../includes/config.php");
/**
 *
 */

if (isset($_POST['location']) & isset($_POST['resDate'])) {
    // If the page has the location and the date requested to make
    // a reservation, you can try to execute an SQL query to
    // pull up all the cars available on that day.

    // A car is available if there is not a reservation on that day.


    //SELECT * FROM car LEFT OUTER JOIN (SELECT * FROM reservation WHERE ((pickUpDate > '2017-04-02' AND dropOffDate > '2017-04-02') OR (pickUpDate < '2017-04-02' AND dropOffDate < '2017-04-02'))) tempTable ON car.VIN = tempTable.VIN
}

?>
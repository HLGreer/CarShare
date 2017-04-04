<?php
require("../includes/config.php");
/**
 * Checks what cars are available at a given location.
 * This does not need to verify anything - just a table straight generated and passed to
 * the View page with the appropriate information in values.
 */


// Print the array from getdate()
//print_r(getdate());
//echo "<br><br>";

// Return date/time info of a timestamp; then format the output
$mydate=getdate(date("U"));
print_r(getdate(date("U")));
//echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

try {
    $db = getDB();
    //$hash_password= hash('sha256', $dbpass); //Password encryption
    $query = $db->prepare("SELECT * FROM car WHERE VIN NOT IN (SELECT VIN FROM reservation WHERE ((pickUpDate <= :resDate AND dropOffDate >= :resDate) OR (pickUpDate = :resDate) OR (dropOffDate = :resDate)));");
    $query->bindParam("resDate", $mydate, PDO::PARAM_STR);
    //$query->bindParam("lot", $_POST['lot'], PDO::PARAM_STR);
    $query->execute();
    //echo "hello" . "<br>";
    $count = $query->rowCount();
    //echo $count;
    global $data;
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    $db = null;
    if ($count) {// there should only be one matching entry
        $values['title'] = "Available Cars Today";
        $values['mydate'] = $mydate;
        $values['data'] = $data;
        render("../templates/adminLocationAvail-view.php", $values, __FILE__);

    } else {
        // no cars available on that day!!!
        ?>
        <div class="container">
        <p>"All cars are rented today";</p>
        </div>
        <?php
        //header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
    }
} catch (PDOException $e) {
    echo '{"error":{"text":' . $e->getMessage() . '}}';
}






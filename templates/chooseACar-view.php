<?php

function genCarTableEntry($make, $model, $year, $fee, $vin) {
    echo "<tr>";
    echo "<td>" . $make . "</td>";
    echo "<td>" . $model . "</td>";
    echo "<td>" . $year . "</td>";
    echo "<td>" . "$" . $fee . ".00" . "</td>";
    echo "<td><input type='radio' name='carSelect' value=$vin; /></td>";
    echo "</tr>";
}

?>

<form id="myForm" action="../public_html/reservation-verify.php" method="post">
<div class="container">
    <h2>Make A Reservation</h2>
    <p>For <?php $date=date_create($resDate);
        echo date_format($date,"Y/m/d");
        if (isset($dropdate)) {
            echo " - " . $dropdate;
        } ?><br>
    </p>
    <p>Select A Vehicle:</p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Rental Fee</th>
            <th>Select</th>
        </tr>
        </thead>
        <tbody>
        <?php //genCarTableEntry("Nissan", "Altima", "2005", "$35" );
        //genCarTableEntry("Nissan", "Altima", "2016", "$65" );
        //print_r($data);
        foreach($data as $output) {
            genCarTableEntry($output->make, $output->model, $output->year, $output->rentalFee, $output->VIN);
        }
        ?>
        </tbody>
    </table>
    <input type="hidden" value="<?php echo $resDate ?>" name="resDate"" />
    <button type="submit">Reserve</button>
</div>
</form>

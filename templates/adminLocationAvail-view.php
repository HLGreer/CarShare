<?php
/**
 * View for the admin when checking what cars are available on a particular day.
 */

function genAvailCarTableEntry($make, $model, $year, $fee, $vin, $parkID) {
    echo "<tr>";
    echo "<td>" . $vin . "</td>";
    echo "<td>" . $parkID . "</td>";
    echo "<td>" . $make . "</td>";
    echo "<td>" . $model . "</td>";
    echo "<td>" . $year . "</td>";
    echo "<td>" . "$" . $fee . ".00" . "</td>";
    echo "</tr>";
}

?>

<div class="container">
    <h2>Cars Available</h2>
    <p>These cars are available to rent today: </p>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Vehicle ID</th>
            <th>Parking Lot ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Rental Fee</th>
        </tr>
        </thead>
        <tbody>
        <?php //genCarTableEntry("Nissan", "Altima", "2005", "$35" );
        //genCarTableEntry("Nissan", "Altima", "2016", "$65" );
        //print_r($data);
        foreach($data as $output) {
            genAvailCarTableEntry($output->make, $output->model, $output->year, $output->rentalFee, $output->VIN, $output->parkID);
        }
        ?>
        </tbody>
</div>

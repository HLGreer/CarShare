<?php

function genCarTableEntry($make, $model, $year, $fee) {
    echo "<tr>";
    echo "<td>" . $make . "</td>";
    echo "<td>" . $model . "</td>";
    echo "<td>" . $year . "</td>";
    echo "<td>" . $fee . "</td>";
    echo "</tr>";
}
?>


<div class="container">
    <h2>Striped Rows</h2>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
    <table class="table table-striped">
        <thead>
        <tr>
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
            genCarTableEntry($output->make, $output->model, $output->year, $output->rentalFee);
        }
        ?>
        </tbody>
    </table>
</div>

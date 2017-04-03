<?php
class MySQLTable
{

    public function buildTable($columns, $result_set)
    {
        //Create an empty table
        $table = '';
        $table .= '<table border="1" class="table table-bordered">';

        //Build the column structure, passed in from the $columns array
        $table .= "<tr>";
        foreach ($columns as $column) {
            $table .= "<td>$column</td>";
        }
        $table .= "</tr>";

        //Build the rows from the $result_set array
        foreach ($result_set AS $array) {
            $table .= "<tr>";
            //Pass each nested array to the table as a single row
            //per nested array
            foreach ($array AS $table_cell) {
                $table .= "<td>$table_cell</td>";
            }
            //Placeholder for adding additional columns (usually button columns)
//            $table .= "<td><button type='button'>Test</button></td>";

            $table .= "</tr>";
        }
        echo $table;
    }

}
require("../includes/config.php");
$memID= $_SESSION['memberID'];
$values["title"] = "Rental History";
render("../templates/memberRental-history.php", $values, __FILE__);
try {
    $conn = getDB();
    $stmt = $conn->prepare("SELECT reservationNum,VIN,pickUpOdometer,dropOffOdometer,statusOnReturn,make,model,year,rentalFee,pickUpDate,daysReserved FROM rentalHistory NATURAL JOIN (car NATURAL join reservation) WHERE memberID=$memID");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    MySQLTable::buildTable(["Reservation Number","Car Number","PickUp Odometer","DropOff Odometer","Status On Return","Make","Model","Year","Rental Fee","PickUp Date","Number of Days Reserved"],$stmt->fetchAll());
    }

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
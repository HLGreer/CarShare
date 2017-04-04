<?php
require("../includes/config.php");
require("../templates/header.php");
$tbl_name = "rentalcomments";

//generate list of comments that have commentText!=null and a null==commentReply
echo "<div class='container'> <style>
    input[type='text'] {
    width:400px;
    height:40px;
    }
    table, th, td {
        border: 1px solid black;
        padding: 8px;
    }
    </style>
    </div>";
echo "<div class='container'> <h1>Comments</h1>
    <h3>Note that comments are ordered chronologically (oldest first).</h3>
    <h4>If you don't see anything here, then there are no comments to reply to yet!</h4><br></div>";
$db = getDB();
$query = $db->prepare("SELECT VIN, rating, commentText, reservationNUM FROM $tbl_name WHERE (commentText IS NOT NULL) AND (commentReply IS NULL) ORDER BY reservationNUM;");
$query->execute();
$count = $query->rowCount();
$data = $query->fetchAll(PDO::FETCH_OBJ);
$db = null;
if ($count) {
    echo"<div class='container'><table border='1' class='table table-bordered'>
        <th>VIN</th>
        <th>Rating</th>
        <th>Comment</th>
        <th>Reply Here!</th>";
    $carsAvailable = array();
    foreach ($data as $output) {
        $resNUM = $output->reservationNUM;
        echo "<tr><td>", $output->VIN, "</td><td>",
        $output->rating, "</td><td>",
        $output->commentText, "</td><td><form action='../public_html/reply-verify.php' method='post'><input type='text' name='".$resNUM."'><br><input type='submit' value='Reply'></form></td></tr>";
    }
    echo "</table></div>";
}
//show car vin, rating, comment

//reply field associated with each comment

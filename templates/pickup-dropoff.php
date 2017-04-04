
<h1>Pick up / Drop off</h1>

<!--
Should only show form if member has made a reservation!
-->
<form action="../public_html/pickup-dropoff-verify.php" method="post">
    Reservation Number<br>
    <input type="number" name="reservationNUM"><br>
    Dropoff or Pickup? <br>
    <input type="radio" name="pord" value="dropoff">Dropoff <br>
    <input type="radio" name="pord" value="pickup">Pickup <br>
    Date? <br>
    <input type="date" name="d"> <br>
    <br>
    Odometer Reading? (how many kms) <br>
    <input type="number" min="0" max="1000000" name="odometer"><br>
    <br>
    If dropoff, what is the car's status? <br>
    <input type ="radio" name="carstatus" value="normal">Normal <br>
    <input type ="radio" name="carstatus" value="damaged">Damaged <br>
    <input type ="radio" name="carstatus" value="not running">Not running <br>
    <br>
    <input type="submit" value="Submit">
</form>
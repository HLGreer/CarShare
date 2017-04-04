


<!--
Should only show form if member has made a reservation!
-->
<div class="container" id="signup-form">
    <h1>Pick up / Drop off</h1>
    <form action="../public_html/pickup-dropoff-verify.php" method="post">
        <div class="form-group">
            <label for="ReservationNumber">Reservation Number</label>
            <input class="form-control" type="number" name="reservationNUM">

            <label for="Dropoff/pickup">Dropoff or Pickup? </label><br>
            <input type="radio" name="pord" value="dropoff">Dropoff<br>
            <input type="radio" name="pord" value="pickup">Pickup<br>

            <label for="date">Date? </label>
            <input class="form-control" type="date" name="d">

            <label for="odometer">Odometer Reading? (how many kms)</label> <br>
                <input class="form-control" type="number" min="0" max="1000000" name="odometer"><br>


            <label for="Status">If dropoff, what is the car's status? </label><br>
                <input type ="radio" name="carstatus" value="normal">Normal <br>
                <input type ="radio" name="carstatus" value="damaged">Damaged <br>
                <input type ="radio" name="carstatus" value="not running">Not running <br>

        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>


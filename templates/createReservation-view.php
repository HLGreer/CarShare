<div class="container" id="reservation">
    <h2>Reserve</h2>
    <form action="../public_html/createReservation.php" method="post">
        Pick preferred date, duration and/or location(s) to start reserving a car!<br>
        <label for="pickupDate">Pickup Date</label>
            <input type="date" name="resDate">
        <label for="rentDuration">For how many days?</label>
            <input type="number" name="rentDuration" min="1">
        <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="sel1" name="lot">
                <option disabled selected value> -- select an option -- </option>
                <option value="1">Lot 1</option>
                <option value="2">Lot 2</option>
                <option value="3">Lot 3</option>
                <option value="4">Lot 4</option>
            </select>
        </div>
        <input type="reset" value="Reset">
        <input type="submit" value="Apply">
    </form>
</div>


This currently only works for the pick up Date.
Need to only select one lot at a time (this gets too difficult otherwise.)
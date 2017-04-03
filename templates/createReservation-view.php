<h1>Welcome!</h1>
    <h2>Reserve</h2>
    <form action="../public_html/createReservation.php" method="post">
        Pick preferred date, duration and/or location(s) to start reserving a car!<br>
        <label for="pickupDate">Pickup Date</label>
            <input type="date" name="pickupDate">
        <label for="rentDuration">For how many days?</label>
            <input type="number" name="rentDuration" min="1">
        <label for="lot">Location(s)</label>
            <input type="checkbox" name="lot" value="1"> Lot 1
            <input type="checkbox" name="lot" value="2"> Lot 2
            <input type="checkbox" name="lot" value="3"> Lot 3 <br>
        <input type="reset" value="Reset">
        <input type="submit" value="Apply">
    </form>
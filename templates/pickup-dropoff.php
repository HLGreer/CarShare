
<h1>Pick up / Drop off</h1>

<!--
Should only show form if member has made a reservation!
-->
<form>
    Dropoff or Pickup? <br>
    <input type="radio" name="pord" value="dropoff">Dropoff <br>
    <input type="radio" name="pord" value="pickup">Pickup <br>
    Reservation ID: <input type="text" name="id"> <br>
    <br>
    Date and time? <br>
    <input type="datetime-local" name="usrtime"> <br>
    <br>
    Odometer Reading? (how many kms) <br>
    <input type="number" min="0" max="1000000"<br>
    <br>
    Car Status? <br>
    <input type ="radio" name="carstatus" value="normal">Normal <br>
    <input type ="radio" name="carstatus" value="damaged">Damaged <br>
    <input type ="radio" name="carstatus" value="notRunning">Not running <br>
    <br>
    <input type="submit" value="Submit">
</form>
<div class="container">
<h1>Add Car to Fleet</h1>

<!--
Admin only
-->
<form action="../public_html/add-car-verify.php" method="post">
    <div class="form-group">
        <label for="make">Make:</label>
        <input class="form-control" type="text" name="make" required>
    </div>
    <div class="form-group">
        <label for="model">Model:</label>
        <input class="form-control" type="text" name="model" required><br>
    </div>
    <div class="form-group">
        <label for="number">Year:</label>
        <input class="form-control" type="number" name="year" required><br>
    </div>
    <div class="form-group">
        <label for="VIN">VIN:</label>
        <input class="form-control" type="number" name="VIN" required><br>
    </div>
    <div class="form-group">
        <label for="fee">Rental Fee:</label>
        <input class="form-control" type="number" name="rentalFee" required><br>
    </div>
    <div class="form-group">
        <label for="parkID">Park ID:</label>
        <select class="form-control" name="parkID">
            <option value="1">Lot 1</option>
            <option value="2">Lot 2</option>
            <option value="3">Lot 3</option>
        </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
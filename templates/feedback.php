<?php
?>
<form>
    <label for="rentalID">Rental ID:
        <input type="number" name="rentalID"><br>
    <label for="rating">Rating (5 being highest):</label>
        5<input type="radio" name="rating" value="5">
        4<input type="radio" name="rating"value="4">
        3<input type="radio" name="rating" value="3">
        2<input type="radio" name="rating"value="2">
        1<input type="radio" name="rating"value="1"><br>
    <label for="comment">Comment:</label><br>
    <input type="text" name="comment" class="form-control" rows="3" id="comment"><br>
    <input type="submit" value="Submit">
</form>
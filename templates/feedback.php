<?php
?>
<form action="../public_html/feedback-verify.php" method="post">
    <label for="reservationNUM">Reservation number:
        <input type="number" name="reservationNUM" required><br>
    <label for="rating">Rating (5 being highest):</label>
        5<input type="radio" name="rating" value="5" checked>
        4<input type="radio" name="rating"value="4">
        3<input type="radio" name="rating" value="3">
        2<input type="radio" name="rating"value="2">
        1<input type="radio" name="rating"value="1"><br>
    <label for="commentText">Comment:</label><br>
    <input type="text" name="commentText" class="form-control" rows="3" id="comment"><br>
    <input type="submit" value="Submit">
</form>
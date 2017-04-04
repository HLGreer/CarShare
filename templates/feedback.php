<?php
?>
<div id="signup-form">
    <form action="../public_html/feedback-verify.php" method="post">
        <div class="form-group">
            <label for="reservationNUM">Reservation number:</label>
                <input class="form-control" type="number" name="reservationNUM" required><br>
            <label for="rating">Rating (5 being highest):</label>
                5<input type="radio" name="rating" value="5" checked>
                4<input type="radio" name="rating"value="4">
                3<input type="radio" name="rating" value="3">
                2<input type="radio" name="rating"value="2">
                1<input type="radio" name="rating"value="1"><br>
            <label for="commentText">Comment:</label><br>
                <input class="form-control" type="text" name="commentText" class="form-control" rows="3" id="comment"><br>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

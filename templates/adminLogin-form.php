<?php

?>
<div class="container" id="signup-form">
    <form action="../public_html/adminLogin-verify.php" method="post">
        <div class="form-group">
            <label for="ID">adminID</label>
            <input class="form-control" type="int" placeholder="ID" name="adminID">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-default">Login</button>
    </form>
</div>

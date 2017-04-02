<?php
if(isset($values['message'])) {
    $msg = "error-message";
    echo "<p class=$msg>" . $values['message'] . "</p>";
}
?>
<div id="signup-form">
    <form action="../public_html/login-verify.php" method="post">
        <div class="form-group">
            <label for="Email">Email</label>
            <input class="form-control" type="text" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-default">Login</button>
    </form>
    <br>
    <p>Don't have an account? <a href="../public_html/signup.php">Create one!</a></p>
</div>



<!--
Need to generate a memberID
-->

<div class="container" id="signup-form">
    <h1>Sign Up Now!</h1>
    <br>
    <div class=container id="promotion">
    <p>Promotion: Membership Fee has been rolled back to $34.00/month!<br>
    You will not be charged until you use the service for the first time.</p>
        <br>
    </div>
    <form action="../public_html/signup-verify.php" method="post">
        <div class="form-group">
            <label for="Firstname">First Name</label>
            <input class="form-control" type="text" placeholder="John" name="first">
        </div>
        <div class="form-group">
            <label for="Lastname">Last Name</label>
            <input class="form-control" type="text" placeholder="Doe" name="last">
        </div>
        <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input class="form-control" type="email" placeholder="john@doe.com" name="email">
        </div>
        <div class="form-group">
            <label for="Age">Age</label>
            <input class="form-control" type="text" placeholder="25" name="age">
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <input class="form-control" type="text" placeholder="123 Anywhere Street" name="address">
        </div>
        <div class="form-group">
            <label for="phoneNum">Phone Number</label>
            <input class="form-control" type="text" placeholder="5558675309" name="phoneNum">
        </div>
        <div class="form-group">
            <label for ="licenceNum">License Number</label>
            <input type="text" name="licenceNum" placeholder="D61014070660905">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

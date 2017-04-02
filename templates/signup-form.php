<div id="signTitle">
    <h1>Sign Up Now!</h1>
</div>

<!--
Need to generate a memberID
-->

<div id="signup-form">
    <div action="../public_html/new_member.php" method="post">
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
            <input class="form-control" type="text" placeholder="8675309" name="phoneNum">
        </div>
        <div class="form-group">
            <label for ="licenceNum">License Number</label>
            <input type="text" name="licenceNum">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

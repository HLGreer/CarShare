<div id="signTitle">
    <h1>Sign Up Now!</h1>
</div>
<div id="signup-form">
    <form action="../public_html/new_member.php" method="post">
        <div class="form-group">
            <label for="Firstname">First Name</label>
            <input class="form-control" type="text" placeholder="John" name="first">
        </div>
        <div class="form-group">
            <label for="Lastname">Last Name</label>
            <input class="form-control" type="text" placeholder="Doe" name="last">
        </div>
        <div class="form-group">
            <label for="Username">Username</label>
            <input class="form-control" type="text" placeholder="Username" name="username">
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
            <label for="Province">Province</label>
            <input class="form-control" type="text" placeholder="ON" name="province">
        </div>
        <div class="form-group">
            <label for="Postal">Postal Code</label>
            <input class="form-control" type="text" placeholder="Zip Code" name="postal">
        </div>
        <div class="form-group">
            <label for="Pet">I would like to adopt a (Dog, Cat, Rabbit)</label>
            <input class="form-control" type="text" placeholder="Dog" name="pet">
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="medical"> I'm open to adopting a pet with medical issues.
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox" name="experience"> I have owned a pet before.
            </label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

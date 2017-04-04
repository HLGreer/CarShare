<div class="container">
    <h1>
        Create Invoice for a given member
    </h1>

    <form action="../public_html/invoice-verify.php" method="post">
        <div class="form-group">
            <label for="memberID">Member ID</label>
            <input class="form-control" type="number" name="memberID" required>

            <label for="month">Month</label>
            <input class="form-control" type="date" name="month" required>
        </div>

        <button type="submit" class="btn btn-default">Create</button>
    </form>
    <br>
</div>
<?php
require("../includes/config.php");

// used to connect to the database

$tbl_name = "member";
if ((isset($_POST['email'])) & (isset($_POST['password']))) {

    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("SELECT * FROM $tbl_name WHERE email=:email AND password_hash=:password");
        $query->bindParam("email", $_POST['email'], PDO::PARAM_STR);
        $query->bindParam("password", $_POST['password'], PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $db = null;
        if ($count == 1) {// there should only be one matching entry
            echo "Hello";
            $_SESSION['memberID'] = $data->memberID; // Storing user session value
            echo $_SESSION['memberID'];
            //header('Location: memberHome.php');
        } else {
            header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
} else {
    header('Location: login.php');
    echo "hello";
}






<?php
require("../includes/config.php");

// used to connect to the database

$tbl_name = "admin";
if ((isset($_POST['adminID'])) & (isset($_POST['password']))) {

    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("SELECT * FROM $tbl_name WHERE adminID=:adminID AND password_hash=:password");
        $query->bindParam("adminID", $_POST['adminID'], PDO::PARAM_STR);
        $query->bindParam("password", $_POST['password'], PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $db = null;
        if ($count == 1) {// there should only be one matching entry
            //echo "Hello";
            $_SESSION['user_type'] = "admin"; //define if member or admin
            $_SESSION['adminID'] = $data->adminID; // Storing user session value
            //echo $_SESSION['memberID'];
            header('Location: adminHome.php');
        } else {
            header('Location: adminLogin.php'); // TODO: We should add an error message if redirect to login.php
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
} else {
    header('Location: adminLogin.php');
    echo "hello";
}






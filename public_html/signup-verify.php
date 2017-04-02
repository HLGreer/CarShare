<?php
require("../includes/config.php");

/**
 *
 */
$tbl_name = "member";
if (!isset($_SESSION['memberID'])) {

    try {
        $db = getDB();
        //$hash_password= hash('sha256', $dbpass); //Password encryption
        $query = $db->prepare("INSERT INTO $tbl_name (password_hash, address, firstName, lastName, email, phoneNum, driverLicence, membershipFee) VALUES (:password, :address, :firstName, :lastName, :email, :phoneNum, :DLicense, 34);");
        $query->bindParam("email", $_POST['Email'], PDO::PARAM_STR);
        $query->bindParam("password", $_POST['Password'], PDO::PARAM_STR);
        $query->bindParam("address", $_POST['Address'], PDO::PARAM_STR);
        $query->bindParam("firstName", $_POST['Firstname'], PDO::PARAM_STR);
        $query->bindParam("lastName", $_POST['Lastname'], PDO::PARAM_STR);
        $query->bindParam("phoneNum", $_POST['phoneNum'], PDO::PARAM_STR);
        $query->bindParam("DLicense", $_POST['licenseNum'], PDO::PARAM_STR);
        //$query->bindParam("fee", 34, PDO::PARAM_STR);
        $query->execute();

        $count = $query->rowCount();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $db = null;
        if ($count == 1) {// there should only be one matching entry
            echo "Hello";
            //$_SESSION['memberID'] = $data->memberID; // Storing user session value
            //echo $_SESSION['memberID'];
            //header('Location: memberHome.php');
        } else {
            header('Location: login.php'); // TODO: We should add an error message if redirect to login.php
        }
    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
} else {
    header('Location: memberHome.php');
    //echo "hello";
}
echo "HEllO??";

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
        $query->bindParam("email", $_POST['email'], PDO::PARAM_STR);
        $query->bindParam("password", $_POST['password'], PDO::PARAM_STR);
        $query->bindParam("address", $_POST['address'], PDO::PARAM_STR);
        $query->bindParam("firstName", $_POST['first'], PDO::PARAM_STR);
        $query->bindParam("lastName", $_POST['last'], PDO::PARAM_STR);
        $query->bindParam("phoneNum", $_POST['phoneNum'], PDO::PARAM_STR);
        $query->bindParam("DLicense", $_POST['licenseNum'], PDO::PARAM_STR);
        //$query->bindParam("fee", 34, PDO::PARAM_STR);
        $result = $query->execute();
        if ($result) {
            header('Location: login.php');
        } else {
            header('Location: signup.php');
        }

    } catch (PDOException $e) {
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }
} else {
    header('Location: memberHome.php');
    //echo "hello";
}
echo "HEllO??";

<?php
/**
 * Adds a new member to the database
 */

require("../includes/config.php");
$newMemberData = array();

$newMemberData['firstname'] = $_POST['first'];
$newMemberData['lastname'] = $_POST['last'];
$newMemberData['email'] = $_POST['email'];
$newMemberData['username'] = $_POST['username'];
$newMemberData['hash'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
$newMemberData['age'] = $_POST['age'];
$newMemberData['address'] = $_POST['address'];
$newMemberData['prov'] = $_POST['province'];
$newMemberData['postal'] = $_POST['postal'];
$newMemberData['animalToAdopt'] = $_POST['pet'];
$newMemberData['adoptWithMedical'] = True;
$newMemberData['previousOwnership'] = True;

$json = json_encode($newMemberData);

$url = 'http://www.robcardy.com/api/member/';


$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERPWD, "cardy31" . ":" . "JA83nq&E");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $newMemberData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

$values['title'] = "Member Area";
render("../templates/login-form.php", $values, __FILE__);


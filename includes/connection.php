<?php
/**
 * Holds the information to connect to the appropriate database.
 */

// used to connect to the database
function getDB()
{
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='mysql';
    $dbname='KTownCars';

    try {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
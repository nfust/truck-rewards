<?php

$servername = "database-1.c0pt40lcpl02.us-east-1.rds.amazonaws.com";
$username = "admin";
$dbname = "FustEdsonCooleyLee_oook";
$password = "wearein4910";

$link = new mysqli($servername, $username, $password);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
?>

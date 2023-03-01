<?php

$servername = "sql204.epizy.com";
$dbusername = "epiz_33674324";
$dbpassword = "HwAPCW4nBL";
$dbname = "epiz_33674324_login";


$conn = mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
if ($conn-> connect_error){
    die ("Failed to connect: ".$conn-> connect_error);
}   
<?php

$myServer = "localhost";
$myUser = "root";
$myPass = "";
$myDB = "postenergy";


//connection to the mysql database
$dbhandle = mysqli_connect($myServer, $myUser, $myPass, $myDB) or die("Couldn't connect to Mysql on $myServer");
//$selected = mysqli_select_db($myDB, $dbhandle) or die("Couldn't open database $myDB");

?>

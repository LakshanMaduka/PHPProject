<?php
$serverName="localhost";
$dbUserName ="my";
$dbPassword = "Maduka12@";
$dbName="myschool";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);
if(!$conn){
 die("Connection failed :" .mysqlI_connect_error());
}
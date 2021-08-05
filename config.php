<?php
session_start();
$dbHost = 'localhost';
$dbName = 'teacherdocdb';
$dbUsername = 'root';
$dbPassword = '';
$dbc= mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName); 
?>
<?php

$host = 'localhost';
$user = 'root';
$password = '';
$databaseName = 'executiveClass_db';

$connect = mysqli_connect($host, $user, $password, $databaseName);

if (!$connect) {
    echo "Connection not successful";
} 

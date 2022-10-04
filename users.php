<?php
    require('conn.php');


    $query = "SELECT * FROM users_tb WHERE first_name='Janet'";
    $getUsers = mysqli_query($connect, $query);
    // print_r($getUsers);
    $users = mysqli_fetch_all($getUsers);
    print_r($users);

?>
<?php
require('conn.php');
session_start();

$name = "Joy";
$num = 9;

$arr = ['Joy', 6, true, '', 4.15];
$cars = array("Ford", "Mercedes", "Lamborgini");
var_dump($cars);

    if (isset($_POST['signup'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users_tb WHERE email='$email'";
        $check = mysqli_query($connect, $query);

        if (mysqli_num_rows($check) > 0) {
            echo "User already exists";
        } else {
            if (strlen($password) < 8) {
                echo "Password must be 8 characters or more";
            } else if(empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
                // echo "Welcome"." ".$firstname." ".$lastname;
                echo "Details cannot be empty. Fill all fields";
            }else {
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);


                $form = "INSERT INTO `users_tb`(`first_name`, `last_name`, `email`, `password`) VALUES('$firstname', '$lastname', '$email', '$hashPassword')";
                $inputCheck = mysqli_query($connect, $form);
                if ($inputCheck) {
                    echo "User saved successfully";
                    $_SESSION['message'] = "Sign up successful";
                    header("location: login.php");
                }else {
                   echo "Error occurred";
                }
                
            }
        }
    }
?>
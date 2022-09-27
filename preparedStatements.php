<?php
require('conn.php');
    $firstName = "Joy";
    $lastName = "Adeola";
    $email = "joyadeola1@gmail.com";
    $password = password_hash("joyadeola", PASSWORD_DEFAULT);

    $emailQuery = "SELECT * FROM users_tb WHERE email=?";
    $data = $connect->prepare($emailQuery);
    $data->bind_param('s', $email);
    $data->execute();
    $user = mysqli_stmt_get_result($data);
    
    


    if(mysqli_num_rows($user) > 0) {
        echo "E-mail already exists";
    }else {
        
            // Prepare the statement
            $query = "INSERT INTO `users_tb`(`first_name`, `last_name`, `email`, `password`) VALUES(?, ?, ?, ?)";
            $prepare = $connect->prepare($query);
        
            // Bind parameters with the statement
            $prepare->bind_param('ssss', $firstName, $lastName, $email, $password);
        
            // Execute
            $check = $prepare->execute();
        
            if($check) {
                echo "Saved successfully";
            }else {
                echo "Error occurred";
            }

    }
?>
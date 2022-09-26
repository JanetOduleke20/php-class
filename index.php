<?php
    $name = "Janet";
    // echo $name;

    $surname = "Oduleke";
    // echo $name." ".$surname;

    // echo strlen($name);
    // echo strrev($name);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <form action="submit.php" method="POST">
        <div class="container mx-auto mt-4">
            <?php 
            session_start();
                if(isset($_SESSION['message'])) {
                    echo "<div>".$_SESSION['message']."</div>";
                }
            // session_unset();
            ?>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="form-group">
                <label for="email">E-mail Address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <input type="submit" name="signup" value="Sign up" class="btn btn-md w-100 bg-info">
            </div>
        </div>
    </form>
</body>
</html>
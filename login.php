<?php
session_start();
    require('conn.php');

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users_tb WHERE email='$email'";
        $foundDetails = mysqli_query($connect, $query);

        if (mysqli_num_rows($foundDetails) > 0) {
          $user = mysqli_fetch_array($foundDetails);
        //   print_r($user);
        $userPassword = $user['password'];
        $verify = password_verify($password, $userPassword);

        if ($verify) {
            $user_id = $user['id'];
            $_SESSION['user_id'] = $user_id;
            header("location: dashboard.php");
        }else {
            $_SESSION['response'] = "Password is not correct";
            header("location: login.php");
        }
        }else{
            $_SESSION['response'] = "E-mail not found";
            header("location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container mx-auto mt-4 col-6">
        <div class="card p-2">
            <div class="card-header">
                <h4 class="text-center">Login</h4>
            </div>
            <div class="card-body">
                <form <?php echo $_SERVER['PHP_SELF'] ?> method="POST">
                    <?php
                        if (isset($_SESSION['response'])) {
                            echo "<p class='text-danger text-center'>".$_SESSION['response']."</p>";
                        }
                    ?>
                    
                    <div class="form-group mt-2">
                        <label for="">E-mail Address</label>
                        <input type="email" class="form-control" placeholder="E-mail Address" name="email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group mt-2 ">
                        <input type="submit" value="Log in" name="login" class="btn btn-md bg-info text-light mx-auto">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    require('conn.php');
    session_start();

    $user_id =  $_SESSION['user_id'];
    $query = "SELECT * FROM users_tb WHERE id='$user_id'";
    $found = mysqli_query($connect, $query);

    $user = mysqli_fetch_array($found);

  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <table class="table">
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>E-mail Address</td>
        </tr>

        <tr>
            <td><?php echo $user['id'] ?></td>
            <td><?php echo $user['first_name'] ?></td>
            <td><?php echo $user['last_name'] ?></td>
            <td><?php echo $user['email'] ?></td>

        </tr>
    </table>

    <div class="container col-md-d-flex">
        <form action="posts.php" method="post" enctype="multipart/form-data">
            <?php
                if (isset($_SESSION['userResponse'])) {
                    echo "<p class='text-danger text-center'>".$_SESSION['userResponse']."</p>";
                }
                if (isset($_SESSION['response'])) {
                    echo "<p class='text-danger text-success'>".$_SESSION['response']."</p>";
                    
                }
            ?>

            <div>
                <textarea name="post" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
                <input type="file" name="files[]" multiple>
                <input type="submit" value="Post" class="btn btn-md bg-info text-light" name="submitPost">
            </div>

        </form>
    </div>
</body>
</html>
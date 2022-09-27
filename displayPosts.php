<?php
    require('conn.php');

    $query = "SELECT * FROM posts_tb";
    $posts = mysqli_query($connect, $query);
    $postsArray = mysqli_fetch_all($posts);
    // print_r($postsArray);

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DISPLAY</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
       
        <?php
            foreach ($postsArray as $index => $post) {
                $userQuery = "SELECT first_name, last_name FROM users_tb WHERE id='$post[2]'";
                $user = mysqli_query($connect, $userQuery);
                $userDetails = mysqli_fetch_array($user);

                $imageQuery = "SELECT name FROM images_tb WHERE post_id='$post[0]'";
                $images = mysqli_query($connect, $imageQuery);
                $postImages = mysqli_fetch_array($images);
                echo "
                <div class='card col-4 mb-2 px-2'>
                    <div class='card-header'>
                        <span class='fw-bold'>$userDetails[first_name] $userDetails[last_name]</span>
                    </div>
                    <div class='card-body'>
                        <p> $post[1]</p>
                        <div class='card-image'>
                        <img src='uploads/$postImages[name]' width='100px'>
                        </div>
                    </div>
                </div>";
            }
        ?>
    </div>
</body>
</html>
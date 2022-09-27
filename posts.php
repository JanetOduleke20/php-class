<?php
    require('conn.php');
    session_start();

    if (isset($_POST['submitPost'])) {
        $allowed_extensions = array('png', 'jpg', 'jpeg');

        $post = $_POST['post'];
        $id = $_SESSION['user_id'];
        $files = $_FILES['files'];
        $time = date('Y-m-d');

        $query = "INSERT INTO `posts_tb`(`post`, `users_id`, `post_time`) VALUES('$post', '$id', '$time')";
        $check = mysqli_query($connect, $query);
        if ($check) {
            for ($i=0; $i < count($_FILES['files']['name']); $i++) { 
                $file_name = $files['name'][$i];
                $file_size = $files['size'][$i];
                $file_tmp = $files['tmp_name'][$i];
                
                $file_ext = explode('.', $file_name);
                $ext = strtolower(end($file_ext));

                $newFileName = time().'.'.$ext;
            
                if (in_array($ext, $allowed_extensions)) {
                    if ($file_size < 100000000) {
                        $target_dir = "uploads/".$newFileName;
                        $uploadFile = move_uploaded_file($file_tmp, $target_dir);

                        if ($uploadFile) {
                            $getPost = "SELECT id FROM posts_tb WHERE users_id='$id'";
                            $checkPost = mysqli_query($connect, $getPost);
                            $posts = mysqli_fetch_all($checkPost);
                            
                            $post_id = end($posts)[0];
                            print_r($post_id);
    
                            $imageQuery = "INSERT INTO `images_tb`(`name`, `post_id`) VALUES('$newFileName', '$post_id')";
                            $checkImage = mysqli_query($connect, $imageQuery);
    
                            if ($checkImage) {
                                $_SESSION['response'] = "Post uploaded successfully";
                                header("location: dashboard.php");
                            } else {
                                $_SESSION['userResponse'] = "Error occurred. Please try again";
                                header("location: dashboard.php");
                            }
                        } else {
                            $_SESSION['userResponse'] = "Error occurred. Please try again";
                            header("location: dashboard.php");
                        }
                    } else {
                        $_SESSION['userResponse'] = "File size is too large. Please upload a lesser file";
                        header("location: dashboard.php");
                    }
                    
                }else {
                    $_SESSION['userResponse'] = "File type is not allowed";
                    header("location: dashboard.php");
                }
            }
        } else {
            echo "Error occurred";
        }
        


    }

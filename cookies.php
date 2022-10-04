<?php
require('conn.php');

$email = '';

$query = "SELECT id FROM users_tb WHERE email=?";
$prepare = $connect->prepare($query);
$prepare->bind_param('s', $email);
$prepare->execute();

$result = mysqli_stmt_get_result($prepare);
$user = mysqli_fetch_array($result);
// print_r($user);

$cookie_name = "user_id";
setcookie($cookie_name, $user['id'], time() + 86,400, "/");
echo $_COOKIE["user_id"];

?>
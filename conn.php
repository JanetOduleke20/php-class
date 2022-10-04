<?php
// class Connection {
//     private $host = 'localhost';
//     private $user = 'root';
//     private $password = '';
//     private $databaseName = 'executiveClass_db';

//     public $connect;

//     public function connect()
//     {
//         $this->connect = mysqli_connect($this->host, $this->user, $this->password, $this->databaseName);

//         if (!$this->connect) {
//             echo "Connection not successful";
//         } 
//     }
// }

// $connect = new Connection;



$host = 'localhost';
$user = "root";
$password = '';
$databaseName = 'executiveClass_db';

$connect = mysqli_connect($host, $user, $password, $databaseName);

if (!$connect) {
    echo "Connection not successful";
}
?>

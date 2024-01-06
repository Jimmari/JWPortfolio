<?php
$servername = "localhost";
$username = "root";
$password = "3151@Jim";
$db_name = "signuplogin";
$conn = new mysqli($servername, $username, $password, $db_name);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
echo "";

?>
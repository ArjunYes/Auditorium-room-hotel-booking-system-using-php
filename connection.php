<?php
$username = "sunshine"; 
$password = "123";
$db = "sunshine";
$host = "localhost";

$conn = mysqli_connect($host, $username, $password, $db);
if($conn){
	echo " &nbsp";
}else{
	echo "DID NOT CONNECT";
}

?>
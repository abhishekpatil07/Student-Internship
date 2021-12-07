<?php

 $host = 'localhost';
 $user = 'root';
 $pass = '';
 $db_name = 'project1';

$conn = new MySQLi($host,$user,$pass,$db_name);//to connect to database
if($conn->connect_error){
    die('database connection error:' .$conn->connect_error);
}/*else{
	echo 'Success';
}*/
?>
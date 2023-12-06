<?php
$severname="localhost";
$username="root";
$password="";
$database="notes"
$conn=mysqli_connect($severname,$username,$password,$database);
if(!$conn){
    die("connection fail due to this err".mysqli_error($conn));
}
else{
    echo"connection successful";
}
?>
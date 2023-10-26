<?php
$conn = mysqli_connect("localhost","root","","submit");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
$tb = "INSERT INTO reg(name,password) VALUES ('$name','$password')";
if(mysqli_query($conn,$tb))
{
    echo "Account is Created";
}
}
?>
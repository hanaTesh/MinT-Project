<?php
$conn = mysqli_connect("localhost","root","","submit");
$tb = "CREATE TABLE reg(
    name varchar(50),
    password varchar(50)
)";
// $name = "admin";
// $password = "password";

// $in = "INSERT INTO reg (name, password) VALUES ('$name', '$password')";
// mysqli_query($conn, $in);
if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $query = "SELECT * FROM reg WHERE name='$name' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['name'] = $name;
        header("Location: admins_page.html"); // Redirect to the dashboard page
        exit();
    } else {
        echo "Invalid username or password";
    }
}

?>
<?php// update_status.php
$conn = mysqli_connect("localhost","root","","submit");
// Get data
$id = mysqli_real_escape_string($conn, $_POST['id']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
// Update query
$sql = "UPDATE complains SET status='$status' WHERE id=$id"; 

mysqli_query($conn, $sql);
if(!mysqli_query($conn, $sql)) {
    echo "Error updating status: " . mysqli_error($conn);
  }

?>
<?php
$conn = mysqli_connect("localhost","root","","submit");

$checkColumnQuery = "SELECT COUNT(*) FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='submit' AND TABLE_NAME='complain' AND column_name='status'";
$result = mysqli_query($conn, $checkColumnQuery);
$count = mysqli_fetch_array($result)[0];

if ($count == 0) {
  $alterTableQuery = "ALTER TABLE complain ADD COLUMN status VARCHAR(255) DEFAULT 'requested'";
  if(mysqli_query($conn, $alterTableQuery)) {
    echo "Status column added successfully.<br>";
  } else {
    echo "Error adding status column: " . mysqli_error($conn) . "<br>";
  }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $device = mysqli_real_escape_string($conn, $_POST['device']);
  $problem = mysqli_real_escape_string($conn, $_POST['problem']);
  $department = mysqli_real_escape_string($conn, $_POST['department']);
  

$tb = "INSERT INTO complain(name,email,device,problem,department) VALUES ('$name','$email','$device','$problem','$department')";

if(mysqli_query($conn,$tb))
{
    echo"data is inserted";

    $updateQuery = "UPDATE complain SET status='in progress' WHERE device='$device' AND status='requested'";
    if(mysqli_query($conn, $updateQuery)) {
      echo "Status updated to 'in progress'.<br>";
    } else {
      echo "Error updating status: " . mysqli_error($conn) . "<br>";
    }

    // Update status to "checked"
    $updateQuery = "UPDATE complain SET status='checked' WHERE device='$device' AND status='in progress'";
    if(mysqli_query($conn, $updateQuery)) {
      echo "Status updated to 'checked'.<br>";
    } else {
      echo "Error updating status: " . mysqli_error($conn) . "<br>";
    }

}
else{
    echo "data is not inserted". mysqli_error($conn);
}
}


?>



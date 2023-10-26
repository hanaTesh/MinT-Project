<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin.js"></script>
<head>
  <meta charset="UTF-8">
  <title>Admin Portal</title>
  <link rel='stylesheet' href='stylee.css'>
</head>

<body>

  <a href="admin.html">logout</a>

  <h1>Admin Portal</h1>

  <div id="ComplainList">

  <table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Device</th>
      <th>Department</th>
      <th>Problem</th>
      <th>Status</th>
    </tr>
  </thead>
  
  <tbody>

  <?php
 $conn = mysqli_connect("localhost","root","","submit");
 // Query the database
 $sql = "SELECT * FROM complain";
 $result = mysqli_query($conn, $sql);
 $status = 'Not Checked'; 


 
 // Output data from each row
    // PHP to loop through data

    while($row = mysqli_fetch_assoc($result)) {
      $status = $row['status'];
  ?>

    <tr>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['device']; ?></td>
      <td><?php echo $row['department']; ?></td>
      <td><?php echo $row['problem']; ?></td>
      <td><?php 
if($status == 'Checked') {
  echo '<button class="status-btn" data-status="Checked">Checked</button>';
} else {
  echo '<button class="status-btn" data-status="Not Checked">Not Checked</button>';
}
?>


    </tr>

  <?php
    }
  ?>
  
  </tbody>
</table>
  
  </div>

</body>
</html>
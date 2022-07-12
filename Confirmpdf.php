<?php
include 'dbconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Print</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Appointment Approval</h2>
      <h4>Please bring this PDF along with you on appointment day</h4>
      <table class="table table-bordered print">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Client Name</th>
            <th>Confirmation Status</th>
            <th>Appointment Date</th>
          </tr>
        </thead>
        <tbody>
          <?php

require_once "dbconfig.php";
$result = mysqli_query($conn,"SELECT * FROM book WHERE BookID='" . $_GET['BookID'] . "'");
$row= mysqli_fetch_array($result);
?>

								<tr>
								<td><?php echo $row['BookID'] ?></td>
								<td><?php echo $row['Fname'] ?></td>
								<td><?php echo $row['Status'] ?></td>
                                <td><?php echo $row['DOV'] ?></td>
</tbody>
</table>
      <div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
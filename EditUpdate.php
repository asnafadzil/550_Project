<?php
// Include database connection file
require_once "dbconfig.php";
if(count($_POST)> 0) {
mysqli_query($conn, $sql = "UPDATE book set  Fname='" . $_POST['Fname'] . "', PhoneNum='" . $_POST['PhoneNum'] . "' ,CompEmail='" . $_POST['CompEmail'] . "' WHERE BookID='" . $_POST['BookID'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM book WHERE BookID='" . $_GET['BookID'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
}
</style>
</head>
<body>
<div class="wrapper">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="page-header">
<h2>Update Record</h2>
</div>
<p>Please edit the input values and submit to update the record.</p>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="Fname" class="form-control" value="<?php echo $row["Fname"]; ?>">
</div>
<div class="form-group ">
<label>Email</label>
<input type="email" name="CompEmail" class="form-control" value="<?php echo $row["CompEmail"]; ?>">
</div>
<div class="form-group">
<label>Mobile</label>
<input type="mobile" name="PhoneNum" class="form-control" value="<?php echo $row["PhoneNum"]; ?>">
</div>
<input type="hidden" name="BookID" value="<?php echo $row["BookID"]; ?>"/>
<input  type="submit" class="btn btn-primary" value="Submit" >
<a href="viewclientappointment.php" class="btn btn-default">View Changes</a>
<a href="ulogin.php" class="btn btn-default">Cancel</a>
</form>
</div>
</div>        
</div>
</div>
</body>
</html>
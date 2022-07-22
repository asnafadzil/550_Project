<?php
// Include database connection file
require_once "dbconfig.php";
if(count($_POST)> 0) {
mysqli_query($conn, $sql = "UPDATE book set  Fname='" . $_POST['Fname'] . "', PhoneNum='" . $_POST['PhoneNum'] . "' ,TimeVisit='" . $_POST['TimeVisit'] . "' ,dov='" . $_POST['dov'] . "' WHERE BookID='" . $_POST['BookID'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM book WHERE BookID='" . $_GET['BookID'] . "'");
$row= mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Booking</title>
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
<h2>Update Booking</h2>
</div>
<p>Please edit the input values and submit to update your booking.</p>
<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
<div class="form-group">
<label>Name</label>
<input type="text" name="Fname" class="form-control" value="<?php echo $row["Fname"]; ?>">
</div>
<div class="form-group">
<label>Mobile</label>
<input type="mobile" name="PhoneNum" class="form-control" value="<?php echo $row["PhoneNum"]; ?>">
</div>
<div class="form-group">
<label><b>Date :</b></label><br>
		<input type="date" name="dov" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" ><br><br>
		<div id="datestatus"> </div>
</div>
<div class="form-group">
		<label style="font-size:20px" >Time:</label><br>
		<select id="TimeVisit" name="TimeVisit" value="<?php echo $row["TimeVisit"]; ?>>
		<option value="TimeVisit">Select Time</option>
		<option value="09:00 A.M - 10.00 A.M">09:00 A.M - 10.00 A.M</option>
		<option value="11:00 A.M - 12.00 P.M">11:00 A.M - 12.00 P.M</option>
		<option value="14:30 P.M - 16.30 P.M">14:30 P.M - 16.30 P.M</option>
		<option value="Contact later after appointment has been approved">Contact later after appointment has been approved</option>
		</select><br></div>

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
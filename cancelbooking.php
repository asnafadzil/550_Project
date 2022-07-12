<html>
<head>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "dbconfig.php"; ?>
<body style="background-image:url(images/cancelback.jpg)">
	<div class="header">
		<ul>
			<li><a href="ulogin.php">Home</a></li>
		</ul>
	</div>
	<form action="cancelbooking.php" method="post">
	<div class="sucontainer">
		<label style="font-size:20px" >Select Appointment to Cancel:</label><br>
		<select name="appointment" id="appointment-list" class="demoInputBox"  style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Appointment</option>
		<?php
		session_start();
		$username=$_SESSION['username'];
		$date= date('Y-m-d');
		$sql1="SELECT * from book where username='".$username."'and status not like 'Cancelled by client' and DOV >='$date'";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) {
			
		?>
		<option value="<?php echo $rs["Timestamp"]; ?>"><?php echo "client: ".$rs["Fname"]." Date: ".$rs["DOV"]." - Booked on:".$rs["Timestamp"]; ?></option>
		<?php
		}
		?>
		</select>
		

			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
	</form>
	<?php
if(isset($_POST['submit']))
{
		$username=$_SESSION['username'];
		$timestamp=$_POST['appointment'];
		$updatequery="update book set Status='Cancelled by client' where username='$username' and timestamp= '$timestamp'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo '<script>alert( "Appointment Cancelled successfully")

                            </script>';
							header( "Refresh: 0.2; url=ulogin.php");

				} 
				else
				{
					echo "Error: " . $updatequery . "<br>" . mysqli_error($conn);
				}

}
?>
</body>
</html>
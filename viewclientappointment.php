<html>
<head>
<link rel="stylesheet" href="main.css">
<style>
table{
    width: 65%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 5px;
	font-size: 25px;
}

th{
border: 4px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 4px solid black;
	background-color: white;
    color: black;
}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "dbconfig.php"; ?>
<body style="background-image:url(images/cancelback.jpg)">
<div class="header">
				<ul>
					<li style="float:left;border-right:none"><strong><?php session_start(); echo $_SESSION['user']; ?></strong></li>
					<li><a href="ulogin.php">Home</a></li>
				</ul>
</div>
<center>
	<?php
	$username=$_SESSION['username'];
	?>
	<table>
					<tr>
					<th>Appointment-Date</th>
					<th>Name</th>
                    <th>Company-Name</th> 
                    <th>Reason</th>            
					<th>Status</th>
					<th>Booked-On</th>
					<th>Action</th>
					<th>Download PDF</th>
					</tr>
					
	<?php				
			$result= mysqli_query($conn, $sql = "Select * from book where username = '$username'"); 
			while ($row = mysqli_fetch_assoc ($result)) {
	?>
			
								<tr>
								<td><?php echo $row['DOV'] ?></td>
								<td><?php echo $row['Fname'] ?></td>
                                <td><?php echo $row['CompName'] ?></td>
								<td><?php echo $row['Reason'] ?></td>
                                <td><?php echo $row['Status'] ?></td>
								<td><?php echo $row['Timestamp'] ?></td>
								<td><a href="EditUpdate.php?BookID=<?php echo $row['BookID'] ?>"  title="Update Record" data-toggle="tooltip" class="btn" style="background-color: DodgerBlue; border-radius: 5px; padding: 4px;"><span class=" bi-pen">Edit</span></a></td>
								<td><a href="Confirmpdf.php?BookID=<?php echo $row['BookID'] ?>"  title="Update Record" data-toggle="tooltip" class="btn" style="background-color: RED; border-radius: 5px; padding: 4px;"><span class=" bi-pen">PDF</span></a></td>
							</tr>
							
			
<?php
			}		
			
	?>
	</table>
	<?php
							echo "<br>TOTAL APPOINTMENT HAVE BEEN MADE=<b>".mysqli_num_rows($result)."</b><br>";
						?>
						<div class="text-center">
        <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
      </div>
</center>
</body>
</html>
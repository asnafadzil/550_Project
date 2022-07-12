<html>
<head>
<script src="jquerypart.js" type="text/javascript"></script>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body background= "clinicview.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN MODE</font></li>
<br>
<h2>
  <li class="dropdown">   
  <button type="button" onclick="window.location.href='changebookingstatus.php'" style="float:left;background-color:#2B4F76">Update Booking Status</button>
  <a href="javascript:void(0)" class="dropbtn">Director</a>
    <div class="dropdown-content">
      <a href="addBOD.php">Add BOD</a>
      <a href="addBODschedule.php">Add BOD Schedule</a>
      <a href="showBOD.php">Show BOD</a>
	  <a href="showBODschedule.php">Show BOD Schedule</a>
    </div>
  </li>
    <li>  
	<form method="post" action="mainpage.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>	
</ul>
</h2>
<center><h1>SET SCHEDULE</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<label style="font-size:20px" >Director:</label>
		<select name="ptm_id" id="ptm_id" class="demoInputBox">
		<option value="">Select Person</option>
		<?php
		include 'dbconfig.php';
		$sql1="SELECT distinct ptm_id,name FROM persontomeet";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["ptm_id"]; ?>"><?php echo $rs["name"]; ?></option>
		<?php
		}
		?>
		</select>
		
		<label style="font-size:20px" >
		Available Days<br>
		<table>
		<tr><td>Monday:</td><td><input type="checkbox" value="Monday" name="daylist[]"/></td></tr>
		<tr><td>Tuesday:</td><td><input type="checkbox" value="Tuesday" name="daylist[]"/></td></tr>
		<tr><td>Wednesday:</td><td><input type="checkbox" value="Wednesday" name="daylist[]"/></td></tr>
		<tr><td>Thursday:</td><td><input type="checkbox" value="Thursday" name="daylist[]"/></td></tr>
		<tr><td>Friday:</td><td><input type="checkbox" value="Friday" name="daylist[]"/></td></tr>
		<tr><td>Saturday:</td><td><input type="checkbox" value="Saturday" name="daylist[]"/></td></tr>
		</table>
		Availability(24 hour Format):<br>
		From:<input type="time" name="starttime"><br>
		To:<input type="time" name="endtime"> &nbsp &nbsp &nbsp
		
		</label>
		<button name="Submit" type="submit">Submit</button>
	</form>
<?php
session_start();
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:1; url=alogin.php"); 
	}
if(isset($_POST['Submit']))
{
		include 'dbconfig.php';
		$ptm_id=$_POST['ptm_id'];
		$starttime=$_POST['starttime'];
		$endtime=$_POST['endtime'];
		
		foreach($_POST['daylist'] as $daylist)
		{
				$sql = "INSERT INTO persontomeet_availability (ptm_id, Day, Starttime, Endtime) VALUES ('$ptm_id','$daylist','$starttime','$endtime')";
				if (mysqli_query($conn, $sql)) 
				{
					echo "<h2>Record created successfully</h2>";
				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
		}
}

?>

</body>
</html>
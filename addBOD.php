<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body background= "doctordesk.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="10">ADMIN MODE</font></li>
<br>
<h2>
	
<button type="button" onclick="window.location.href='changebookingstatus.php'" style="float:left;background-color:#2B4F76">Update Booking Status</button>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Director</a>
    <div class="dropdown-content">
      <a href="addBOD.php">Add BOD</a>
	  <a href="addBODschedule.php">Add Schedule BOD</a>
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

<center><h1>ADD BOD</h1><hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Director ID: <input type="number" name="ptm_id" required>
  <br>
  Name: <input type="text" name="name" required>
  <br>
  Position: <input type="text" name="position" required>
  <br>
  
  <button type="submit" name="Submit">REGISTER</button>
</form>
</font></b>
</center>
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
		$name=$_POST['name'];
		$position=$_POST['position'];

		$sql = "INSERT INTO persontomeet (ptm_id, name, position) VALUES ('$ptm_id','$name','$position') ";

	if (mysqli_query($conn, $sql)) 
	{
		echo "<h2>Record created successfully!! Redirecting to Admin mainpage page....</h2>";
		header( "Refresh:2; url=addBOD.php");

	} 
	else
	{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

?>

</body>
</html>
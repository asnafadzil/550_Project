<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
<style>
table{
    width: 75%;
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

</head>
<body background= "doctordesk.jpg">
<ul>
<li class="dropdown"><font color="yellow" size="5">Entrepreneur Development Assistant Mode</font></li>
<br>
<h2>
<button type="button" onclick="window.location.href='changebookingstatus.php'" style="float:left;background-color:red;">Update Booking Status</button>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Director</a>
    <div class="dropdown-content">
      <a href="addBOD.php">Add BOD</a>
      <a href="addBODschedule.php">Add BOD Schedule</a>
      <a href="showBOD.php">Show BOD</a>
    </div>
  </li>
    <li>  
	<form method="post" action="alogin.php">	
	<button type="submit" class="cancelbtn" name="logout" style="float:right;font-size:22px"><b>Log Out</b></button>
	</form>
  </li>	
</ul>
</h2>
<center><h1>SHOW DIRECTOR</h1><hr>
<?php
include 'dbconfig.php';
$sql="SELECT * FROM persontomeet order by ptm_id ASC";
$result = mysqli_query($conn,$sql);
echo "<br><h2>TOTAL DIRECTOR IN DATABASE=<b>".mysqli_num_rows($result)."</b></h2><br>";
echo "<table>
<tr>
<th>ID</th>
<th>Director's Name</th>
<th>Position</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
	echo "<td>" . $row['ptm_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['position'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:0.3; url=alogin.php"); 
	}
?>
</body>
</html>
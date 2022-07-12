<html>
<head>
	<link rel="stylesheet" href="main.css">
</head>
<body style="background-image:url(images/userback.jpg)">
<div class="header">
</div>
<div class="container" style="width:100%">
	<div class="container" >
	<form method="post">
      <button type="button" onclick="window.location.href='book.php'" style="background-color:#2B4F76">Book Appointment</button>
	  <button type="button" onclick="window.location.href='viewclientappointment.php'" style="background-color:#2B4F76">Show Appointments</button>
      <a href="cancelbooking.php?username=['username'] "  title="Delete Record" data-toggle="tooltip" class="button" style="	border-radius:12px;
    background-color: #2B4F76;;
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;"><span>Cancel Booking</span></a></td>

	  <button type="submit" name="logout" style="float:right;background-color:#2B4F76">Log Out</button>
	</form>
    </div>
</div>
<?php
if(isset($_POST['check']))
{
		include 'dbconfig.php';
		$name=$_SESSION['user'];
		$sql = "Select * from book where name='$name'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			while($rows = mysqli_fetch_assoc($result)) 
			{
				echo "Username:".$rows["username"]."Name:".$rows["name"]."Date of Visit:".$rows["dov"]."Town:".$rows["town"]."<br>";
			}
		} 
		else 
		{
			echo "0 results";
		}
}
if(isset($_POST['cancel']))
{
	header( "cancelbooking.php"); 
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	header( "Refresh:0.0; url=cover.php"); 
}
?>
</body>
</html>
<html>
<head>
<link rel="stylesheet" href="adminmain.css"> 
</head>
<body>

<ul>
<li class="dropdown"><font color="yellow" size="5">Entrepreneur Development Assistant Mode</font></li>
<br>
<h2>
<button type="button" onclick="window.location.href='changebookingstatus.php'" style="float:left;background-color:red;">Update Booking Status</button>
  <li class="dropdown">    
  <a href="javascript:void(0)" class="dropbtn">Director</a>
    <div class="dropdown-content">
      <a href="addBOD.php">Add BOD</a>
      <a href="addBODschedule.php">Add Schedule BOD</a>
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
<p>

<center><h1>********WELCOME*******</h1> 
<?php
session_start();	
	if(isset($_POST['logout'])){
		session_unset();
		session_destroy();
		header( "Refresh:0.0; url=../cover.php"); 
	}
?>
</body>
</html>
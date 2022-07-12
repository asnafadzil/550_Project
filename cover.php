<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web Page | Code Info</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="conatiner">
      <header>
        <div class="label">
          <a href="#">Azzam Reezky Group</a>
        </div>
      </header>
      <div class="body-content">
        <div class="b-title">
          <h1>HEY,<br />Set Your<span> Appointment</span><br />With Azzam Reezky</h1>
        </div>

        <div class="b-img">
          <img src="https://cdn.dopewp.com/media/svg/isometric/app_development_SVG.svg" />
        </div>
      </div>
    </div>







<link rel="stylesheet" href="main.css">

			<div class="center">
				<button onclick="document.getElementById('id01').style.display='block'" style="position:absolute;top:70%;left:27%">Login</button>
				
			</div>	
<div id="id01" class="modal">
  
  <form class="modal-content animate" method="post" action="cover.php">
    <div class="imgcontainer">
		<span style="float:left"><h2>&nbsp&nbsp&nbsp&nbspLog In</h2></span>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
	
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
		<button type="submit" name="login">Login</button>
		
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <button onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'" style="float:right">Don't have one?</button>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  
  <form class="modal-content animate" action="signup.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
    </div>
	
    <div class="container">
		<p style="text-align:center;font-size:18px;"><b>Sign Up -> Choose your Dates -> Book your visit</b></p>
      <p style="text-align:center"><b>Berazam Menjemput Rezeki</b></p>
	  
    </div>
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
	  <button type="submit" name="signup" style="float:right">Sign Up</button>
    </div>
	
  </form>
</div>

</body>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

</script>
<?php
session_start();
$error=''; 
if (isset($_POST['login'])) {
if (empty($_POST['uname']) || empty($_POST['psw'])) {
$error = "Username or Password is invalid";
}
else
{
	include 'dbconfig.php';
	$username=$_POST['uname'];
	$password=$_POST['psw'];

	$query = mysqli_query($conn,"select * from client where password='$password' AND username='$username'");
	$rows = mysqli_fetch_assoc($query);
	$num=mysqli_num_rows($query);
	if ($num == 1) {
		$_SESSION['username']=$rows['username'];
		$_SESSION['user']=$rows['name'];
		header( "Refresh:1; url=ulogin.php"); 
	} 
	else 
	{
		$error = "Username or Password is invalid";
	}
	mysqli_close($conn); 
}
}
?>
</body>
</html>

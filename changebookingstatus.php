<html>
<head>
<link rel="stylesheet" href="main.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "dbconfig.php"; ?>
<style>
table{
    width: 100%;
    border-collapse: collapse;
	border: 4px solid black;
    padding: 1px;
	font-size: 25px;
}

th{
border: 1px solid black;
	background-color: #4CAF50;
    color: white;
	text-align: left;
}
tr,td{
	border: 1px solid black;
	background-color: white;
    color: black;
}
</style>

<body style="background-image:url(mgrchange.jpg)">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="mainpage.php" class="logo"><img src="https://scontent.fkul13-1.fna.fbcdn.net/v/t1.6435-9/66425927_2334783386610512_3429672381042393088_n.png?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=KEQ3LeOQploAX8Cn0jJ&_nc_ht=scontent.fkul13-1.fna&oh=00_AT9a3GboWxeiLojCF59YeMajnDa1rayfwHSSOK_ThJ8k8g&oe=62E0D5A1" width="30px" height="30px"><strong></strong>Appointment Booking System</a></li>
			<li><a href="mainpage.php">Home</a></li>
		</ul>
	</div>
	<form action="changebookingstatus.php" method="post">
	<div>
		
	
		<label style="font-size:20px"><b>Select Director:</b></label><br>
		<select name="persontomeet" id="persontomeet-list" class="demoInputBox" style="width:100%;height:35px;border-radius:9px">
		<option value="">Select Director</option>
		<?php
		session_start();
		$sql1="SELECT * FROM persontomeet where ptm_id in(select ptm_id from persontomeet_availability where ptm_id=ptm_id);";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["ptm_id"]; ?>"><?php echo $rs["name"]; ?></option>
		<?php
		}
		?>
		</select>
        <br>
		
		<label><b>Date:</b></label><br>
		<input type="date" name="dateselected" required><br><br>
		<br>
			<button type="submit" style="position:center" name="submit" value="Submit">Submit</button>
			</form>
<?php
if(isset($_POST['submit']))
{
		
		include 'dbconfig.php';
		$ptm_id=$_POST['persontomeet'];
		$dateselected=$_POST['dateselected'];
		$sql1 = "select * from book where DOV='". $_POST['dateselected']."' AND ptm_id= $ptm_id order by Timestamp ASC";
		 $results1=$conn->query($sql1); 
			require_once("dbconfig.php");
?>			
				<form action="changebookingstatus.php" method="post"> 
				<table>
				<tr>
				<th>UserName</th>
				<th>First Name</th>
				<th>DOV</th>
				<th>Timestamp</th>
				<th>Status</th>
				</tr>
<?php
			while($rs1=$results1->fetch_assoc())
			{
				echo "<tr>";
					echo  '<td><input type="text" name="username[]" id="username" value="'.$rs1["Username"].'" readonly></td>'
					.'<td><input type="text" name="fname[]" id="fname" value="'.$rs1["Fname"].'" readonly></td>'
					.'<td><input type="date" name="dov[]" id="dov" value="'.$rs1["DOV"].'" readonly></td>'
					.'<td><input type="text" name="timestamp[]" id="timestamp" value="'.$rs1["Timestamp"].'" readonly></td>'
					.'<td><select name="status[]" id="status" value="'.$rs1["Status"].'">
  <option value="Accepted">Accepted</option>
  <option value="Rejected">Rejected</option>
</select>
                    </td></tr>' ;
			}
?>		
			</table>	
			<button type="submit" style="position:center" name="submit2" value="Submit">Submit Changes</button></form>		
<?php
}
require_once("dbconfig.php");
			if(isset($_POST['submit2']))
		{
			$usrnm=$_POST["username"];
			$fnm=$_POST["fname"];
			$tmstmp=$_POST["timestamp"];
			$stts=$_POST["status"];
			$dt=$_POST["dov"];
			$n=count($usrnm);
			for($j=0;$j<$n;$j++)
			{	
				$updatequery="update book set Status='$stts[$j]' where username='$usrnm[$j]' and timestamp='$tmstmp[$j]'";
				if (mysqli_query($conn, $updatequery)) 
				{
							echo "$fnm[$j] :Status updated successfully..!!<br>";

				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
			echo "Redirecting.....";
			header( "Refresh:1; url=mainpage.php");
				
		}
?>
	
</body>
</html>
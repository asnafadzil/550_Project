<head>
<link rel="stylesheet" href="style2.css">




<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "dbconfig.php"; ?>
<body style="background-image:url(images/bookback.jpg)">
	<div class="header">
		<ul>
			<li style="float:left;border-right:none"><a href="ulogin.php" class="logo"><img src="https://scontent.fkul13-1.fna.fbcdn.net/v/t1.6435-9/66425927_2334783386610512_3429672381042393088_n.png?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=KEQ3LeOQploAX8Cn0jJ&_nc_ht=scontent.fkul13-1.fna&oh=00_AT9a3GboWxeiLojCF59YeMajnDa1rayfwHSSOK_ThJ8k8g&oe=62E0D5A1" width="30px" height="30px">Appointment Booking System</a></li>
			<li><a href="book.php">Book Now</a></li>
			<li><a href="ulogin.php">Home</a></li>
		</ul>
	</div>
	<form action="book.php" method="post">
	<div class="cd-form">
		<label><b>Name:</b></label><br>
		<input type="text" placeholder="Enter Full name of client" name="fname" required><br>

		<label><b>Phone Number:</b></label><br>
		<input type="text" placeholder="Enter your phone number" name="pnum" required><br>
		
		<label><b>Company :</b></label><br>
		<input type="text" placeholder="Enter company name" name="cname" required><br>

		<label><b>Email :</b></label><br>
		<input type="text" placeholder="Enter company email" name="cemail" required><br>

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

		<label><b>Date :</b></label><br>
		<input type="date" name="dov" onChange="getDay(this.value);" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d',strtotime('+7 day'));?>" required><br><br>
		<div id="datestatus"> </div>

		<label style="font-size:20px" >Time:</label><br>
		<select id="TimeVisit" name="TimeVisit">
		<option value="TimeVisit">Select Time</option>
		<option value="09:00 A.M - 10.00 A.M">09:00 A.M - 10.00 A.M</option>
		<option value="11:00 A.M - 12.00 P.M">11:00 A.M - 12.00 P.M</option>
		<option value="14:30 P.M - 16.30 P.M">14:30 P.M - 16.30 P.M</option>
		<option value="Contact later after appointment has been approved">Contact later after appointment has been approved</option>
		</select><br>

		<label><b>Reason :</b></label><br>
		<input type="text" placeholder="Enter reason for meeting" name="reason" required><br>

		<label><b>File :</b></label><br>
		<input type="text" placeholder="Attach your google drive file link" name="FileLink" required><br>

		<div class="container" >
		<link rel="stylesheet" href="main.css">

			<button type="submit" style="position:center" name="submit" value="Submit">Set Appointment</button>
		</div>
<?php
session_start();
if(isset($_POST['submit']))
{
		
		include 'dbconfig.php';
		$fname=$_POST['fname'];
		$pnum=$_POST['pnum'];
		$cname=$_POST['cname'];
		$cemail=$_POST['cemail'];
		$ptmid=$_POST['ptm_id'];
		$username=$_SESSION['username'];
		$reason=$_POST['reason'];
		$FileLink=$_POST['FileLink'];
		$dov=$_POST['dov'];
		$TimeVisit=$_POST['TimeVisit'];
		$status="Booking Registered.Wait for the update";
		$timestamp=date('Y-m-d H:i:s');
		$sql = "INSERT INTO book (Username,Fname,PhoneNum,CompName,CompEmail,DOV,TimeVisit,ptm_id,Reason,FileLink,Timestamp,Status) VALUES ('$username','$fname','$pnum','$cname','$cemail','$dov','$TimeVisit','$ptmid','$reason','$FileLink','$timestamp','$status') ";
		
		if(!empty($_POST['fname']) && !empty($_POST['dov']))
		{
			$checkday = strtotime($dov);
			$compareday = date("l", $checkday);
			$flag=0;
			require_once("dbconfig.php");
			$query ="SELECT * FROM persontomeet_availability WHERE ptm_id = '" .$ptmid. "'";
			$results = $conn->query($query);
			while($rs=$results->fetch_assoc())
			{
				if($rs["day"]==$compareday)
				{
					$flag++;
					break;
				}
			}
			if($flag==0)
			{
				echo "<h2>Select another date as person unavailabe".$compareday."</h2>";
			}
			else
			{
				if (mysqli_query($conn, $sql)) 
				{
						echo "<h2>Booking successful!! Redirecting to home page....</h2>";
						header( "Refresh:2; url=ulogin.php");

				} 
				else
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
		}
		else
		{
			echo "Enter data properly!!!!";
		}
	}
?>
	</form>
</body>

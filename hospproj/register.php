<?php

	session_start();
	$con=mysqli_connect("localhost","vinay","master123","hospdb");
	if(!$con)
	{
		printf("couldn't connect to database %s",mysqli_connect_error());
		exit();
	}
	
	$username=$_POST['email'];
	$password=$_POST['passcode'];
	$p1=$_POST['name'];
	$p2=$_POST['fathern'];
	$p3=$_POST['dob'];
	$p4=$_POST['address'];
	$p5=$_POST['mobile'];
	$p6=$_POST['pid'];
	$p7=$_POST['email'];
	
	
	$sql="INSERT INTO patients(pid,pname,pfname,dob,address,mobile_no,email) values('$p6','$p1','$p2','$p3','$p4','$p5','$p7')";
	mysqli_query($con,$sql);
	//	echo "couldn't register patient's details";
	$sql="INSERT INTO login values('$username','$password','$p6')";
	mysqli_query($con,$sql);
	
	mysqli_close($con);
?>
<html>
<head><title> Register Page</title>
<style type="text/css">
	body {
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
		background-image: url("Pictures/image15.jpeg"); background-repeat:no-repeat;background-size:1300px 800px;
	}
	label{
		font-weight:bold;
		width:100px;
		font-size:14px;
	}
	.box{
		border:#666666 solid 1px;
	}
</style>
<script type="text/javascript">
	function validate(email,passcode)
	{
		var reg1=/[0-9]*[A-Z]*[a-z]+@gmail.com$/;
		var reg2=/[0-9][0-9][a-z][a-z][0-9][0-9]$/;
	
		if(!email.value.match(reg1) || email.value.length==0)
		{
			alert("Invalid username!");
			exit();
		}
		if(!passcode.value.match(reg2) || passcode.value.length==0)
		{
			alert("Invalid password!");
			exit();
		}
	}
</script>
</head>
<body bgcolor="#FFFFFF">
<div align ="center" >
	<div style="width:300px; border: solid 1px #333333; background-color:white" align ="left">
		<div style ="background-color:blue; color:#FFFFFF; padding:3px;"><b>Register</b></div>
		<div style = "margin:30px">
		
			<form action="" method="post">
				<label>Patient's Name  :<input type="text" name="name" class="box"/></label><br />
				<label>Father's Name   :<input type="text" name="fathern" class="box" /></label><br />
				<label>Date of Birth   :<input type="text" name="dob" class="box"/></label><br />
				<label>Address         :<input type="text" name="address"  maxlength="100" class="box"/></label><br />
				<label>Mobile No       :<input type="text" name="mobile" class="box"/></label><br />
				<label>Patient_id      :<input type="text" name="pid" class="box"/></label><br />
				<label>Emailid         :<input type="text" name="email" class="box"/></label><br />
				<label>Password        :<input type="text" name="passcode" class="box"/></label><br />
				<input type="submit" value="Submit"  onclick="validate(email,passcode)"/><br />
			</form>
			

		<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

		</div>
	</div>
</div>
</body>
</html>

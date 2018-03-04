<?php
	session_start();
	$_SESSION['uname']=$_POST['uname'];
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$con=mysqli_connect("localhost","vinay","master123","hospdb");
		if(mysqli_connect_errno())
		{
			echo "Couldn't connect to database".mysqli_connect_error();
		}
		 $username=$_POST['uname'];
		 $password=$_POST['psword'];
		 $pid=$_POST['pid'];
		
		$sql="SELECT username,password,pid FROM login WHERE username='$username' and password='$password' and pid='$pid'";
		$result=mysqli_query($con,$sql);
		if(($row=mysqli_fetch_array($result))==NULL)
		{
			echo "<html><body><font size=5px>Invalid user!</font></body></html>";
			exit();
		}
		else
		{      //$var=mysqli_fetch_row($result);
			$sql2="SELECT pname,address,mobile_no FROM patients WHERE patients.pid=$pid";
			$res2=mysqli_query($con,$sql2);
			$row=mysqli_fetch_row($res2);
			$_SESSION['pname']=$row[0];
			$_SESSION['address']=$row[1];
			$_SESSION['mobile_no']=$row[2];
			$_SESSION['pid']=$_POST['pid'];
			header("Location:login2.php");
			
		}
}
mysqli_close($con);
?> 
<?php
	if(isset($_POST['Register']))
	{
		header("Location: login.php");
	}
?>
	
<html>
<head><title> Login Page</title>
<style type="text/css">
	body {
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
		background-image: url("Pictures/login2.jpeg"); background-repeat:no-repeat;background-size:1300px 800px;
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
	function validate(uname,psword)
	{
		var reg1=/[0-9]*[A-Z]*[a-z]+@gmail.com$/;
		var reg2=/[0-9][0-9][a-z][a-z][0-9][0-9]$/;
	
		if(!uname.value.match(reg1) || uname.value.length==0)
		{
			alert("Invalid username!");
			exit();
		}
		if(!psword.value.match(reg2) || psword.value.length==0)
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
		<div style ="background-color:green; color:#FFFFFF; padding:3px;"><b>Login</b></div>
		<div style = "margin:30px">
		
			<form action="" method="post">
				<label>Username  :<input type="text" name="uname" class="box"/></label><br />
				<label>Password  :<input type="password" name="psword" class="box" /></label><br />
				<label>Patient's id:<input type="text" name="pid" class="box" /></label><br />
				<input type="submit" value="Submit"  onclick="validate(uname,psword)"/><br />
				<input type="reset" value="Refresh"/>
			</form>
			<form action="register.php" method="post">
			<label>New User?</label><br />
			<input type="submit" value="Register" />
			</form>

		<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo "error"; ?></div>

		</div>
	</div>
</div>
</body>
</html>

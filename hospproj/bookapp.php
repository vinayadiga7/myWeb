<?php
	session_start();
	$_SESSION['app_id']=$_POST['app_id'];
	$app_id=$_POST['app_id'];
	$pid=$_POST['pid'];
	$doc_id=$_POST['doc_id'];
	$reasons=$_POST['reasons'];
	$con=mysqli_connect("localhost","vinay","master123","hospdb");
	if(!$con)
	{
		echo "Couldn't connect to database ".mysqli_connect_error();
	}
	$sql="INSERT INTO appointments(app_id,pid,doc_id,reasons) VALUES('$app_id','$pid','$doc_id','$reasons')";
	mysqli_query($con,$sql);
	mysqli_close($con);

?>
<html>
<head><title> Book Appointment</title>
<style type="text/css">
	body {
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
		background-color:silver;
	}
	label{
		font-weight:bold;
		width:100px;
		font-size:14px;
		margin:10px;
	}
	.box{
		border:#666666 solid 1px;
	}
</style>
</head>
<body bgcolor="#FFFFFF">
<div >
	<div style="width:600px; border: solid 2px black; background-color:white" align ="left">
		<div style ="background-color:Crimson; color:#FFFFFF; padding:10px; font-size:150%;"><b>Book Appointment</b></div>
		<div style = "margin:20px">
<pre>
<form action="" method="post">
	<label>Appointment ID  :<input type="text" name="app_id" class="box"/></label><br />
	<label>Patient ID      :<input type="text" name="pid" class="box" /></label><br />
	<label>With Doctor     :<select name="doc_id">
				<option value="1000">Dr.Saurabh Shukla</option>
								<option value="1001">Dr.Harshavardhan</option>
								<option value="1002">Dr.Revanasidappa</option>
								<option value="1003">Dr.Mohan Reddy</option>
								<option value="1004">Dr.Neeta Rao</option>
							</select></label><br />
	<label>Reason          :<textarea name="reasons" cols="30" rows="3" ></textarea></label><br />				
				<label>                          <input type="submit" value="Submit"/></label>  <br />
				
			</form>
</pre>
		<div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

		</div>
	</div>
</div>
<?php echo $reasons; ?>
</body>
</html>

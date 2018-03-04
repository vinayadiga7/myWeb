<?php
	session_start();
	$_SESSION['inc']=1
	$con=mysqli_connect("localhost","vinay","master123","hospdb");
	if(mysqli_connect_errno())
	{
		echo "Couldn't connect to database ".mysqli_connect_error();
		exit();	
	}
	
	echo "<html><body style=background-color:lavender; >";
	$sql="SELECT * FROM images";
	$res1=mysqli_query($con,$sql);
	$num=mysqli_num_rows($res1);
	$row=mysqli_fetch_row($res1);
	for($i=1;$i<=$num;$i++)
	{
		echo "<div><img src=$row[1] size=100% /><br />";
		echo "<p>$row[2]</p></div>";
		sleep(3);
	}
	echo "</body></html>";
?>

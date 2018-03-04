<?php
	session_start();
	$var1=$_SESSION['pname'];
	$var2=$_SESSION['pid'];
	$con=mysqli_connect("localhost","vinay","master123","hospdb");
	if(mysqli_connect_errno())
	{
		echo "Couldn't connect to database ".mysqli_connect_error();
	}
		
	
?>

<html>
<head><title>User Page</title>
<style type="text/css">
div.container {
	width: 100%;
	border: 1px solid gray;
	border-width: 2px;
	border-radius: 5px;
	position: absolute;
	top: 20px;
	left:0;
	font-style: oblique;
}
header {
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left:10px;
	color: LemonChiffon;
	background-color: MediumOrchid;
	font-size:150%;
	clear: left;
	font-weight: bold;
	
}
footer {
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left:10px;
	color: LemonChiffon;
	background-color: MediumOrchid;
	font-size:100%;
	clear: left;
	font-weight: bold;
}
nav {
	float: left;
	max-width: 350px;
	margin: 0;
	padding: 30px;
	background-color:lightCyan;
}

nav ul {
	list-style-type: none;
	padding: 0;
}

nav ul a {
	text-decoration: none;
}
article {
	margin-left: 200px;
	border-left: 4px solid gray;
	padding: 1em;
	overflow: hidden;
	background-color:lavender;
}
table { border:2px solid black;
	border-collapse: collapse;
	width:70%;
}

th,td {
	text-align:left;
	padding:8px;
}
#intro,tr:nth-child(even) {
	background-color:#f2f2f2;
}	
</style>
</head>
<body>
<div class="container">

<header>
	<?php echo "Welcome ".$var1.","; ?>
</header>
<p id="intro">
<img src="profile.jpeg" style="float:right" />
<font style="font-family:Helvetica; font-style:bold; color:Maroon; font-size:125%">PATIENT NAME  :  <?php echo $_SESSION['pname']; ?></font><br />
<font style="font-family:Helvetica; font-style:bold; color:Maroon; font-size:125%">PATIENT ID    :  <?php echo $_SESSION['pid']; ?></font><br />
<font style="font-family:Helvetica; font-style:bold; color:Maroon; font-size:125%">ADDRESS       :  <?php echo $_SESSION['address']; ?></font><br />
<font style="font-family:Helvetica; font-style:bold; color:Maroon; font-size:125%">MOBILE NO     :  <?php echo $_SESSION['mobile_no']; ?></font><br />
<font style="font-family:Helvetica; font-style:bold; color:Maroon; font-size:125%">EMAIL ID      :  <?php echo $_SESSION['uname']; ?></font>
</p>
<nav>
	<ol>
	<li><a href="bookapp.php">Book Appointment</a></li>	
	<li>Collect Reports</li>
	<li>Contact Us</li>
	<li>Leave Feedback</li>
	</ol>
	<pre>





	</pre>
</nav>
<article>
<font style="font-stle:bold; font-size:150%"><u>Appointments</u></font>
<?php 
	$sql1="SELECT * FROM appointments WHERE appointments.pid=$var2";
	$res1=mysqli_query($con,$sql1);
	//mysqli_fetch_array($res,MYSQLI_ASSOC);
	$num=mysqli_num_rows($res1);
	echo "<table>
		<tr>
			<th>Application ID</th>
			<th>Doctors ID   </th>
			<th>Timing       </th>
		</tr><br>";
	
	while($num!=0)
	{
		$row=mysqli_fetch_row($res1);
		echo "<tr>
			<td>$row[0]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>
		</tr><br>";
		$num--;
	}
echo "</table>";
?>
<font style="font-stle:bold; font-size:150%"><u>Reports</u></font>
<?php
	$sql1="SELECT * FROM reports WHERE reports.pid=$var2";
	$res1=mysqli_query($con,$sql1);
	$num=mysqli_num_rows($res1);
	echo "<table>
		<tr>
			<th>Report ID</th>
			<th>Doctors ID   </th>
			<th>Appointment ID</th>
			<th>Report      </th>
		</tr><br>";
	while($num!=0)
	{
		$row=mysqli_fetch_row($res1);
		echo "<tr>";
		echo "<td>$row[0]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>";
		if($row[5]=="yes")
			echo "<td><a href=$row[4]>$row[4]</a></td>";
		else
			echo "<td>$row[4]</td>";
		echo "</tr><br>";
		$num--;
	}
echo "</table>";
mysqli_close($con);
?>	

</article>
<footer style="text-align: right"><a href="logout.php">Logout</a></footer>
</div>

</body>
</html>

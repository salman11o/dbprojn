<?php
session_start();
$con=mysqli_connect('localhost','root','','dbproject');

if(isset($_POST['submit']))
{	$movie=$_POST['movie'];
	$screen=$_POST['screens'];
	$seat=$_POST['seats'];
	$n=$_SESSION['em'];
	$n1="select booking_id from bookings where email='$n' group by booking_id desc limit 1";
	$row=mysqli_fetch_all($n1,MYSQLI_NUM);
	$b="select ticket_id from tickets where email='$n'";
	$v=$row['booking_id'];
	

	
	$query1="INSERT INTO tickets(screen_time, movie_name, seat, price, status,email) Values ('$screen','$movie','$seat','120','N','$n')";
	$queryt="INSERT INTO bookings(ticket_id,email) select ticket_id,email from tickets where email='$n'";
	$queryp1="INSERT INTO payments(booking_id,status) values ((SELECT booking_id from bookings where email='$n' order by booking_id desc limit 1),'N')";
	
		$res=mysqli_query($con,$query1);
		mysqli_query($con,$queryt);
		$res1=mysqli_query($con,$queryp1);
		
	if( $res=1)
	{	
		header("location:book1.php");
	}
	else
	{ 
	header("location:coming.php");	
	}
	

	
	
}


?>
<?php

$con=mysqli_connect('localhost','root','','dbproject');

if(isset($_GET['delete']))
{
	$booking=$_GET['delete'];
	mysqli_query($con,"delete from payments where booking_id='$booking'");
	mysqli_query($con,"delete bookings,tickets from bookings inner JOIN tickets ON bookings.ticket_id=tickets.ticket_id where booking_id='$booking'");
	header("Location:admv1.php");
}

if(isset($_GET['update']))
{
	$emai=$_POST['email'];
	$bookp=$_POST['bookingprev'];
	$bookn=$_POST['booking'];
	$tickp=$_POST['ticketp'];
	$tick=$_POST['ticket'];
	$stat=$_POST['status'];

	$s="update payments set booking_id='$bookn',status='$stat' where booking_id='$bookp'";
	mysqli_query($con,$s);
	$s1="update bookings,tickets set bookings.booking_id='$bookn',bookings.ticket_id='$tick',bookings.email='$emai'
		from bookings inner join tickets on bookings.ticket_id=tickets.ticket_id
	 where booking_id='$bookp'";
	mysqli_query($con,$s);
	mysqli_query($con,$s1);
	header("Location:admv1.php");	
}

?>
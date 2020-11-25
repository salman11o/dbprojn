<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
		Db Project
		</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="index1.php"><b>Book My Show</b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link btn btn-success text-white text-center" href="logout.php">Logout</a>
					</li>
				</ul>
				
			</nav>
<br>
			<h1 class="text-center">Welcome Admin!</h1>
			<br>
			<div>
			<div class="container-fluid">
				<div class="container-fluid">
					<div class="row justify-content-center">
						<?php require_once('del.php')?>
			<table class="table table-bordered table-hover table-bordered my-5 ">
				<thead class="thead-dark">
					<tr>
						<th>Email</th>
						<th>Booking_ID</th>
						<th>Ticket_ID</th>
						<th>Status</th>
						<th colspan="4">Actions</th>
						
					</tr>
				</thead>
				<?php
				$con=mysqli_connect('localhost','root','','dbproject');
				 $asd="CALL `adm`()";
				$query=mysqli_query($con,$asd);
				while($row=mysqli_fetch_array($query)){
				?>
				<tbody>
					<tr>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['booking_id']; ?></td>
						<td><?php echo $row['ticket_id']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td>
							<a href="del.php?delete=<?php echo $row['booking_id']; ?>" class="btn btn-danger text-white">Delete</a>
						</td>
						
					</tr>
				</tbody>
				<?php }?>
			</table>
		</div>
			</div>
		</div>

		<div class="jumbotron jumbotron-fluid " id="jum" style="height:150vh">
	<div class="container">
		<div class="row">
			<form action="del.php" class="was-validated w-50 m-auto " method="post">
			<h2 class="text-center">Update</h2>
				<div class="form-group">
					<br>
					<label >Email address:</label>
					<input type="email" name="email" class="form-control border-success"  placeholder="Enter email" >
				</div>
				<div class="form-group">
					<label >Previous Booking_id:</label>
					<input type="text" name="bookingprev" class="form-control"  placeholder="Enter previous booking id" >
				</div>
				<div class="form-group">
					<label >New Booking_id:</label>
					<input type="text" name="booking" class="form-control"  placeholder="Enter New Booking ID" >
				</div>
				<div class="form-group">
					<label >Previous Ticket_id:</label>
					<input type="text" name="ticketp" class="form-control border-success" placeholder="Enter Ticket ID" >
				</div>
				<div class="form-group">
					<label >Ticket_id:</label>
					<input type="text" name="ticket" class="form-control border-success" placeholder="Enter Ticket ID" >
				</div>
				<div class="form-group">
					<label >Status:</label>
					<input type="text" name="status" class="form-control border-success" placeholder="Enter Status" >
				</div>			
								
				<button type="submit"  name ="update" class="btn btn-success">Update</button>
			</form>

		</div>
	</div>
</div>

		
	</div>


			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		</body>
	</html>
<?php
 session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth'])
{
    include("dbconnect.php");
    $user=$_SESSION['active'];
    $q="SELECT * FROM customer_info WHERE email='$user'";
    $ex=$conn->query($q);
    $row =$ex->fetch_assoc();

}
else{
    header("location:login.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Schedule a Ride</title>

	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link type="text/css" rel="stylesheet" href="style2.css" />
	<link type="text/css" rel="stylesheet" href="style.css" />

</head>
<body>

	<nav class="navdes navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container-fluid">
			<a href="home.php" class="navbar-brand">AUTOMATE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item "><a href="home.php" class="nav-link">Home</a></li>
					<li class="nav-item "><a href="profile.php" class="nav-link">Profile</a></li>
					<li class="nav-item "><a href="info.php" class="nav-link">Info</a></li>
                			<li class="nav-item "><a href="help.php" class="nav-link">Help</a></li>
                			<li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="booking" class="section">
	<div class="section-center">
	<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-push-5">
			<div class="booking-cta">
				<br><br><h1>Schedule a Ride</h1>
			</div>
		</div>
	<div class="col-md-4 col-md-pull-7">
	<div class="booking-form">
	<form action="search.php" method="post">
		<div class="form-group">
		<span class="form-label">Your Destination</span>
			<select class="form-control" name="dest" required>
				<option value="Airport">Airport</option>
				<option value="Bhedaghat">Bhedaghat</option>
				<option value="Bus Stand">Bus Stand</option>
				<option value="Dumna Reserve">Dumna Reserve</option>
				<option value="Gwarighat">Gwarighat</option>
				<option value="JEC">JEC</option>
				<option value="Kachnar Shiv Temple">Kachnar Shiv Temple</option>
				<option value="Madan Mahal">Madan Mahal</option>
				<option value="Railway Station">Railway Station</option>
				<option value="Reliance Fresh">Reliance Fresh</option>
				<optgroup label="Russel Chowk">
					<option value="Russel Chowk">Jabalpur Hospital</option>
					<option value="Russel Chowk">Marble City Hospital</option>
					<option value="Russel Chowk">Russel Chowk</option>
					<option value="Russel Chowk">Samdariya Hotel</option>
					<option value="Russel Chowk">Samdariya Mall</option>
				</optgroup>
				<option value="Sadar">Sadar</option>
				<option value="S.A.M.">S.A.M.</option>
			</select>
		</div>
		<div class="row">
		<div class="col-sm-7">
		<div class="form-group">
			<span class="form-label">Date</span>
			<input size="50" class="form-control" type="date" name="date" required>
		</div>
		</div>
		<div class="col-sm-5">
		<div class="form-group">
			<span class="form-label">Time</span>
			<input size="150" class="form-control" type="time" name="time" required>
		</div>
		</div>
		</div>
		<center>
		<div class="form-btn">
			<button class="submit-btn">Search</button>
		</div>
		</center>
	</form>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

	<script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"5fef0218be0d4da5","version":"2020.11.6","si":10}'></script>
</body>
</html>
<?php
	include("footer.html");
?>
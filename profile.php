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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="style.css" rel="stylesheet">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  

    <title>Profile</title>
    <style>
	.main{
	    font-size:20px;
	}
    </style>
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
				<li class="nav-item active"><a href="profile.php" class="nav-link">Profile</a></li>
				<li class="nav-item "><a href="info.php" class="nav-link">Info</a></li>
                <li class="nav-item "><a href="help.php" class="nav-link">Help</a></li>
                <li class="nav-item"><a href="logout.php" class="nav-link">Log Out</a></li>
			</ul>
		</div>
	</div>
</nav>



<div class="main" style="text-align:center">
<h1 style="text-align:center">Profile</h1>

<?php
if($row['gender'] == 'male'){
    $image="img/m.jpg";
    print"<img class=\"w3-circle\" src=\"$image\" width=\"300px\" height=\"300px\"\/>";
}
if($row['gender'] == 'female'){
    $image="img/f.png";
    print"<img class=\"w3-circle\" src=\"$image\" width=\"300px\" height=\"300px\"\/>";
}
if($row['gender'] == 'other'){
    $image="img/o.jpg";
    print"<img class=\"w3-circle\" src=\"$image\" width=\"300px\" height=\"300px\"\/>";
}
?>

<h2><?php
    echo $row['name'];
?></h2>
<i class="fa fa-envelope"></i> 
<a href="$row['email']"><?php echo $row['email']; ?></a><br>
<?php
if($row['gender'] == 'male'){
    echo sprintf('<i class="fa fa-mars"style="font-size:48px;color:blue"></i>');
    echo "Male";
}
elseif($row['gender'] == 'female'){
    echo sprintf('<i class="fa fa-venus" style="font-size:48px;color:pink"></i>');
    echo "Female";
}
elseif($row['gender'] == 'other'){
    echo sprintf('<i class="fa fa-genderless" style="font-size:48px;color:grey"></i>');
    echo "Other";
}
?>
<br><br>
</div>
</body>
</html>
<?php
	include("footer.html");
?>
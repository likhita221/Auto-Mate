
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Page</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	<?php
	 session_start();
	if(isset($_SESSION['auth']) && $_SESSION['auth'])
	{
		include("dbconnect.php");
		$user=$_SESSION['active'];
		$q="SELECT * FROM customer_info WHERE email='$user'";
		$ex=$conn->query($q);
		$row1 =$ex->fetch_assoc();
		$name=$row1['name'];


	echo"<br><br><center>";
			$dest = $_POST['dest'];
			$time = $_POST['time'];
			$date = $_POST['date'];
			
			$link = mysqli_connect('localhost','root','');
			if(!$link){
				die('Failed to connect to server: '.mysqli_error($link));
			}
			$db = mysqli_select_db($link,'automate');
			if(!$db){
				die("Unable to select database");
			}
		
			$query0="DELETE FROM main";
			$result0 = mysqli_query($link,$query0);  
	
			$query1="INSERT INTO main (dest,time,date) VALUES ('$dest','$time','$date')";
			$result1 = mysqli_query($link,$query1); 
			
			$query = "SELECT DISTINCT host.email, username, host.dest, host.time,host.date,gender
				FROM host, main, route1, route2, route3, route4, route5, route6, special,customer_info
				WHERE 
				 (route1.dest = host.dest
				           AND route1.SNo >= (SELECT route1.SNo
				                            FROM route1, main
				                            WHERE route1.dest = main.dest)
				 OR  route2.dest = host.dest
				           AND route2.SNo >= (SELECT route2.SNo
				                            FROM route2, main
				                            WHERE route2.dest = main.dest)
				 OR  route3.dest = host.dest
				           AND route3.SNo >= (SELECT route3.SNo
				                            FROM route3, main
				                            WHERE route3.dest = main.dest)
				 OR  route4.dest = host.dest
				           AND route4.SNo >= (SELECT route4.SNo
				                            FROM route4, main
				                            WHERE route4.dest = main.dest)
				 OR  route5.dest = host.dest
				           AND route5.SNo >= (SELECT route5.SNo
				                            FROM route5, main
				                            WHERE route5.dest = main.dest)
				 OR  route6.dest = host.dest
				           AND route6.SNo >= (SELECT route6.SNo
				                            FROM route6, main
				                            WHERE route6.dest = main.dest)
				 OR  L1 = main.dest
				         AND (L2  = host.dest OR L3 = host.dest))
         
				 AND
				 ((main.time-host.time) BETWEEN -3000 AND 3000)
				 AND
				 (main.date = host.date)
				 AND
				 (host.email != '$user')
				 AND
				 (host.email=customer_info.email)";

			$result = mysqli_query($link,$query);
			$num = mysqli_num_rows($result);
			
			if($num>0){
				echo"<b><h3>Here are your potential Co-Passengers:</h3></b> <br><br>";
				   
				while($row=mysqli_fetch_assoc($result)){

	$image;
        if($row['gender'] == 'male'){
            $image="img/m.jpg";
        }
        if($row['gender'] == 'female'){
            $image="img/f.png";
        }
        if($row['gender'] == 'other'){
            $image="img/o.jpg";
        }
        echo '<center><div class="card mb-3 "  style="background-color: #aae3e6 !important; overflow-x: hidden; padding:10px; margin: 20px auto; max-width: 1080px;">
            <div class="row no-gutters">
              <div class="col-md-2">
                <img src="'.$image.'" class="card-img" alt="..." width=\"350px\" height=\"350px\"\>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">'.$row['username'].'</h5>
                  <p class="card-text">Going to <b>'.$row['dest'].'</b> at <b>'.$row['time'].'</b> on <b>'.$row['date'].'</b>.</p>
                  <p class="card-text">Contact : <b>'.$row['email'].'</b></p>
                  
                  <p class="card-text">Gender : <b>'.$row['gender'].'</b></p>

                  
                </div>
              </div>
            </div>
          </div></center>';

				}
				echo'<br><br>';
			}
			else{
				echo'<div style="padding-top:100px"><b><h3>Sorry! Looks like you are travelling solo for now.</h3></div><br>';
				echo'<div style="padding-bottom:225px"><h4>Check Back again later or wait for someone else to contact you!</h4></b></div>';
				$query1="INSERT INTO host (email,username,dest,time,date) VALUES ('$user','$name','$dest','$time','$date')";
				$result1 = mysqli_query($link,$query1);
			}
	}
	
	else{
	header("location:login.php");
	}
	?>
</body>
</html>
<?php
	include("footer.html");
?>
<?php
if(isset($_POST['uname']))
{
  include("dbconnect.php");
  $user=$_POST['uname'];
  $password=$_POST['psw'];
     $q1="SELECT * FROM customer_info WHERE email='$user'  ";
     $ex=$conn->query($q1);
     if((mysqli_num_rows($ex)==0)){
       echo "Signup to become a member of our family!!";
       header ("location:signup.php");
     }
     else if((mysqli_num_rows($ex)!=0)){
      $q2="SELECT * FROM customer_info WHERE email='$user'";
      $ex2=$conn->query($q2);
	$row =$ex2->fetch_assoc();
	
      
      if(password_verify($password,$row['password'])){
        session_start();
          $_SESSION['active']=$user;
          $_SESSION['auth']=TRUE;
          header("location:home.php");
      }
	else{
        echo '<center><div style="color: white; background-color:#ff3b3b;">INVALID CREDENTIALS</div></center>';
      }
     }
  }

  

?>



<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
body{
  background-image:url('img/2.JPG');
}
.container h2{
  font-family: 'Pacifico';
}
.container{
  position: relative;
  text-align:center;
  font-size: 20px;
  z-index: 1;
  background: #d8f4f8;
  max-width: 500px;
  margin: 90px auto 90px;
  padding: 45px;
  border-radius: 45px;
  box-shadow: 0 0 20px 0 rgba(255, 255, 255, 0.452), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.container label{
  font-size:22px;
  font-family: 'Nunito';
}
.clearfix button{
  margin-right:10px;
  width:150px;
  height: 50px;
  font-size: 20px;
  margin-top:10px;
}
input[type=text],input[type=email],input[type=password]{
  width: 70%;
  padding: 3px 5px;
  margin-bottom: 5px;
  box-sizing: border-box;
}
input[type=text]:focus,input[type=email]:focus,input[type=password]:focus{
  width: 70%;
  padding: 3px 5px;
  margin-bottom: 5px;
  box-sizing: border-box;
  background-color: rgba(174, 181, 187, 0.404);
}
.container p{
  font-size:20px;
  margin-top:5px;
}
</style>
<body>

<form action="login.php" method="post">
  <div class="container">
    <h2>Login Form</h2>
    <label for="uname"><b>Email</b></label><br>
    <input type="text" placeholder="Enter Email" name="uname" required><br>
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>  <br>  
      
  <div class="clearfix" >
    <button type="submit" class="btn btn-success">Login</button>
    <a href="home.php"><button type="button" class="btn btn-secondary" >Cancel</button></a>
  </div>
  <p> Don't have an Account? <a href="signup.php"> Signup Now!</a></p>
</div>
</form>

</body>
</html>


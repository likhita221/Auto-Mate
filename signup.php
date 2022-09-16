<?php
if(isset($_POST['email']))
{
  include("dbconnect.php");
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['psw'];
  $cpassword=$_POST['psw-repeat'];
  $gender=$_POST['gender'];
  $hash=password_hash($password,PASSWORD_DEFAULT);
  $q1="SELECT * FROM customer_info";
  $ex=$conn->query($q1);
  if(mysqli_num_rows($ex)==0)
  {
      if($password==$cpassword){
       $q2="INSERT INTO customer_info VALUES('$name','$email','$hash','$gender')";
       $conn->query($q2);
       header("location:home.php");
      }
      else{
        echo "Passwords don't match";
      }
  }
  else{
     $q1="SELECT * FROM customer_info WHERE email='$email'";
     $ex=$conn->query($q1);
     if((mysqli_num_rows($ex)==1)){
        echo '<center><div style="color: white; background-color:#ff3b3b;">THIS EMAIL ID IS ALREADY REGISTERED!!!</div></center>';
     }
     else{
            if($password==$cpassword){
              $q2="INSERT INTO customer_info VALUES('$name','$email','$hash','$gender')";
              $conn->query($q2);
		session_start();
          	$_SESSION['active']=$email;
          	$_SESSION['auth']=TRUE;
              header("location:home.php");
            }
            else{
              echo '<center><div style="color: white; background-color:#ff3b3b;">PASSWORDS DO NOT MATCH!!!</div></center>';
            }
     }
  }

  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>SignUp Form</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
body{
  background-image:url('img/2.JPG');
}
.container h1{
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
  margin-bottom:10px;
}
input[type=name],input[type=email],input[type=password]{
  width: 70%;
  padding: 3px 5px;
  margin-bottom: 5px;
  box-sizing: border-box;
}
input[type=name]:focus,input[type=email]:focus,input[type=password]:focus{
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
    <form action="signup.php" method="POST" style="border:1px solid #ccc">
      <div class="container" > 
        <h1 >Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    
    <label for="name"><b>Name</b></label><br>
    <input type="name" placeholder="Enter name" name="name" required ><br>
    <label for="email"><b>Email</b></label><br>
    <input type="email" placeholder="Enter Email" name="email" required><br>

    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required><br>

    <label for="psw-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
</label><br>
      <label for="gender"><b>Gender</b></label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label>

    <div class="clearfix">
      <button type="submit" class="btn btn-success">Sign Up</button>
      <a href="home.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
    </div>
    <p>Already have an Account? <a href="login.php"> Login Now!</a></p>
  </div> 
</form>


</body>
</html>



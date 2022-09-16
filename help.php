<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth'])
{
    include("help_active.php");
}
else{
    include("help_inactive.php");
}
if(isset($_POST['input'])){
	$i=$_POST['input'];
	$n=$_POST['name'];
	$e=$_POST['email'];
	include ("dbconnect.php");
	$q="INSERT INTO help(name,email,info) VALUES ('$n','$e','$i')";
	$conn->query($q);
}
?>
<html>
<body>
<div class="container-fluid padding">
	<div class="row padding">
		<div class=" col-md-12 col-lg-6">
			<h1 style="padding:30px;">We are all ears</h1>
			<p>Facing any trouble with our application? Unfortunately we can't read your mind so instead just write to us and we'll contact you soon with a solution.</p>
			<p>We also believe in colaborative development, so we welcome your suggestions that will help us to improve. Let's make this better, together.</p>
			<br>
		</div>

		
		<div class="col-lg-6">
                    <div class="form-group" style="padding:30px;">
		<form action="help.php" method="post">
		<table cellpadding = "5" style="width:100%">
		<tr>
		<td><labelfor="name">Name</label></td>
		<td style="width:100%"><input type="text" class="form-control" id="name" name="name" placeholder="Name" required/></td>
		</tr>
		<tr>
		<td><labelfor="email">Email ID</label></td>
		<td style="width:100%"><input type="email" class="form-control" id="email" name="email" placeholder="Email ID" required/></td>
		</tr>
                <tr><td colspan="2"><label for="exampleFormControlTextarea1"><b>Please tell us..<b></label><br>
                <textarea  class="form-control" id="exampleFormControlTextarea1" rows="15" name="input"></textarea></td></tr>
                <tr><td><button type="submit" class="btn btn-primary">Submit</button></td></tr>
		</table>
		</form>
		     </div>
		</div>
		
	</div>
</div>
</body>
</html>
<?php
include("footer.html");
?>
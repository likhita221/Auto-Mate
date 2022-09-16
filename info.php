<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth'])
{
    include("info_active.php");
}
else{
    include("info_inactive.php");
}
?>
<html>
    <body>
    <div class="container-fluid padding">
	<div class="row padding">
		<div class=" col-md-12 col-lg-6">
			<h2 style="padding:30px;">How is it done ?</h2>
			<ul compact=compact; type="disc">
				<li>Go to <a href="home.php">homepage</a> and click on "Schedule A Ride" button</li>
				<li>Select your desired destination</li>
				<li>Choose your travelling date and time</li>
				<li>Click on "Search"</li>
			</ul>
			<p>We will search our database to find your potential co-travellers.<br>In case there are no matches found,
			kindly come back later to check again.</p>
			<br>
			
		</div>
		<div class="col-lg-6">
			<img src="img/info.jpg" class="img-fluid" alt="df">
		</div>
	</div>
</div>
</body>
</html>


<?php
include("footer.html");
?>
<?php
session_start();
if(isset($_SESSION['auth']) && $_SESSION['auth'])
{
    include("home_active.php");
}
else{
    include("home_inactive.php");
}
?>
<html>
<body>
<button onclick="topFunction()" id="myBtns" title="Go to top">Top</button>
<script>
//Get the button:
mybutton = document.getElementById("myBtns");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
<div class="container-fluid">
	<div class="row go">
		<div class="go-text">
				<a  class="gobtn" href="booking.php">Schedule Now</a>
		</div>
	</div>
</div>
<div class="container-fluid padding " style="padding:30px;">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Why AutoMate ?</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Tired of waiting in those long ticket lines? Or maybe of paying too much while travelling alone in autos or cabs?
			<br>Automate is your companion application that can help you find potential co-travellers. Switch to pooling and help save our woodland of Dumna.</p>
		</div>
	</div>
</div>
<!--- Three Column Section -->
<div class="container-fluid padding" >
	<div class="row text-center padding">
			<div class="pad3 col-xs-12 col-sm-6 col-md-4" style="padding:60px;">
				<i class=" icon-b fa fa-clock-o"></i>
				<h1>Save Time</h1>
				<P>We know you don't have much</P>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4" style="padding:60px;">
				<i class="icon-b fa fa-money"></i>
				<h1>Save Money</h1>
				<P>We know you don't have much of it either</P>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4" style="padding:60px; padding-left:40px;">
				<i class="icon-b fa fa-leaf"></i>
				<h1>Save Enviroment</h1>
				<P>Please do it. No one wants another 2020</P>
			</div>
		
	</div>
    <hr class="my-4">
    

 <div class="sldes">
    <div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1" ></li>
        <li data-target="#slides" data-slide-to="2" ></li>
        <li data-target="#slides" data-slide-to="3" ></li>
	</ul>
	<div class="carousel-inner" >
		<div class="carousel-item active">
			<img src="img/temple1.jpg" alt="1">
			
		</div>
		<div class="carousel-item">
			<img src="img/rly.jpg" alt="2">
		</div>
		<div class="carousel-item">
			<img src="img/bhedaghat.jpg" alt="3">
        </div>
        <div class="carousel-item">
            <img src="img/dark.jpg" alt="4">
            <div class="carousel-caption">
				<h5 class="display-2 capt" >...and many more to <br>Explore</h5>
				
				<a href="booking.php"><button type="button" class="btn btn-outline-light btn-lg" >Schedule Now</button></a>
			</div>
		</div>
	</div>
</div>
</div>






    <div class="container-fluid padding" style="padding-top:50px;">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4" >Meet the Creators </h1>
		</div>
	</div>
</div>

<!--- Cards -->

<div class="container-fluid padding" style="padding:75px; padding-top:0px;">
	<div class="row padding">
		<div class="col-md-4">
			<div class="card">
				<img src="img/ashesh1.jpg" alt="Creator image" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title">Ashesh Dubey</h4>
					<p>I'm a Computer Science & Engineering sophomore, being forged at PDPM IIITDM Jabalpur. 
					With a passion to help people in need, I'm looking forward to opportunities in field of Astronomy, 
					ML or just a chat with interesting people.</p>
				    <a href="https://www.mirakee.com/ashesh_dubey" target="blank" class="btn btn-outline-secondary">ashesh_dubey</a>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="card">
				<img src="img/likhita.jpeg" alt="Creator image" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title">Likhita Reddy</h4>
					<p>A sophpmore at PDPM IIITDMJ. I am a Computer Science & Engineering Undergrad based in Hyderabad. I also have an interest in photography but mainly like
					capturing moments of my pets.</p>
				    <a href="https://www.instagram.com/likhita__reddy/" target="blank" class="btn btn-outline-secondary"><i class="fa fa-instagram"></i>likhita__reddy</a>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="card">
				<img src="img/rishabh.jpeg" alt="Creator image" class="card-img-top">
				<div class="card-body">
					<h4 class="card-title">Rishabh Saxena</h4>
					<p>A Computer Science & Engineering sophomore at PDPM IIITDM Jabalpur, belonging to Allahabad. 
					Always amazed by various genres of creativity. A part-time sketcher as well, but not necessarily a good one.</p>
				    <a href="https://www.instagram.com/rishabhsaxena341/" target="blank" class="btn btn-outline-secondary"><i class="fa fa-instagram"></i>rishabhsaxena341</a>
				</div>
			</div>

		</div>
	</div>
</div>
</div>



</body>

</html>
<?php
include("footer.html");
?>
<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: ../index.html");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Welcome - <?php echo $userRow['userEmail']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/newstyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin|Pacifico" rel="stylesheet">
</head>

<body>
	<nav class="navbar navbar-toggleable-md navbar-light" style="background-color:#EFEFEF;">
	  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
	  </button>
	  <a class="navbar-brand" href="#">Medico</a>
	  <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<div class="nav-item nav-link"><a href="#contact-us">Contact Us</a></div>
			  <div class="nav-item nav-link"><a href="#">Appointments</a></div>
			  <div class="nav-item nav-link">
					<div class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			     		<span class="glyphicon glyphicon-user"></span><?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
			        <ul class="dropdown-menu">
			           <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
			        </ul>
					</div>
			</div>
	  </div>
	</nav>
	<div class="container-fluid" style="background-color:#233237;">
		<div class="row no-gutters vertical-align">
			<div class="col-8"><img src="../Images/homenew.jpg" class="img-fluid"></div>
			<div class="col-4" style="position: relative;float:left; display:table;color:white">
				<div class="col"style="padding-top:8em;padding-left:.75em;"><h1>Healthcare at your desk!!<br></h1></div>
				<div class="col"style="padding-top:1.5em;padding-left:.75em;">A service that connects doctors and patients via a easy to use, convenient interface.</div>
				<div class="col"style="padding-left:.75em;padding-top:1.5em;"><button href="../appointment" class="btn btn-outline-primary btn-md" style="text-decoration-style:none;">Make an appointment</a></div>
			</div>
		</div>
	</div>
	<div class="container-fluid" style="background-color:#76323F;">
		<div class="row align-items-start">
			<section id="services" style="padding-left:1.75em;">
				<ul>
					<li class="serv-left"><a>Our Services</a><br>We offer easy access to<br>doctors that you need when<br>you need them.</li>
					<li class="serv-right">
						<ul>
							<li class="serv-right-heading">24 hour Support</li>
							<li class="serv-right-desc">Our service is available 24x7,<br>365 days a year. Use our<br>service to contact the<br>specialist you need, when<br>you need them.<br><br></li>
							<li class="serv-right-heading">Book Appointments</li>
							<li class="serv-right-desc">Providing quick access to<br>medical services and professionals<br>aid tips when you need them.<br></li>
						</ul>
					</li>
				</ul>
			</section>
		</div>
	</div>
	<div class="container-fluid" style="background-color:#D9D9D9;">
			<div class="row">
				<div class="col-5" style="padding-left:2.5em">
					<div class="row" style="padding-top:2.5em;padding-left:.75em;"><h2>Contact Us</h2></div>
					<div class="row" style="padding-top:1.5em;padding-left:1.75em;">Email</div>
					<div class="row" style="padding-top:.75em;padding-left:1.75em;">info@medico.com</div><br>
				</div>
				<div class="col-7" style="position: relative;float:left; display:table;">
					<div class="container-fluid" id="contact_heading" >Have Any Query? Or Book an Appointment
						<form method="" action="post" id="contact_email">
							<input type="text" class="col-sm-7" id="your_name" name="name" placeholder="Your Name"><br>
							<input type="email" class="col-sm-7" id="your_email" name="email" placeholder="Your Email"><br>
							<input type="text" class="col-sm-7" id="msg" name="message" placeholder="Message" maxlength="300"><br>
							<input type="text" class="col-sm-7" id="subject" name="subject" placeholder="Submit"><br>
							<input type="button" class="col-sm-4" id="send_message" onclick="alert('Sending email')" value="Send Message"><br>
						</form>
					</div>
				</div>
			</div>
	</div>
<script src="js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>

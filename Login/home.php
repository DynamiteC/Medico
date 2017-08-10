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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Cabin|Pacifico" rel="stylesheet"> 
</head>
<body> 
<section id="header">
	<ul>
		<li class="headeritem2"><a href="#contact-us"><img src="../Images/contact.png" alt="Contact Us"></a></li>
		<li class="headeritem1"><a href="#forum"><img src="../Images/forum.png" alt="Forum"></a></li>
		<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
     		<span class="glyphicon glyphicon-user"></span><?php echo $userRow['userEmail']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
	</ul>
</section>

<section id="illustration">
	<img id="mainimage" src="../Images/home.jpg">
</section>

<section class="content">
	<ul>
		<li id=big>Healthcare at your desk!!</li>
		<li>A service that connects doctors and <br>patients
via a easy to use, convenient interface.</li>
		<li>
			<a id="submit" href="../appointment">Make an appointment</a>
		</li>
	</ul>
</section>
<section id="services">
	<ul>
		<li class="serv-left"><a>Our Services</a><br>We offer easy access to<br>doctors that you need when<br>you need them.</li>
		<li class="serv-right">
			<ul>
				<li class="serv-right-heading">24 hour Support</li>
				<li class="serv-right-desc">Our service is available 24x7,<br>365 days a year. Use our<br>service to contact the<br>specialist you need, when<br>you need them.<br><br></li>
				<li class="serv-right-heading">Emergency Services</li>
				<li class="serv-right-desc">Providing quick access to<br>ambulance services and first<br>aid tips when you need them.<br></li>
			</ul>
		</li>
	</ul>
</section>
<section id="contact-us">
	<ul>
		<li class="contact" id="about_us"><ul>
				<li>Contact Us</li><br>
				<li id="contact_email_header">Email</li>
				<li id="contact_email">info@medico.com</li><br>
			</ul>
		</li>
		<li class="contact" id="contact_heading" >Have Any Query? Or Book an Appointment
			<form method="" action="post" id="appointment_form">
				<input type="text" id="your_name" name="name" placeholder="Your Name"><br>
				<input type="email" id="your_email" name="email" placeholder="Your Email"><br>
				<input type="text" id="subject" name="subject" placeholder="Submit"><br>
				<input type="text" id="msg" name="message" placeholder="Message" maxlength="300"><br>
				<input type="button" id="send_message" onclick="alert('Email has been sent')" value="Send Message"><br>
			</form>
		</li>
</section>
<section id="footer">
	<ul>
		<li>Developed by Shail Sheth</li>
	</ul>	
</section>
<script src="js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>
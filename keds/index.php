<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ansonika CountDown Specialty Pages </title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link href="css/master.css" rel="stylesheet" type="text/css"/>
<link href="css/font/font.css" rel="stylesheet" type="text/css"/>
<link href="css/style_4.css" rel="stylesheet" type="text/css"/>
<!--[if IE]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
<!-- JQUERY -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
<!-- JQUERY COUNTDOWN -->
<script type="text/javascript" src="js/countdown/jquery.countdown.js"></script>
<script type="text/javascript">
$(function () {
	var austDay = new Date();
	<!-- austDay = new Date(austDay.getFullYear() + 1, 8-12, 01); -->
	austDay = new Date(2016, 0, 30);
	$('#defaultCountdown').countdown({until: austDay});
});
</script>
<script type="text/javascript">
function clickclear(thisfield, defaulttext, color) {
      if (thisfield.value == defaulttext) {
            thisfield.value = "";
            if (!color) {
                color = "6D6F71";
            }
            thisfield.style.color = "#" + color;
      }
}
function clickrecall(thisfield, defaulttext, color) {
      if (thisfield.value == "") {
            thisfield.value = defaulttext;
            if (!color) {
                color = "6D6F71";
            }
            thisfield.style.color = "#" + color;
      }
}
</script>
<!-- Jquery Validate-->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myform").validate();
  });
  </script>
</head>

<body>

<div id="container_main">

<!-- Start wrapper -->
<div id="wrapper">
<div id="logo"><img src="img/logo.png" width="304" height="83" alt="Your Logo" /></div><!-- Your logo-->
    <h1>New Website Coming Soon!</h1>
    <h2>Lorem ipsum dolor sit amet, vel brute quaestio volutpat no, eu est delenit signiferumque.</h2>
<div id="defaultCountdown"></div>
<div class="clr"></div>
<p>Lorem ipsum dolor sit amet, eu eos minim euismod maiestatis, cu diam. 
  <span class="get">Get notified when we launch!!</span></p>

<!-- Start newsletter form -->
<div id="form_bg">
<?php
		if (!count($_POST)){
		?>
	<form method="post" id="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<input name="Email" type="text" class="required email" value="enter your email address.." onclick="clickclear(this, 'enter your email address..')" onfocus="clickclear(this, 'enter your email address..')" onblur="clickrecall(this,'enter your email 	address..')"/>    
	<button type="submit" class="send_bt">Send Message</button>
    </form>
    <?php
		}else{
	    ?>
        <!-- START SEND MAIL SCRIPT -->
  		<div>
        	 <p class="success">Email Successfully Sent!</p>
        </div>
						
						<?php
						$mail = $_POST['email'];

						/*$subject = "".$_POST['subject'];*/
						$to = "info@ansonika.com";
						$subject = "Message from Your Website";
						$message = "Plase notify me when site launch \n";
						$message .= "\nEmail: " . $_POST['Email'];
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						}
						?>
						
		<!-- END SEND MAIL SCRIPT -->    
</div>

</div><!-- End wrapper -->

<!-- Start footer -->
<div id="footer">
<ul>
    <li><a href="#">Twitter</a></li>
    <li><a href="#">Facebook</a></li>
    <li class="last"><a href="#">Buy this theme</a></li>
</ul>
<div class="clr"></div>
Copyright © 2011 Your Company
</div><!-- End footer -->

</div><!-- End container main -->
</body>
</html>

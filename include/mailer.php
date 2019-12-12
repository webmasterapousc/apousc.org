<?php
/**
 * Mailer.php
 *
 * The Mailer class is meant to simplify the task of sending
 * emails to users. Note: this email system will not work
 * if your server is not setup to send mail.
 *
 * If you are running Windows and want a mail server, check
 * out this website to see a list of freeware programs:
 * <http://www.snapfiles.com/freeware/server/fwmailserver.html>
 *
 * Written by: Jpmaster77 a.k.a. The Grandmaster of C++ (GMC)
 * Last Updated: August 19, 2004
 */

class Mailer
{
	/**
	 * sendWelcome - Sends a welcome message to the newly
	 * registered user, also supplying the username and
	 * password.
	 */
	function sendWelcome($user, $email, $pass, $fname, $lname)
	{
		$headers = "From: " . EMAIL_FROM_NAME . " <" . EMAIL_FROM_ADDR . ">" . PHP_EOL;
		$headers .= "Content-type: text/html; charset=UTF-8" . PHP_EOL;
		$subject = "Alpha Phi Omega - Alpha Kappa Chapter: Welcome";
		$body    = "<html>" . PHP_EOL .
		"<head>" . PHP_EOL .
		"	<title>" . $subject . "</title>" . PHP_EOL .
		"</head>" . PHP_EOL .
		"<body>" . PHP_EOL .
		"	<p>Dear " . $fname . " " . $lname . ",</p>" . PHP_EOL .
		"	<p>Welcome! You've just been registered at APO - Alpha Kappa's website with the following information:</p>" . PHP_EOL .
		"	<ul>" . PHP_EOL .
		"		<li><strong>Username:</strong> " . $user . "</li>" . PHP_EOL .
		"		<li><strong>Password:</strong> " . $pass . "</li>" . PHP_EOL .
		"	</ul>" . PHP_EOL .
		"	<p>Please log in at <a href=\"http://www.apousc.com\">www.apousc.com</a> using your above username and password, and view your user account information by clicking on your name at the top of the left-side navigation bar. Please change your default password, or anyone will be able to sign in as you simply by knowing your username. You may also change your e-mail address on file if you wish to receive your APO - AK website e-mails at a different address. If you have any questions, please address the Webmaster at <a href=\"mailto:apousc@gmail.com\">apousc@gmail.com</a>.</p>" . PHP_EOL .
		"	<p>--------<br />In Leadership, Friendship, and Service, <br />Alpha Phi Omega &ndash; Alpha Kappa Chapter</p>" . PHP_EOL .
		"	<br /><br />" . PHP_EOL .
		"	<p style=\"color:#606060;font-size:75%;\">If you believe that you have received this e-mail in error, please reply to this message or send an e-mail to <a href=\"mailto:apousc@gmail.com\">apousc@gmail.com</a> to let us know!</p>" . PHP_EOL .
		"</body>" . PHP_EOL .
		"</html>" . PHP_EOL;
		return mail($email, $subject, $body, $headers);
	}
	
	/**
	 * sendNewPass - Sends the newly generated password
	 * to the user's email address that was specified at
	 * sign-up.
	 */
	function sendNewPass($user, $email, $pass, $first)
	{
		$headers  = "From: " . EMAIL_FROM_NAME . " <" . EMAIL_FROM_ADDR . ">" . PHP_EOL;
		$headers .= "Content-type: text/html; charset=UTF-8" . PHP_EOL;
		$subject  = "New Password";
		$body     = "<html>" . PHP_EOL .
		"<head>" . PHP_EOL .
		"	<title>" . $subject . "</title>" . PHP_EOL .
		"</head>" . PHP_EOL .
		"<body>" . PHP_EOL .
		"	<p>Dear " . $first . ",</p>" . PHP_EOL .
		"	<p>As per your request, your password on the Alpha Phi Omega &ndash; Alpha Kappa Chapter website has been reset with the following information:</p>" . PHP_EOL .
		"	<ul>" . PHP_EOL .
		"		<li><b>Username</b>: " . $user . "</li>" . PHP_EOL .
		"		<li><b>Randomly Generated Password</b>: " . $pass . "</li>" . PHP_EOL .
		"	</ul>" . PHP_EOL .
		"	<p>Please log in to the Alpha Kappa website at <a href=\"http://www.apousc.org\">www.apousc.org</a> using your username and password above, and <b><i>change your password to one that is easier to remember</i></b>. You can do this by accessing your user account by clicking on your name at the top of the left-hand column, after signing in.</p>" . PHP_EOL .
		"	<p>--------<br />In Leadership, Friendship, and Service, <br />Alpha Phi Omega &ndash; Alpha Kappa Chapter</p>" . PHP_EOL .
		"	<br /><br />" . PHP_EOL .
		"	<p style=\"color:#606060;font-size:75%;\">If you believe that you have received this e-mail in error, please reply to this message or send an e-mail to <a href=\"mailto:webmaster.apousc@gmail.com\">webmaster.apousc@gmail.com</a> to let us know!</p>" . PHP_EOL .
		"</body>" . PHP_EOL .
		"</html>" . PHP_EOL;
		return mail($email, $subject, $body, $headers);
	}

	/**
	 * submitContact - Sends email to us from contact form
	 */
	function submitContact($name, $email, $phone, $subject, $message)
	{
		include_once("include/convert_text.php");
		$from = "From: " . $name . " <" . $email . ">" . "\r\n";
		$from .= "Content-type: text/html; charset=UTF-8" . "\r\n";
		$body = "<html>\n<head>\n\t<title>$subject</title>\n</head>\n<body>\n\t<p><strong style=\"text-decoration:underline;font-size:125%;\">Web Contact Form Submission</strong></p>\n\t<p><strong>Name:</strong> $name</p>\n";
		if (strcmp($phone,"") !== 0) {
			$body .= "\t<p><strong>Phone Number:</strong> " . preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone) . "</p>\n";
		}
		$message = stripslashes(convertText($message));
		$body .= "\t<p><strong>Message:</strong> </p>\n\t" . $message . "</body>\n</html>";
		return mail(EMAIL_FROM_ADDR, $subject, $body, $from);
	}
}


/* Initialize mailer object */
$mailer = new Mailer;

?>
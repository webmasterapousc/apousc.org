<?php
# Include the Autoloader (see "Libraries" for install instructions)
require '../vendor/autoload.php';
use Mailgun\Mailgun;
include_once 'constants.php';
function sendMail($mail_to, $mail_subject, $mail_msg) {
	// First, instantiate the SDK with your API credentials
	$mg = Mailgun::create(MG_API_KEY); // For US servers

	// Now, compose and send your message.
	// $mg->messages()->send($domain, $params);
	echo ("mail ".$mail_to." subject ".$mail_subject." text ".$mail_msg);
	$mg->messages()->send("mail.apousc.org", [
	  'from'	=> 'APOUSC Webmaster <webmaster.apousc@gmail.com>',
		'to'	=> 'Member <'.$mail_to.'>',
		'subject' => $mail_subject,	
		'text'	=> $mail_msg
	]);
}

?>

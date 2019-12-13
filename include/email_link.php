<?php
/** Email Link Obfuscator
 *  This PHP function/jQuery plugin will create an obfuscated mailto link that will protect your email addresses from the spam bots that harvest the web
 *  http://www.php-ease.com/functions/email_link.html
 */
function email_link($text, $to, $subject = "", $body = "")
{
	$link   = "mailto:" . rawurlencode($to);
	$params = array();
	$remove = array("&", "=", "?", "\"");
	if (!empty($subject))
		$params[] = "subject=" . rawurlencode(str_replace($remove, "", $subject));
	if (!empty($body)) {
		$body     = str_replace(array("\r\n", "\n", "<br />"), array("\n", "", "%0A"), nl2br($body));
		$params[] = "body=" . rawurlencode(str_replace($remove, "", $body));
	}
	if (!empty($params))
		$link .= "?" . implode("&", $params);
	$link       = base64_encode($link);
	$show_email = "";
	// If link text is the actual e-mail address, encode $text as well
	if (strcmp($text, $to) == 0) {
		$text       = base64_encode(str_replace("mailto:", "", base64_decode($link)));
		$show_email = " show_email";
	}
	return "<a class=\"nospam" . $show_email . "\" href=\"#\" title=\"" . $link . "\">" . $text . "</a>";
}
?>
<?php
/**
 * This function converts plain text into HTML with <p></p> and <br /> tags, and converts select BBCode to HTML
 */
function convertText($plain_text)
{
	// Convert plain text carriage returns to <p> and <br /> tags
	$noBreaks = htmlspecialchars($plain_text); // DO NOT CHANGE THIS LINE! Removes all HTML tags by replacing <, >, &, etc., thus eliminating the possibility of user-entered code affecting the layout of the page
	$noBreaks = preg_replace("/\r\n/", "[-LB-]", $noBreaks);
	$noBreaks = preg_replace("/\n/", "[-LB-]", $noBreaks);
	$noBreaks = preg_replace("/\r/", "[-LB-]", $noBreaks);
	
	$re1      = "/\s+/";
	$noBreaks = preg_replace($re1, " ", $noBreaks);
	
	$re4      = "/\[-LB-\]\[-LB-\]/i";
	$noBreaks = preg_replace($re4, "</p><p>", $noBreaks);
	
	$re5      = "/\[-LB-\]/i";
	$noBreaks = preg_replace($re5, "<br /> ", $noBreaks);
	
	$noBreaks = "<p>" . $noBreaks . "</p>";
	
	// Convert BBCode to HTML
	$search   = array(
		'@\[b\](.*?)\[/b\]@si',
		'@\[i\](.*?)\[/i\]@si',
		'@\[u\](.*?)\[/u\]@si',
		'@\[url=(.*?)\](.*?)\[/url\]@si',
		'@\[list\](.*?)\[/list\]@si',
		'@\[numbered\](.*?)\[/numbered\]@si',
		'@\[item\](.*?)\[/item\]@si',
		'@&lt;3@'
	);
	$replace  = array(
		'<strong>\\1</strong>',
		'<em>\\1</em>',
		'<span style="text-decoration:underline">\\1</span>',
		'<a href="\\1" rel="external">\\2</a>',
		'<ul>\\1</ul>',
		'<ol style="list-style-type:decimal;margin-left:2em;">\\1</ol>',
		'<li>\\1</li>',
		'&hearts;'
	);
	$noBreaks = preg_replace($search, $replace, $noBreaks);
	
	// Remove lists from within paragraphs
	$search   = array(
		'@<p>(.*?)<ul>(.*?)</ul>(.*?)</p>@si',
		'@<p>(.*?)<ol(.*?)>(.*?)</ol>(.*?)</p>@si'
	);
	$replace  = array(
		'<p>\\1</p><ul>\\2</ul><p>\\3</p>',
		'<p>\\1</p><ol\\2>\\3</ol><p>\\4</p>'
	);
	$noBreaks = preg_replace($search, $replace, $noBreaks);
	
	// Clean up empty paragraphs and redundant carriage returns
	$noBreaks = str_replace("<p></p>", "", $noBreaks);
	$noBreaks = str_replace("<p><br /> </p>", "", $noBreaks);
	$noBreaks = str_replace("\r\n\r\n", "", $noBreaks);
	$noBreaks .= "\n";
	
	return $noBreaks;
}
?>
<?php
// Google Analytics
include_once("include/analytics.php")

// Initiate connection to database and user login session
include("include/session.php");

// Set values for page
$page_title = "Webmaster Information";
$current_page = "webmaster_info";

// Load header
include_once("include/header.php");

// Below this PHP block, set page-specific JavaScript, CSS, and anything else for the <head>
##################################################
?>

<?php
##################################################
// Load top navigation
include_once("include/topnav.php");

// Below this PHP block, enter only the main HTML content of the page. All necessary layout, body, html, etc. tags are included in the PHP includes.
##################################################

if($session->isOfficer()){
echo "<h2>Webmaster Information Page</h2>

<h3>Resources</h3>
<ul>
    <li><a href='http://www.php.net'>Official PHP Web Site</a> (helpful for looking up specific functions, such as date()</li>
    <li><a href='https://docs.google.com/document/d/16m7NgKzDLSEUouE_AgKHyyr4ToAF2dqATurdgwlgH2g/edit'>Casey's One-on-One Agenda</a> (includes some explanations and tips)</li>
    <li><a href='https://docs.google.com/document/d/1JVMrQS-Q3dD8XngeOMcFKOWR57X4rdaX-d3Rol22Xrg/edit'>Casey's Code Walkthrough</a> (line by line)</li>
    <li><a href='docs/APO Transition Webmaster.pdf'>Casey's Transition Document</a></li>
</ul>

<h3>Webmasters Through Time</h3>
<p>Please contact the more recent webmasters (who are more familiar with the current web site) before contacting the older ones.
<ul>
    <li><strong>Spring 2006&mdash;Spring 2007</strong>: Mike Gangl (mike.gangl@gmail.com)</li>
    <li><strong>Spring 2007&mdash;Spring 2008</strong>: Ryan Dumouchelle (rdumouchelle@gmail.com)</li>
    <li><strong>Spring 2008&mdash;Spring 2009</strong>: Kevin Kim (kevinski.ksk@gmail.com)</li>
    <li><strong>Fall 2009</strong>: Jillian Kobayashi (kobayashi.jb@gmail.com)</li>
    <li><strong>Spring 2010</strong>: Bradley Ramos (bradleyramos@gmail.com)</li>
    <li><strong>Fall 2010&mdash;Spring 2011</strong>: ???</li>
    <li><strong>Fall 2011</strong>: Joshua Dane (jdane@usc.edu)</li>
    <li><strong>Spring 2012</strong>: Casey Penk (caseypenk@gmail.com)</li>
</ul>

<h3>Quick Tips</h3>
    <p>
        When coding the web site, much of the work you do will repeat itself, so it helps to know strategies to use whenever you encounter a certain task or challenge. Also, a number of frustrating errors tend to recur often. These issues can be easily solved if you're aware of what you're doing.
    </p>
    <p>
        For further reading, consider checking out <a href='http://www.dummies.com/how-to/content/html-xhtml-css-for-dummies-cheat-sheet.html'><em>HTML, XHTML and CSS For Dummies</em></a>. It's a great intro, explaining concepts in depth and with great clarity. It also covers a huge swath of the technologies used on the web site (and some technologies that you should implement if you feel up to the task!)
    </p>
    <ul>
    <li>
        <strong>Concatenation</strong>: PHP is very flexible, because it allows you to combine almost anything with anything else. If you want to display the phrase <em>\"The date is ".date("M j").".\"</em> without the quotation marks you would combine a literal quote with a PHP command to display the date. In other words, the first part of the statement is just the normal text <em>\"The date is \"</em>, while the second part of the statement uses the PHP date command and the third statement displays a period after the date. The code for this particular task would be <code>echo \"The date is \".date(\"M j\").\".\";</code> Of course, the server will display a different date based upon the current day, but the underlying code will always be the same.
    </li>
        <li>
            <strong>Remember your semicolons</strong>: Be sure to close every PHP statement with a semicolon (;). You need them to separate statements.
        </li>
        <li>
            <strong>Close parentheses, brackets, and curly braces</strong>: For every beginning parentheses \"(\", bracket \"[\", and curly brace \"{\", make sure to have an equivalent instance to close out the statement.
        </li>
        <li>
            <strong>Escape special characters</strong>: Let's say you're writing an echo statement to display text on the page. In that case, PHP thinks a quotation mark is going to signify the beginning and end If you want to literally print a quotation mark (\") within a PHP echo statement, use a backslash before the quotation mark to escape the quotation mark. If you want to print <em>Casey said \"Hello world.\"</em> then type in <code>Casey said \\\"Hello world.\\\"</code> This same principle goes for escaping parentheses and other special characters.
        </li>
    </ul>
<h3>Technology Background</h3>
    <p>
        The site is constructed using several different Web development concepts.  If you are familiar with Web development practices and server-side scripting languages, you may skip past this section and to \"History of the Site.\"  Otherwise the following sections were written to provide a quick description of all the technology used to generate this Website.  With that, let's dive in.
    </p>
    <p>
        The Website is constructed using a combination of several different Web development languages.  The basic formatting and foundation is built using (X)HTML with minimal JavaScript interaction.  The real bulk of the Website's functionality comes from the use of PHP to dynamically generate (X)HTML and MySQL to fetch information from a database.
        Now, if you found yourself confused by any aspect of that last paragraph, don't freak out.  Let's break it down even further and take each aspect of it one step at a time.  
    </p>
    <p>
        First and foremost, I wanted to quickly give you my background with Web development.  Before developing this Website I hadn't had much experience developing Web applications and was a little intimated by the task at hand.  I will admit, yes, there is a lot of code and tech used on APO's Website but it's easy to do if you separate each aspect of the Web page down into its core components.  As I introduce different languages/concepts to you and you go on to learn them, the goal isn't to become a master of each concept as fast as you can.  I've been Web developing now for 3 years and I still have lots more to learn.  The real key is to learn the basics of each language and learn when each are appropriate to use based off of what you want to construct.  Imagine trying to build a house only using rocks - ridiculous right?  It's the same thing with application development.  You want to fully understand the pros and cons of the tools you have before you start constructing.  Ok? Ok.  Now let's finally get to the tech.
    </p>

<h3>Web Language Background</h3>
    <h4>HTML</h4>
        <p>
            All web pages are fundamentally built using HTML - which is a simply a language used for web document formatting.  Basically think of a Web Page like a MS Word document - you can bold text, italicize it, MAKE IT LARGER - whatever your heart desires.  Instead of simply hitting the bold button in Word you have to manually tell the web browser to perform the formatting for you (i.e. to make a word bold in HTML you surround it with the <b> </b> brackets).  I could go into a lot more detail about this but the internet is full of millions of great web pages that can teach you basic HTML. If you do not have any experience with HTML I would strongly recommend spending an hour or two browsing the internet and learning basic HTML.  Understanding the fundamentals of HTML will prove ultimately beneficial especially as this is the foundation block from which the website is built.
        </p>
    <h4>JavaScript</h4>
        <p>
            The next aspect that this site uses is JavaScript.  When a person loads a webpage that is built in basic HTML, the content will display on screen and any clicks on the webpage will only lead to other web pages being loaded.  There will be no interactivity on the website besides the static content defined by the web page's HTML.  If you are looking to make websites more interactive this is the benefit of using JavaScript.  JavaScript allows a developer to directly manipulate HTML content without having to load a brand new webpage - that is, it allows for client-side functionality.  It is client-side because the JavaScript does not require the webpage to be reloaded to run its code - or re-load the web server.  JavaScript is great for guiding users and applying restrictions on them (i.e. in this text field you can only enter a 4 digit number,  no numbers allowed in this text box, etc.)  Now our website barely uses any JavaScript right now but I encourage you to spend 20-30 minutes simply becoming familiar with what can be achieved using JavaScript.  Again the goal here isn't complete proficiency - it's a matter of understanding what can be done with JavaScript and when it is an appropriate solution to a web application's development.
        </p>
    <h4>PHP</h4>
        <p>
            Finally we get to the real meat and potatoes of the website - PHP.   With JavaScript we've learned we can modify a website's content without having to reload the page which is great to create a more dynamic website.  However - what if we want to load a webpage where the content is always continually changing.  What if you wanted a webpage to always load your schedule for whatever day it was. There are two options here - you can either go in and manually edit every single line of HTML (BAD! VERY BAD!) or you can create a web-site which is dynamically generated. Well the latter can be done using PHP to generate the HTML for your webpage. That is, PHP is a server-side scripting language which allows developers to create web pages with varied content.  Instead of defining every single line of HTML we can now develop conditional web page content.  In other words - based on the website's development and how people access the site (normal user vs. logged-in administrator) we can display different content on the same web page.  So for example - on the front page of our website you will see all sorts of PHP generated content - from the announcements to the list of upcoming events to even the totaling of the chapter's semester service hours.  We can define basic HTML for the aspects that will never change (the website's background, color scheme, etc) but for the items that will change based off of user input we can define those through PHP so that whenever the web page is loaded the latest information is always automatically displayed.  PHP is a very powerful thing!  Once you have a foundation in basic HTML and an understanding of JavaScript please spend a day or two simply playing scouring the internet reading up on PHP and learning what this language can do for you.
        </p>
    <h4>PHP and Databases</h4>
        <p>
            In the interest of saving you time - I wanted to point out one of the most important features of PHP: database querying.  Through PHP you can access any form of a database and access any data defined interior to it.  Databases are not just for the truly OCD - they are the spine of the data-organization skeleton.  As a result all information put into the website by it's users is stored into a series of databases.  Since all this information is organized for us by us (FUBU! :-P) we can make it hundreds of times easier when we need to access this information.  We do this by writing database queries which simply are a request to the database for specific information.  These are written in a general language called Standard Query Language (SQL) and the specific implementation we use for our website is called MySQL.  So how does this fit in with PHP?  Through PHP we send the database a query that we have written and again through PHP we can read and output the results to the webpage.  For example, say we wanted to display the number of service hours the fraternity performed so far for that semester.  We could simply write a query, insert it into PHP and the website always display the result of this query.  See how much nicer this is than always going on in and manually updating the PHP;  don't you love the smell of autonomous? :-P
        </p>
    <p>
        Now again - if you are unfamiliar with writing SQL queries I would recommend spending an hour or two simply browsing websites and learning the basics of SQL syntax.  I would say if you can get to the point of understanding nested queries you know more than enough for the purposes of developing for this website.
    </p>
    <p>
        I know that was a lot to take in - take a break, I promise the rest of this document will talk in high-level concepts and not go into that mind-numbingly level of detail.  This is a good time to mention:  please ask any questions that you have as soon as you have them to the previous webmaster.  It's ten times better to be curious and ask questions now then to ask them later when the website isn't working because of some erroneous line of PHP code.
    </p>

<h3>History of the Site</h3>
    <p>
        The site was initially developed in 2006. Parts of it were developed in December of 2005, but the majority of it has come from the fall spring 06 - spring 07 semesters. It started off with just a few features such as the calendar, events, and announcements. A roster was added later in the spring '06 semester. And nominations were added near the end of that semester. The following semester (Fall '06) the hours counter was added and online signups were finalized. Email systems were set up in spring '07.  Minor tweaks were added to the site throughout Fall '07 (updated queries) while the addition of a course database / web interface was constructed in Spring '08.  A major overhaul of the site, including starting over with a brand new database and the addition of username/password protection, was done in Spring '10.
    </p>
    <p>
        There are currently 2 emails sent out 2 days before an event that is signed up for, an email reminder is sent to that person. Every week, one email is sent to all actives/pledges/associates with the upcoming week's events.
    </p>
    <p>
        There is also a rudimentary photo manager but it has yet to see a lot of use. Improving navigation features and stylistic content might improve the use of this feature. Look for historian input on this. 
    </p>

<h3>Passwords</h3>
    <p>
        Do not list here. Please contact a previous webmaster if you do not already have these. Remember, anything you post on this web site has the potential to be viewed by anyone, so don't use this page for confidential communications.
    </p>
    
<h3>Regular Tasks</h3>
    <p>
    Below is a listing of all things that need to be done and when they need to be done. Many of these things a script can be written for to automate them. 
    </p>

<ul>
    <li>
        The first thing you do should be to back up the entire site, and possibly even the MySQL tables. If anything goes wrong, we will need some point to roll back to. 
    </li>
    <li>
        Weekly, you need to send the emails to all actives, pledges, and associate members. 
        2 days before every event you need to send out an email to all users signed up on that event. 
        Before nominations, the nominations form needs to be cleared. You can do this by deleting all entries in the Nominations table. 
    </li>
    <li>
        I have only done this on the PC, but I know it can be done on both Linux and macs as well. 
        Under start > programs > accessories > system tools > scheduled tasks 
        Enter a new task with the \"run\" command looking like the following: 
        C:\PROGRA~1\MOZILL~1\firefox.exe www.apousc.com/rss/rss.php
        This will generate the RSS feed for the site, as well as send the event notification emails. I have this run every day at noon currently. 
    </li>
    <li>
        Another run command should be: 
        C:\PROGRA~1\MOZILL~1\firefox.exe www.apousc.com/rss/weekly.php 
        This runs every Monday at 12:01, and sends out the weekly email. 
    </li>
</ul>

<h3>Suggested Modifications</h3>
    <p>
        There are a few things that I feel should be done on the site to have APO run a bit smoother. 
    </p>
    <ol>
        <li>
            <strong>Normalization</strong>: The database is not normalized to any real degree. If you're unaware of normalization this is probably not the project for you. It will require an overhaul of much of the database, and then a lot of the queries that the site uses as well. One of the keys to normalizing the database will be to convert all the tables in the MySQL database to the InnoDB format, which allows for foreign keys. Foreign keys allow you to tie one column of a table to one column of another table. This assists data integrity and helps prevent strange, unpredictable data from entering the database.
        </li>
        <li>
            <strong>User ID numbers</strong>: To improve tracking of users, you should track users in the database using unique ID numbers. People will still use their USC ID to log in, but the unique ID number will serve as a primary key in the user table of the database and allow more efficient linkage between the tables.
        </li>
        <li>
            <strong>Self-submissions</strong>: A lot of the pages with data that is submitted should probably submit to themselves (a common practice)&mdash;rather than process.php and then session.php and then database.php&mdash;but this is currently not how it is done. 
        </li>
        <li>
            <strong>Automate the end of the semester tasks for the website</strong>: This could include archiving all events, and changing all pledges to actives. 
        </li>
        <li>
            <strong>Improving the pictures section of the site</strong>: There is a comments field in the data table that is not currently displayed, but it would be very simple to do so. 
        </li>
        <li>
            <strong>Online sign ups for final boards</strong>: This would be a great system to use, it would need a table similar to the nomination table. I haven't thought through any of the particulars about this, but it would help the pledge master tremendously, and it would always be viewable to the actives and pledges. 
        </li>
        <li>
            <strong>Automate the Active Officers page</strong>: Right now all updates have to be done manually. There is a problem converting form the MySQL table to the data in the HTML/php pages. It's rather annoying and I didn't spend too much time on it, since it's only done once a semester. 
        </li>
        <li>
            <strong>Online spreadsheets for attendance requirement completion</strong>: Making the listing of events and signups for dynamic so it tracks what people actually went to and dynamically displays totals. Much easier on the officers (and more dynamic) than using a Google spreadsheet.
        </li>
        <li>
            <strong>Interactivity</strong>: Make the site more like Facebook, with dynamic updates. Use AJAX to push live updates of specific content without having to refresh the entire page. In terms of adding reasons for people to come back, allow people to leave commetns to one another.
        </li>
        <li>
            <strong>Switch web hosts</strong>: GoDaddy provides awful service and their servers are slow. Find a more reliable and trustworthy provider. Dedicated hosting would be the best. It may be more expensive, but the benefits in terms of loading times and usability would be huge.
        </li>
    </ol>

<h3>Costs</h3>
    <p>
        The hosting and domain must be renewed periodically. You should work with the VP of Finance to get this into the budget before the semester begins, so you don't have to pay out-of-pocket for it.
    </p>

<h3>General Advice</h3>
    <p>
        Uptime is very important. When the web site goes down for even a few minutes, it's very possible that someone will notice it and let you know. Try to use test pages, such as \"events_test.php\" rather than the actual \"events.php\" page. This provides a more continuous experience for end-users. Be extremely careful about editing the included files that appear on every page. An error in the header file, for example, will propagate to every single page on the site.
    </p>
    <p>
        If you realize you made a mistake, save your current work so you can come back to it later, and then upload a back-up as quickly as possible. The back-up may be missing some cool new features, but it will at least provide <em>something</em> for the users.
    </p>
    <p>
        You can log in as an administrator using the username and password provided by the previous webmaster (do NOT post on this web page!) There are a ton of Administrative links on the left, but not all of them work... The only thing that really works is adding the new members.
    </p>
    <p>
        Until now, pretty much every Webmaster has redone the entire site because they think they can do it better. And while I am sure that people can make the site better, or add more things, it would be an incredible waste of time.  Feel free to change graphics and what not, but try and keep the functionality the same. 
    </p>
    <p>
        Lastly, have fun with it and bring ideas.  Things change all the time on the web, so bringing things that work well to the site might make it even better. Keep up with emerging technologies such as AJAX.
    </p>
";
}
else{echo"Sorry! You must be an officer to view this page.";}
##################################################
// Load sidebar, footer, and dropdown stats panel
include_once("include/sidebarFooterDropdownpanel.php");
?>
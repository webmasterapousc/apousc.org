<?php
/**
 * secure_constants.php
 *
 * This file is intended to group all important constants that 
 * can't be leaked
 *
 * THIS FILE SHOULD NEVER BE PUT IN THE REPO!!! make sure its in
 * .gitignore
 *
 * Written by : Nick Chen (nickchen@usc.edu)
 * Last Updated: January 2020
 */

/**
 * Database Constants - these constants are required
 * in order for there to be a successful connection
 * to the MySQL database. Make sure the information is
 * correct.
 */
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "str0ngThec!rcl");
define("DB_NAME", "apousc5_main");

/**
 * Password Salt String
 * Warning: Changing this string will cause all users'
 * passwords to become invalid and everyone's password
 * will need to be reset individually!
 */
define("PASSWORD_SALT", "rZWkXf1tlHTJse00wrvBvLncE");
?>

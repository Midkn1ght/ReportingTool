<?php

/*############################
Bandwidth From cPanel
Brandon's cPanel Bandwidth Checker!!!
Made by Brandon <brandon@x10hosting.com>
Support Info: http://www.blnetworks.net/showthread.php?p=197#post197
############################*/

// EDIT BELOW
$username = "murfreesboroauto"; // cPanel Username
$password = "U$^!!wkI8.e*"; // cPanel Password
$domain = "208.76.84.149"; // cPanel Domain
$theme = "paper_lantern"; // cPanel Theme



// DO NOT EDIT THIS CODE
ini_set("display_errors", "0");
$file = file_get_contents("http://$username:$password@$domain:2082/frontend/$theme/index.html") or die("<b>Critical Error, Please check your configuration</b>");
$string1 = strpos($file, "Bandwidth (this month)");
$file = substr($file,$string1);
$string2 = strpos($file, "Megabytes");
$length = strlen($file);
$take =  $length - $string2;
$finally = substr($file,0,-$take);
$number = explode("<td class=\"index2\">", $finally);
$number = explode(" ",$number[1]);
$bandwidth = $number[0];


// START EDITING
/*
 $bandwith is now the amount of bandwith you have used!
We are echoing it, but you can do whatever with it*/
echo $bandwidth;

?>
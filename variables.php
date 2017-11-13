<?php

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}
/* series of queries to pull info from site for sending, disk space, and company name*/
$clientEmailQuery = "SELECT option_value FROM `".$table_prefix."options` WHERE (option_name = 'client_email')";
$clientEmail = array();

$result17 = mysqli_query($mysqli, $clientEmailQuery);
$rowcount17 = mysqli_num_rows($result17);

  while ($row = mysqli_fetch_row($result17)){
  $clientEmail = $row[0];
//echo $clientEmail;
 }


$clientPathQuery = "SELECT option_value FROM `".$table_prefix."options` WHERE (option_name = 'client_path_to_cpanel')";
$path = array();

$result18 = mysqli_query($mysqli, $clientPathQuery);
$rowcount18 = mysqli_num_rows($result18);

  while ($row = mysqli_fetch_row($result18)){
  $path = $row[0];
//echo $path;
 }

$companyNameQuery = "SELECT option_value FROM `".$table_prefix."options` WHERE (option_name = 'client_name')";
$companyName = array();

$result19 = mysqli_query($mysqli, $companyNameQuery);
$rowcount19 = mysqli_num_rows($result19);

  while ($row = mysqli_fetch_row($result19)){
  $companyName = $row[0];
//echo $companyName;
 }

global $table_prefix;
//variables

//$email = 'brandon@jlbworks.com';
$TS = disk_total_space("$path"); //need the path for the directory. Can find in cPanel

//$companyName = 'JLB';

$FS = disk_free_space("$path"); //same as above

//echo $table_prefix; run this to check that it's pulling the right prefix. Check wp-config.php

//end variables

//echo'<br>' . $TS; //dont need the following two. Just used as tests to make sure I was pulling data. Uncomment to check.

//echo '<br>' . $FS;

$usedSpace = ($TS - $FS);//holds single value to bypass issue I was having doin subtraction during output. Was outputting second variable as negative. Likely no parenthesis.

function formatBytes($usedSpace, $precision = 2) {
  $units = array('B','KB','MB','GB','TB');

  $usedSpace = max($usedSpace, 0);
  $pow = floor(($usedSpace ? log($usedSpace) : 0) / log(1024));
  $pow = min($pow, count($units) - 1);

  //uncomment one of the following alternatives
  $usedSpace /= pow(1024, $pow);
  //$usedSpace /= (1 << (10 * $pow));

  return round($usedSpace, $precision) . ' ' . $units[$pow];

}
 ?>

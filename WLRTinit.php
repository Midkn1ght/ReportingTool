<?php

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

//start Alter Table queries

function databaseinit() {

  global $table_prefix;

  $wpconfig = dirname( __FILE__ ) . '/wp-config.php';
  require_once($wpconfig);

  $mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
  /* check connection */
  if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
  }

$initQuery1 = "ALTER TABLE `".$table_prefix."wsal_metadata` ADD the_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP" or die("Alter Error: ".mysql_error());

$result1 = mysqli_query($mysqli, $initQuery1);

$initQuery2 = "ALTER TABLE `".$table_prefix."wfLogins` ADD the_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP" or die("Alter Error: ".mysql_error());

$result2 = mysqli_query($mysqli, $initQuery2);

$initQuery3 = "ALTER TABLE `".$table_prefix."wfBlockedIPLog` ADD the_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP" or die("Alter Error: ".mysql_error());

$result3 = mysqli_query($mysqli, $initQuery3);

$initQuery4 = "ALTER TABLE `".$table_prefix."wfBlocks` ADD the_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP" or die("Alter Error: ".mysql_error());

$result4 = mysqli_query($mysqli, $initQuery4);

echo "finished";

return;

}

//end the alter of tables function
databaseinit();

$mysqli->close();

?>

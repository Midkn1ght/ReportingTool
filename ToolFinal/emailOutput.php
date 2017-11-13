<?php

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();

}

include 'Queries.php';
include 'variables.php';
?>
<div style="width: 100%; text-align: center; margin: 0 auto;">
  <img style="width: 100%;" src="http://www.jlbworks.com/wp-content/uploads/2017/07/wlrtHeader.jpg" />
</div>
<div style="width: 100%; margin: 0 auto; text-align: center;">
    <div style=" margin: 0 auto; width: 35%; padding-top: 40px; text-align: center;">
        <img style="width: 100%;"src="http://www.jlbworks.com/wp-content/uploads/2017/07/JLBLogo.png" />
      </div>
        <div style="font-size: 15px;padding-top: 40px; text-align: center;">
        <h1 style="padding: 0; margin: 0;">
          <?php echo $companyName; ?>
        </h1><br>
      <h1 style="padding: 0; margin: 0;">
        WEB LIFE & SECURITY REPORT
      </h1>
    </div>
</div>
<h1 style="text-align: center;">
  <a style="text-decoration: none; color: black;"href="<?php echo home_url(); ?>/WebLifeReport.php" target="_blank">
    Click here to see your monthly Web Life Report
  </a>
</h1>

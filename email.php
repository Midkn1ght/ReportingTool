<?php

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();

}
?>

<?php

$subject = 'Web Life Report';
$from = 'JLBworks';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

    ob_start(); // Start output buffer capture.
    include("emailOutput.php"); // Include your template.
    $output = ob_get_contents(); // This contains the output of yourtemplate.php
    // Manipulate $output...
    ob_end_clean(); // Clear the buffer.
    echo $output; // Print everything.
    $to = $clientEmail;
    if(mail($to, $subject, $output, $headers)){
        echo 'Your mail has been sent to ' . $clientEmail . ' successfully.';
    } else{
        echo 'Unable to send email. Please try again.';
    }
?>

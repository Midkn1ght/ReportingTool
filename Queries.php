<?php
$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

global $table_prefix;

//Start of queries

 $query3 = "SELECT COUNT(DISTINCT occurrence_id) FROM `".$table_prefix."wsal_metadata`WHERE (value = 'Website Visitor')";//To make queries agnostic across all databases and prefixes we use the wpConfig prefix variable. You can check output by echo.
 $visitorArray = array();

 $result3 = mysqli_query($mysqli, $query3);
 $rowcount3 = mysqli_num_rows($result3);// unneccessary but can be echo'd to check row count.


  while ($row = mysqli_fetch_row($result3)){
  $visitors = $row[0];

 }

 if ($visitors === NULL ) {
  $visitors = 0;
 }

//echo "Visitors: $visitors";
function failedLoginsLifetime(){

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query4 = "SELECT SUM(fail) FROM `".$table_prefix."wfLogins`";
$loginsFailed[] = array();

$result4 = mysqli_query($mysqli, $query4);
$rowcount4 = mysqli_num_rows($result4);

  while ($row = mysqli_fetch_row($result4)){
  $loginsFailed = $row[0];

 }

 if ($loginsFailed === NULL ) {
  $loginsFailed = 0;
 }

 return $loginsFailed;

 $mysqli->close();

}

function lifetimeBlocks() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

 $query5 = "SELECT SUM(blockCount) FROM `".$table_prefix."wfBlockedIPLog`";
 $blockedIP[] = array();

$result5 = mysqli_query($mysqli, $query5);
$rowcount5 = mysqli_num_rows($result5);

  while ($row = mysqli_fetch_row($result5)){
  $blockedIP = $row[0];

 }

 if ($blockedIP === NULL ) {
  $blockedIP = 0;
 }

return $blockedIP;

$mysqli->close();

}

function pluginChangesLifetime() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

 $query6 = "SELECT COUNT(name) FROM `".$table_prefix."wsal_metadata` WHERE (name = 'PluginFile')";
 $pluginChanges[] = array();

 $result6 = mysqli_query($mysqli, $query6);
 $rowcount6 = mysqli_num_rows($result6);

 while ($row = mysqli_fetch_row($result6)) {
  $pluginChanges = $row[0];

 }

 if ($pluginChanges === NULL ) {
  $pluginChanges = 0;
 }

return $pluginChanges;

$mysqli->close();

}

function wordpressChangesLifetime(){

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

 $query7 = "SELECT COUNT(name) FROM `".$table_prefix."wsal_metadata` WHERE (name = 'NewVersion')";
 $wpChanges[] = array();

 $result7 = mysqli_query($mysqli, $query7);
 $rowcount7 = mysqli_num_rows($result7);

 while ($row = mysqli_fetch_row($result7)) {
  $wpChanges = $row[0];

 }

 if ($wpChanges === NULL ) {
  $wpChanges = 0;
 }

return $wpChanges;

$mysqli->close();

}

function siteChangesLifetime() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

 $query8 = "SELECT COUNT(DISTINCT occurrence_id) FROM `".$table_prefix."wsal_metadata`";
 $totalChanges[] = array();

 $result8 = mysqli_query($mysqli, $query8);
 $rowcount8 = mysqli_num_rows($result8);

 while ($row = mysqli_fetch_row($result8)) {
  $totalChanges = $row[0];

 }

 if ($totalChanges === NULL ) {
  $totalChanges = 0;
 }

return $totalChanges;

$mysqli->close();

}

function countriesBlockedLifetime() {
/* need database info in each funtion to make connection*/
global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$i=1;

 $query9 = "SELECT  countryCode, SUM(blockCount) AS blocked FROM `".$table_prefix."wfBlockedIPLog` GROUP BY countryCode ORDER BY blocked  DESC LIMIT 5";
 $countriesBlocked = array();

 $result9 = mysqli_query($mysqli, $query9);
 $rowcount9 = mysqli_num_rows($result9);

 echo '<table class="countries"> <tr><td style="padding: 5px;"><h1><strong>MALICIOUS COUNTRIES BLOCKED</h1></strong></td> <td style="padding: 5px; text-align: right;"><h1 style="font-weight: 100;"> # of blocked attempts</h1></td></tr>';


  while ($row = mysqli_fetch_row($result9)) {
   $countriesBlocked = $row[0];
   if($i == 1 || $i == 3 || $i==5){
       echo '<tr class="countryRow1">';
     }
     else {
       echo '<tr class="countryRow2">';
    }

     $countrycodes = array (
        'AF' => 'Afghanistan',
        'AX' => 'Åland Islands',
        'AL' => 'Albania',
        'DZ' => 'Algeria',
        'AS' => 'American Samoa',
        'AD' => 'Andorra',
        'AO' => 'Angola',
        'AI' => 'Anguilla',
        'AQ' => 'Antarctica',
        'AG' => 'Antigua and Barbuda',
        'AR' => 'Argentina',
        'AU' => 'Australia',
        'AT' => 'Austria',
        'AZ' => 'Azerbaijan',
        'BS' => 'Bahamas',
        'BH' => 'Bahrain',
        'BD' => 'Bangladesh',
        'BB' => 'Barbados',
        'BY' => 'Belarus',
        'BE' => 'Belgium',
        'BZ' => 'Belize',
        'BJ' => 'Benin',
        'BM' => 'Bermuda',
        'BT' => 'Bhutan',
        'BO' => 'Bolivia',
        'BA' => 'Bosnia and Herzegovina',
        'BW' => 'Botswana',
        'BV' => 'Bouvet Island',
        'BR' => 'Brazil',
        'IO' => 'British Indian Ocean Territory',
        'BN' => 'Brunei Darussalam',
        'BG' => 'Bulgaria',
        'BF' => 'Burkina Faso',
        'BI' => 'Burundi',
        'KH' => 'Cambodia',
        'CM' => 'Cameroon',
        'CA' => 'Canada',
        'CV' => 'Cape Verde',
        'KY' => 'Cayman Islands',
        'CF' => 'Central African Republic',
        'TD' => 'Chad',
        'CL' => 'Chile',
        'CN' => 'China',
        'CX' => 'Christmas Island',
        'CC' => 'Cocos (Keeling) Islands',
        'CO' => 'Colombia',
        'KM' => 'Comoros',
        'CG' => 'Congo',
        'CD' => 'Zaire',
        'CK' => 'Cook Islands',
        'CR' => 'Costa Rica',
        'CI' => 'Côte D\'Ivoire',
        'HR' => 'Croatia',
        'CU' => 'Cuba',
        'CY' => 'Cyprus',
        'CZ' => 'Czech Republic',
        'DK' => 'Denmark',
        'DJ' => 'Djibouti',
        'DM' => 'Dominica',
        'DO' => 'Dominican Republic',
        'EC' => 'Ecuador',
        'EG' => 'Egypt',
        'SV' => 'El Salvador',
        'GQ' => 'Equatorial Guinea',
        'ER' => 'Eritrea',
        'EE' => 'Estonia',
        'ET' => 'Ethiopia',
        'FK' => 'Falkland Islands (Malvinas)',
        'FO' => 'Faroe Islands',
        'FJ' => 'Fiji',
        'FI' => 'Finland',
        'FR' => 'France',
        'GF' => 'French Guiana',
        'PF' => 'French Polynesia',
        'TF' => 'French Southern Territories',
        'GA' => 'Gabon',
        'GM' => 'Gambia',
        'GE' => 'Georgia',
        'DE' => 'Germany',
        'GH' => 'Ghana',
        'GI' => 'Gibraltar',
        'GR' => 'Greece',
        'GL' => 'Greenland',
        'GD' => 'Grenada',
        'GP' => 'Guadeloupe',
        'GU' => 'Guam',
        'GT' => 'Guatemala',
        'GG' => 'Guernsey',
        'GN' => 'Guinea',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HT' => 'Haiti',
        'HM' => 'Heard Island and Mcdonald Islands',
        'VA' => 'Vatican City State',
        'HN' => 'Honduras',
        'HK' => 'Hong Kong',
        'HU' => 'Hungary',
        'IS' => 'Iceland',
        'IN' => 'India',
        'ID' => 'Indonesia',
        'IR' => 'Iran, Islamic Republic of',
        'IQ' => 'Iraq',
        'IE' => 'Ireland',
        'IM' => 'Isle of Man',
        'IL' => 'Israel',
        'IT' => 'Italy',
        'JM' => 'Jamaica',
        'JP' => 'Japan',
        'JE' => 'Jersey',
        'JO' => 'Jordan',
        'KZ' => 'Kazakhstan',
        'KE' => 'KENYA',
        'KI' => 'Kiribati',
        'KP' => 'Korea, Democratic People\'s Republic of',
        'KR' => 'Korea, Republic of',
        'KW' => 'Kuwait',
        'KG' => 'Kyrgyzstan',
        'LA' => 'Lao People\'s Democratic Republic',
        'LV' => 'Latvia',
        'LB' => 'Lebanon',
        'LS' => 'Lesotho',
        'LR' => 'Liberia',
        'LY' => 'Libyan Arab Jamahiriya',
        'LI' => 'Liechtenstein',
        'LT' => 'Lithuania',
        'LU' => 'Luxembourg',
        'MO' => 'Macao',
        'MK' => 'Macedonia, the Former Yugoslav Republic of',
        'MG' => 'Madagascar',
        'MW' => 'Malawi',
        'MY' => 'Malaysia',
        'MV' => 'Maldives',
        'ML' => 'Mali',
        'MT' => 'Malta',
        'MH' => 'Marshall Islands',
        'MQ' => 'Martinique',
        'MR' => 'Mauritania',
        'MU' => 'Mauritius',
        'YT' => 'Mayotte',
        'MX' => 'Mexico',
        'FM' => 'Micronesia, Federated States of',
        'MD' => 'Moldova, Republic of',
        'MC' => 'Monaco',
        'MN' => 'Mongolia',
        'ME' => 'Montenegro',
        'MS' => 'Montserrat',
        'MA' => 'Morocco',
        'MZ' => 'Mozambique',
        'MM' => 'Myanmar',
        'NA' => 'Namibia',
        'NR' => 'Nauru',
        'NP' => 'Nepal',
        'NL' => 'Netherlands',
        'AN' => 'Netherlands Antilles',
        'NC' => 'New Caledonia',
        'NZ' => 'New Zealand',
        'NI' => 'Nicaragua',
        'NE' => 'Niger',
        'NG' => 'Nigeria',
        'NU' => 'Niue',
        'NF' => 'Norfolk Island',
        'MP' => 'Northern Mariana Islands',
        'NO' => 'Norway',
        'OM' => 'Oman',
        'PK' => 'Pakistan',
        'PW' => 'Palau',
        'PS' => 'Palestinian Territory, Occupied',
        'PA' => 'Panama',
        'PG' => 'Papua New Guinea',
        'PY' => 'Paraguay',
        'PE' => 'Peru',
        'PH' => 'Philippines',
        'PN' => 'Pitcairn',
        'PL' => 'Poland',
        'PT' => 'Portugal',
        'PR' => 'Puerto Rico',
        'QA' => 'Qatar',
        'RE' => 'Réunion',
        'RO' => 'Romania',
        'RU' => 'Russian Federation',
        'RW' => 'Rwanda',
        'SH' => 'Saint Helena',
        'KN' => 'Saint Kitts and Nevis',
        'LC' => 'Saint Lucia',
        'PM' => 'Saint Pierre and Miquelon',
        'VC' => 'Saint Vincent and the Grenadines',
        'WS' => 'Samoa',
        'SM' => 'San Marino',
        'ST' => 'Sao Tome and Principe',
        'SA' => 'Saudi Arabia',
        'SN' => 'Senegal',
        'RS' => 'Serbia',
        'SC' => 'Seychelles',
        'SL' => 'Sierra Leone',
        'SG' => 'Singapore',
        'SK' => 'Slovakia',
        'SI' => 'Slovenia',
        'SB' => 'Solomon Islands',
        'SO' => 'Somalia',
        'ZA' => 'South Africa',
        'GS' => 'South Georgia and the South Sandwich Islands',
        'ES' => 'Spain',
        'LK' => 'Sri Lanka',
        'SD' => 'Sudan',
        'SR' => 'Suriname',
        'SJ' => 'Svalbard and Jan Mayen',
        'SZ' => 'Swaziland',
        'SE' => 'Sweden',
        'CH' => 'Switzerland',
        'SY' => 'Syrian Arab Republic',
        'TW' => 'Taiwan, Province of China',
        'TJ' => 'Tajikistan',
        'TZ' => 'Tanzania, United Republic of',
        'TH' => 'Thailand',
        'TL' => 'Timor-Leste',
        'TG' => 'Togo',
        'TK' => 'Tokelau',
        'TO' => 'Tonga',
        'TT' => 'Trinidad and Tobago',
        'TN' => 'Tunisia',
        'TR' => 'Turkey',
        'TM' => 'Turkmenistan',
        'TC' => 'Turks and Caicos Islands',
        'TV' => 'Tuvalu',
        'UG' => 'Uganda',
        'UA' => 'Ukraine',
        'AE' => 'United Arab Emirates',
        'GB' => 'United Kingdom',
        'US' => 'United States',
        'UM' => 'United States Minor Outlying Islands',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VU' => 'Vanuatu',
        'VE' => 'Venezuela',
        'VN' => 'Viet Nam',
        'VG' => 'Virgin Islands, British',
        'VI' => 'Virgin Islands, U.S.',
        'WF' => 'Wallis and Futuna',
        'EH' => 'Western Sahara',
        'YE' => 'Yemen',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
);

    echo '<td class="countryName">' . $countrycodes["$row[0]"] . '</td>';

     echo '<td class="countryData">' . $row[1] . '</td>';
     echo '</tr>';
      $i++;
  }
 echo '</table>';
if ($countriesBlocked === NULL ) {
  $countriesBlocked = 'N/A';
 }

 //return $countriesBlocked;

 $mysqli->close();

}


function safeLoginsMonth() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query10 = "SELECT COUNT(username) FROM `".$table_prefix."wfLogins`WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND (action = 'loginOk')";
$safeLoginsMonthly[] = array();

$result10 = mysqli_query($mysqli, $query10);
$rowcount10 = mysqli_num_rows($result10);

while ($row = mysqli_fetch_row($result10)) {
  $safeLoginsMonthly = $row[0];

}

if ($safeLoginsMonthly === NULL ) {
  $safeLoginsMonthly = 0;
 }

return $safeLoginsMonthly;

$mysqli->close();

}

function wordpressChangesMonth() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query11 = "SELECT COUNT(name) FROM `".$table_prefix."wsal_metadata` WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND (name = 'NewVersion')";
 $wpChangesMonth[] = array();

 $result11 = mysqli_query($mysqli, $query11);
 $rowcount11 = mysqli_num_rows($result11);

 while ($row = mysqli_fetch_row($result11)) {
  $wpChangesMonth = $row[0];

 }

 if ($wpChangesMonth === NULL ) {
  $wpChangesMonth = 0;
 }

return $wpChangesMonth;

$mysqli->close();

}

function pluginChangesMonth() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query12 = "SELECT COUNT(name) FROM `".$table_prefix."wsal_metadata` WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW() AND (name = 'PluginFile')";
 $pluginChangesMonth[] = array();

 $result12 = mysqli_query($mysqli, $query12);
 $rowcount12 = mysqli_num_rows($result12);

 while ($row = mysqli_fetch_row($result12)) {
  $pluginChangesMonth = $row[0];

 }

 if ($pluginChangesMonth === NULL ) {
  $pluginChangesMonth = 0;
 }

return $pluginChangesMonth;

$mysqli->close();

}

function failedLoginsMonth() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query13 = "SELECT SUM(fail) FROM `".$table_prefix."wfLogins` WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
$loginsFailedMonth[] = array();

$result13 = mysqli_query($mysqli, $query13);
$rowcount13 = mysqli_num_rows($result13);

  while ($row = mysqli_fetch_row($result13)){
  $loginsFailedMonth = $row[0];

 }

 if ($loginsFailedMonth === NULL ) {
  $loginsFailedMonth = 0;
 }

return $loginsFailedMonth;

$mysqli->close();

}


function siteChangesMonth() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

 $query14 = "SELECT COUNT(DISTINCT occurrence_id) FROM `".$table_prefix."wsal_metadata` WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
 $totalChangesMonth[] = array();

 $result14 = mysqli_query($mysqli, $query14);
 $rowcount14 = mysqli_num_rows($result14);

 while ($row = mysqli_fetch_row($result14)) {
  $totalChangesMonth = $row[0];
 }

 if ($totalChangesMonth === NULL ) {
  $totalChangesMonth = 0;
 }

return $totalChangesMonth;

$mysqli->close();

}

function monthBlocks() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query15 = "SELECT SUM(blockCount) FROM `".$table_prefix."wfBlockedIPLog` WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
$blockedIPMonth[] = array();

$result15 = mysqli_query($mysqli, $query15);
$rowcount15 = mysqli_num_rows($result15);

  while ($row = mysqli_fetch_row($result15)){
  $blockedIPMonth = $row[0];

 }

 if ($blockedIPMonth === NULL ) {
  $blockedIPMonth = 0;
 }

return $blockedIPMonth;

$mysqli->close();

}

function safeLoginsLifetime () {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query16 = "SELECT COUNT(username) FROM `".$table_prefix."wfLogins`WHERE (action = 'loginOk')";
$safeLogins[] = array();

$result16 = mysqli_query($mysqli, $query16);
$rowcount16 = mysqli_num_rows($result16);

while ($row = mysqli_fetch_row($result16)) {
  $safeLogins = $row[0];

}

if ($safeLogins === NULL ) {
  $safeLogins = 0;
 }

return $safeLogins;

$mysqli->close();

}

function cyberAttacksMonth() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query17 = "SELECT SUM(blockedHits) FROM `".$table_prefix."wfBlocks` WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()";
 $cyberAttacksMonth[] = array();

 $result17 = mysqli_query($mysqli, $query17);
 $rowcount17 = mysqli_num_rows($result17);

 while ($row = mysqli_fetch_row($result17)) {
  $cyberAttacksMonth = $row[0];

 }

 if ($cyberAttacksMonth === NULL ) {
  $cyberAttacksMonth = 0;
 }

return $cyberAttacksMonth;

$mysqli->close();

}

function cyberAttacksLifetime() {

global $table_prefix;

$wpconfig = dirname( __FILE__ ) . '/wp-config.php';
require_once($wpconfig);

$mysqli = new mysqli(DB_HOST, DB_NAME, DB_PASSWORD, DB_NAME);
/* check connection */
if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$query18 = "SELECT SUM(blockedHits) FROM `".$table_prefix."wfBlocks`";
 $cyberAttacksLifetime[] = array();

 $result18 = mysqli_query($mysqli, $query18);
 $rowcount18 = mysqli_num_rows($result18);

 while ($row = mysqli_fetch_row($result18)) {
  $cyberAttacksLifetime = $row[0];

 }

 if ($cyberAttacksLifetime === NULL ) {
  $cyberAttacksLifetime = 0;
 }

return $cyberAttacksLifetime;

$mysqli->close();

}

$mysqli->close();

 ?>

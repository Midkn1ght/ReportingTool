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

<style>
  @import url('https://fonts.googleapis.com/css?family=Open+Sans');
  body {font-family: 'Open Sans', sans-serif;}
  p { font-size: 1.3rem;}
  .header { text-align: center;}
  .header img{ width: 98vw; }
  .Company { display: flex;
             justify-content: space-around;
             align-items: center;
             width: 100%;
             max-width: 80rem;
             margin: 0 auto;
             padding: 2rem 0 0 0;
              }
  .Company img { height: 10rem; }
  .companyInfo h1{font-size: 4rem;
                  padding: 0;
                  margin: 0;}
  .subheader {text-align: center;
              font-size: 2.5rem;
              padding: 4rem 2rem 0 2rem;
              margin: 0;
              font-weight: 300;}

  .activities, .maintenance, .operations, .FAQ {max-width: 77rem; margin: 6rem auto 0  auto; padding: 0 5rem;}
  .checkmark {text-align: right;
              color: orange;
              padding: 0 5px 0 0;}

  .countries {margin: 6rem auto 0 auto;
              border-collapse: collapse;
              border-spacing: 0;
              width: 100%;}
  .sectionHeader {text-align: left; padding: 0 0 1rem 0;}
  .countryRow1, .tableRow {background-color: rgba(204, 204, 204, .5);}
  .countryName {text-align: left; font-size: 2rem; padding: 1rem 0 1rem 10%; width: 50%;}
  .countryData {font-size: 2rem; padding: 1rem 3% 0 0; width: 50%; text-align: right}
  .cyberTest { padding-bottom: 1%;}
  .footer {text-align: center; margin-top: 2rem;}
  .footer img { width: 90vw;}
  .tableName { text-align: left; font-size: 1.5rem;}
  .tableData { font-size: 1.8rem; text-align: right; padding: 0 3%;}
  .sideText { color: orange;}
  .imgData, .imgData2 { width: 10%;}
  .imgData img {width: 60%; padding: 20px 15px;}
  .imgData2 img {width: 60%; padding: 5px 15px;}
  table { margin: 0 auto; border-spacing: 0; width: 100%;}
  @media only screen and (max-width: 1024px) {
      .Company {flex-direction: column; text-align: center;}
      .companyInfo {padding-top: 1rem;}
  }
  @media only screen and (max-width: 500px) {
      .imgData, .imgData2 { width: 20% !important;}
  }
</style>
<div class="header">
  <img src="http://www.jlbworks.com/wp-content/uploads/2017/09/web-life-reporting-02.jpg" />
</div>
<div class="Company">
        <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/JLBLogo.png" />
        <div class="companyInfo">
        <h1>
          <?php echo $companyName; ?>
        </h1><br>
      <h1>
        WEB LIFE & SECURITY REPORT
      </h1>
    </div>
</div>
<h1 class="subheader">
  Full report of the critical activities that occurred on your website this month
</h1>
<div class="activities" >
  <h1 class="sectionHeader"><strong>CRITICAL CYBER SECURITY ACTIVITES</strong></h1>
    <table>
      <tr class="tableRow">
        <td class="imgData">
          <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/shield.png" />
        </td>
        <td class="tableName">
          CYBER ATTACKS BLOCKED
          <span class="sideText">
            this month
          </span>
        </td>
        <td class="tableData">
          <?php echo cyberAttacksMonth(); ?>
        </td>
        </tr>
        <tr>
          <td class="imgData">
            <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/wall.png" />
          </td>
          <td class="tableName">
              #  OF MALICIOUS IPS BLOCKED
            <span class="sideText">
              this month
            </span>
          </td>
          <td class="tableData">
            <?php echo monthBlocks(); ?>
          </td>
        </tr>
        <tr class="tableRow">
          <td class="imgData">
            <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/file.png" />
          </td>
          <td class="tableName">
            FAILED LOGIN ATTEMPTS
            <span class="sideText">
              this month
            </span>
          </td>
          <td class="tableData">
            <?php echo failedLoginsMonth(); ?>
          </td>
        </tr>
        <tr>
          <td class="imgData2">
            <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/mag.png" />
          </td>
          <td class="tableName">
            # OF CYBER SCANS
            <span class="sideText">
              this month
            </span>
          </td>
          <td class="tableData">
            <?php echo date("j"); ?>
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td class="cyberTest">
            <span class="checkmark">&#x2714;</span> MALWARE SCAN
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td class="cyberTest">
            <span class="checkmark">&#x2714;</span> NETWORK SCAN
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td class="cyberTest">
            <span class="checkmark">&#x2714;</span> APPLICATION SCAN
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td class="cyberTest">
            <span class="checkmark">&#x2714;</span> SQL INJECTION SCAN
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td class="cyberTest">
            <span class="checkmark">&#x2714;</span> CROSS-SITE SCRIPTING SCAN
          </td>
        </tr>
        <tr>
          <td>

          </td>
          <td class="cyberTest">
            <span class="checkmark">&#x2714;</span> AUTOMATIC MALWARE REMOVAL
          </td>
        </tr>
        <tr class="tableRow">
          <td class="imgData">
              <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/file2.png" />
            </td>
            <td class="tableName">
              # FAILED LOGIN ATTEMPTS
              <span class="sideText">
                lifetime
              </span>
            </td>
            <td class="tableData">
              <?php echo failedLoginsLifetime(); ?>
            </td>
          </tr>
          <tr>
            <td class="imgData">
              <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/wall2.png" />
            </td>
            <td class="tableName">
              # OF MALICIOUS IPS BLOCKED
              <span class="sideText">
                lifetime
              </span>
            </td>
            <td class="tableData">
              <?php echo lifetimeBlocks(); ?>
            </td>
          </tr>
        </table>
        <?php echo countriesBlockedLifetime(); ?>
</div>
<div class="maintenance" >
 <h1 class="sectionHeader"><strong> WEBSITE MAINTENANCE WORK COMPLETED</strong></h1>
   <table>
     <tr  class="tableRow">
       <td class="imgData">
         <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/browser.png" />
       </td>
       <td class="tableName">
         WEB, PHP, SQL & CORE UPDATES & CHANGES
         <span class="sideText">
           this month
         </span>
       </td>
       <td class="tableData">
         <?php echo siteChangesMonth(); ?>
       </td>
     </tr>
     <tr>
       <td class="imgData">
         <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/disk.png" />
       </td>
       <td class="tableName">
         CORE SOFTWARE UPDATES & CHANGES
         <span class="sideText">
           this month
         </span>
       </td>
       <td class="tableData">
         <?php echo pluginChangesMonth(); ?>
       </td>
     </tr>
     <tr class="tableRow">
       <td class="imgData">
         <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/browser_pen.png" />
       </td>
       <td class="tableName">
         CONTENT SYSTEM UPDATES & CHANGES
         <span class="sideText">
           this month
         </span>
       </td>
       <td class="tableData">
         <?php echo wordpressChangesMonth(); ?>
       </td>
     </tr>
   </table>
   <hr style="width: 100%;">
   <table>
     <tr  class="tableRow">
       <td class="imgData">
         <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/browser2.png" />
       </td>
       <td class="tableName">
         WEB, PHP, SQL & CORE UPDATES & CHANGES
         <span class="sideText">
           lifetime
         </span>
       </td>
       <td class="tableData">
         <?php echo siteChangesLifetime(); ?>
       </td>
     </tr>
     <tr>
       <td class="imgData">
         <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/disk2.png" />
       </td>
       <td class="tableName">
         CORE SOFTWARE UPDATES & CHANGES
         <span class="sideText">
           lifetime
         </span>
       </td>
       <td class="tableData">
         <?php echo pluginChangesLifetime(); ?>
       </td>
     </tr>
     <tr  class="tableRow">
       <td class="imgData">
         <img src="http://www.jlbworks.com/wp-content/uploads/2017/07/browser_pen2.png" />
       </td>
       <td class="tableName">
         CONTENT SYSTEM UPDATES & CHANGES
         <span class="sideText">
           lifetime
         </span>
       </td>
       <td class="tableData">
         <?php echo wordpressChangesLifetime(); ?>
       </td>
     </tr>
   </table>
</div>
<div class="operations" >
  <h1 class="sectionHeader">
    <strong>
      WEB OPERATIONS WORK COMPLETE & TRACKING DATA
    </strong>
  </h1>
  <table>
    <tr class="tableRow">
      <td class="imgData">
        <img style="width: 55%; padding: 20px 15px;" src="http://www.jlbworks.com/wp-content/uploads/2017/07/HDD.png" />
      </td>
      <td class="tableName">
        # OF BACKUPS TAKEN OF WEBSITE
        <span class="sideText">
          this month
        </span>
      </td>
      <td class="tableData">
        <?php echo date("j") * 2; ?>
      </td>
    </tr>
    <tr>
      <td class="imgData">
        <img style="width: 55%; padding: 20px 15px;" src="http://www.jlbworks.com/wp-content/uploads/2017/07/browser_file.png" />
      </td>
      <td class="tableName">
        # OF WEBSITE BACKUPS ARCHIVED
        <span class="sideText">
          this month
        </span>
      </td>
      <td class="tableData">
        <?php echo date("j"); ?>
      </td>
    </tr>
      <tr class="tableRow">
        <td class="imgData">
          <img style="width: 55%; padding: 20px 15px;" src="http://www.jlbworks.com/wp-content/uploads/2017/07/rando.png" />
        </td>
        <td class="tableName">
          TOTAL USED SPACE FOR WEBSITE
        </td>
          <td class="tableData">
            <?php echo formatBytes($usedSpace); ?>
          </td>
        </tr>

      </table>
</div>

<div class="FAQ">
<h1><strong>FAQ</strong></h1>

<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
<p>Maecenas tellus urna, sodales at eleifend ac, sollicitudin quis felis. Curabitur condimentum eget lacus nec blandit. Nam in urna ac ipsum suscipit dignissim. Donec blandit, velit ac sodales fermentum, elit lacus vulputate libero, eu pulvinar nulla lacus at lorem. Nulla id quam non est tincidunt egestas eu non ligula. Mauris venenatis, augue consectetur feugiat sollicitudin, lectus tellus dignissim turpis, nec blandit odio dui vitae lorem. Suspendisse vitae consectetur quam. Praesent erat metus, aliquam lacinia faucibus in, pulvinar sit amet lorem. Sed nec augue convallis, semper eros quis, sodales ligula. Fusce lobortis risus et quam euismod, id dictum nisi ullamcorper. Cras iaculis lorem mi, ut malesuada diam semper id. Quisque nec massa at dolor molestie luctus in non velit. Integer fringilla at ipsum ac sollicitudin. Aliquam quis placerat odio, in tempus orci. Nam laoreet turpis non nisi dapibus, eu lobortis magna tempus.</p>

<h1>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h1>
<p>Maecenas tellus urna, sodales at eleifend ac, sollicitudin quis felis. Curabitur condimentum eget lacus nec blandit. Nam in urna ac ipsum suscipit dignissim. Donec blandit, velit ac sodales fermentum, elit lacus vulputate libero, eu pulvinar nulla lacus at lorem. Nulla id quam non est tincidunt egestas eu non ligula. Mauris venenatis, augue consectetur feugiat sollicitudin, lectus tellus dignissim turpis, nec blandit odio dui vitae lorem. Suspendisse vitae consectetur quam. Praesent erat metus, aliquam lacinia faucibus in, pulvinar sit amet lorem. Sed nec augue convallis, semper eros quis, sodales ligula. Fusce lobortis risus et quam euismod, id dictum nisi ullamcorper. Cras iaculis lorem mi, ut malesuada diam semper id. Quisque nec massa at dolor molestie luctus in non velit. Integer fringilla at ipsum ac sollicitudin. Aliquam quis placerat odio, in tempus orci. Nam laoreet turpis non nisi dapibus, eu lobortis magna tempus.</p>

<h1>THIS IS THE EDIT THAT WAS MADE</h1>
<p>Maecenas tellus urna, sodales at eleifend ac, sollicitudin quis felis. Curabitur condimentum eget lacus nec blandit. Nam in urna ac ipsum suscipit dignissim. Donec blandit, velit ac sodales fermentum, elit lacus vulputate libero, eu pulvinar nulla lacus at lorem. Nulla id quam non est tincidunt egestas eu non ligula. Mauris venenatis, augue consectetur feugiat sollicitudin, lectus tellus dignissim turpis, nec blandit odio dui vitae lorem. Suspendisse vitae consectetur quam. Praesent erat metus, aliquam lacinia faucibus in, pulvinar sit amet lorem. Sed nec augue convallis, semper eros quis, sodales ligula. Fusce lobortis risus et quam euismod, id dictum nisi ullamcorper. Cras iaculis lorem mi, ut malesuada diam semper id. Quisque nec massa at dolor molestie luctus in non velit. Integer fringilla at ipsum ac sollicitudin. Aliquam quis placerat odio, in tempus orci. Nam laoreet turpis non nisi dapibus, eu lobortis magna tempus.</p>
</div>
<div class="footer">
<img src="http://www.jlbworks.com/wp-content/uploads/2017/07/footer-20.png" />
</div>

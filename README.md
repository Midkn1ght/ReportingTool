#Reporting-Tool

Working examples: http://jlbworks.com/WebLifeReport.php and <a href="http://franklinis.com/WebLifeReport.php">here</a>

Here are the deployment instructions for the Web Report. This is a working list so if you notice anything that isn't in here and needs to be added please do so. Godspeed.

The WLRT needs a few things to be fully operational. Firstly, whatever site you're uploading it to you'll need to install two plugins: https://wordpress.org/plugins/wordfence/ and https://wordpress.org/plugins/wp-security-audit-log/

After activating both of these plugins you'll need to run the WLRTInit file to add the TIMESTAMP field to the database. If you don't do this the WLRT will not be able to show the monthly stats. To check when you pull up the page it should hold the same numbers as the all-time stats because the TIMESTAMP field has been added. You can also just check the database.

You need to place the web-life-options.php within the theme folder. So the path should be public_html -> wp-content -> themes -> (active theme. Then place this script within the Functions.php at the bottom: // Web Life Reporting Tool
include('web-life-options.php');. This creates the options screen on the backend to fill in vital information.

After that log into the site and fill in the company name and the email that we're sending to. You can do a comma delimited list to separate who we're sending to and I'd put an admin account on there as well as your own to make sure it's working. You can also create an email filter so it doesn't muck up your email flow. For the pathway, you'll need to copy the public_html path. It should go something like home/(account name)/public_html.

Next you'll need to set up an FTP account for us to easily make changes. From the home portion of the account you should see FTP Accounts. Once you're in there just create a login called reportingtool-(sitename), and the password should follow the setup for the site. The path should be to the public_html file. So all you should need to place in the path area is public_html. After that create it and reload to make sure it's still there. 

After that's create you'll need to go to https://deploybot.com/ and log in. Go to the Reporting-Tool Repository and add an environment. The name of the environment should be (sitename)-Reporting-Tool. For the connection you'll need to choose FTP and enter the credentials to the FTP account you created earlier. When you get to path you'll just need to place a / and it should work properly. 

Lastly, you'll need to set up a  CRON for email to send out once a month on the 30th of every month. Here's the setup using cPanel: 0 12 30 * * php -q /home/{account name}/public_html/email.php. CRON is separated into Minute, Hour, Day, Month, Weekday and asterisks mean every(whatever). So this is set up to send at the beginning of every hour (0), at the 12th hour (12/noon), on the 30th day of the month (30), every month (*) and every day (*). You can also and probably should set up a test one set to ***** php -q /home/{account name}/public_html/email.php to make sure it's displaying correctly. If you're sending out a test though make sure you switch the email in the web-life-options. If you don't the client will receive it. Do not send it to the client early.

For clarity, this is how the 30-day queries work. "...WHERE the_date BETWEEN NOW() - INTERVAL 30 DAY AND NOW()..." What this is doing is looking at the TIMESTAMP you created earlier and checking if it is between now and 30 days ago. So if it falls within that period it will be displayed for the current month. We need this to cycle out so it will display accurate monthly information. I'm explaining this because if you look at the tool right after it's been placed and ran the init script you'll notice the monthly and lifetime numbers are the same. They should be for one month.

As far as I know, this should be it for setup. If you encounter something you don't know or need more clarification just ask.

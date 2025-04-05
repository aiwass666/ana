# Ana
Ana is a lightweight not so fancy analytics tool that will create 1 file per day.
Each daily file contains the following information about your visitors:
1. Timestamp
2. URL visited
3. Title of the page visited
4. User-agent (i.e. the browser or bot used)

Another nice thing is that each line in the file is comma separated which means you could technically import it into Excel, if you really wanted to
or even a database, if you really wanted to fill that up.

# Installation
1. Download ana.js and nia.php
2. Open each file to change names, locations etc. as you wish. No limits!
3. Place both files in your root directory of your website
4. Call the ana.js in your HTML with a regular script tag for Javascript (your should know how to do that if you've gotten this far)
5. Check the logs created in you folder structure

# Example log file (taken from a real life implentation of the script, but urls have been changed)
*2025-03-13T09:00:00.012Z, https://domain-name.com/tag/lamborghini, Lamborghini - Fictional Car Magazine, Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; Googlebot/2.1; +http://www.google.com/bot.html) Chrome/133.0.6943.141 Safari/537.36*

*2025-03-13T09:01:28.502Z, https://domain-name.com/adidas-originals-by-hyke, Adidas Originals by HYKE - Fictional Fashion Magazine, Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:136.0) Gecko/20100101 Firefox/136.0*

<?php
  if(isset($_POST['start'])) { 
            shell_exec('aws cloudformation create-stack --stack-name RDS --template-body file://C:\xampp\htdocs\AWS\Template1(VPC-EC2-DB).yaml --parameters ParameterKey=KeyName,ParameterValue=demo');
        } 
        if(isset($_POST['end'])) { 
            shell_exec('aws cloudformation delete-stack --stack-name RDS');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Introduction to RDS</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/instructions.css">
</head>
<body>
<div class="row">
  <div class="column side">
  </div>
  <div class="column middle">
    <div class="header">
  <h1>Introduction to Amazon Relational Database Service (Linux)</h1>
 </div>
  </div>
</div>
<div class="row">
  <div class="column side">
  <form method="post">
  <div class="card">
  <div class="container">
     <input type="submit" name="start" class="button buttonStart" value="Start Lab">
     <input type="submit" name="end" class="button buttonEnd" value="End Lab">
     <a href="https://664936806613.signin.aws.amazon.com/console
" class="button buttonLink" target="_blank">AWS Console</a>
    <div class="inputBox">
      <label class="textHeading">Username</label><input type="text" name="" id="uname" readonly="" value="lab-user">
      <img src="image/copy.jpg" height=20px width=20px  class="copy" onclick="copyUsername();">
    </div>
    <div class="inputBox">
      <label class="textHeading">Password</label><input type="text" name="" id="password" readonly="" value="student">
      <img src="image/copy.jpg" height=20px width=20px  class="copy" onclick="copyPassword();">
    </div>
  </div>
</div>
</form>
  </div>
  <div class="column middle">
 
    <h2>Topics Covered</h2>
    <p>By the end of the lab you will be able to:</p>
      <ul>
        <li>Create an Amazon RDS instance.</li>
        <li>Connect to RDS Instance with client software.</li>
      </ul>
    <h2>Start Lab</h2>
      <ol>
      <li>Launch your lab by clicking <span style="background-color:#4CAF50;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">Start Lab</span> on left side of your screen.This will start provisioning oy your lab resources and an estimated time of 15-20 minutes will be taken for complete provisioning of your resources. You must wait for resources to be provisioned before continuing.</li>
      <li>Open your lab by clicking on <span style="background-color:#008CBA;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">AWS Console</span> on left side of your screen.This will you take you to the IAM user login page.</li>
      <li>Copy the <b>Username</b> and <b>Password</b> provided on left side of your screen to login to AWS Management Console.You should now be able to access the AWS Management Console.</li></ol>
      <h2>Task 1: Create RDS Instance</h2>
<p>In this task, you will create an Amazon RDS database for MySQL.</p>
<ol start="4">
  <li>In the <strong>AWS Management Console</strong>, on the <span style="background-color:#232f3e;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;">Services</span> menu, click <strong>RDS</strong>.</li>
  <li>In the left navigation pane, click <strong>Databases</strong>.</li>
  If <strong>Databases</strong> is not visible, click the <strong>Navigation</strong> icon in the left and then click <strong>Databases</strong>.
<li>Click <span style="background-color:#ec7211;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Create database</span> then configure:</li>
<ul>
<li>
<strong>Engine type:</strong> <em>MySQL</em>
</li>
<li>
<strong>Templates:</strong> <em>Dev/Test</em>
</li>
</ul>
<li>In the <strong>Settings</strong> section, configure:</li>
<ul>
<li>
<strong>DB instance identifier:</strong> <input readonly="" class="inputBox1" size="6" type="text" value="my-rds">
</li>
<li>
<strong>Master username:</strong> <input readonly="" class="inputBox" size="7" type="text" value="student">
</li>
<li>
<strong>Master password:</strong> <input readonly="" class="inputBox" size="8" type="text" value="Pass.123">
</li>
<li>
<strong>Confirm password:</strong> <input readonly="" class="inputBox" size="8" type="text" value="Pass.123">
</li>
</ul>
<li>In the <strong>DB instance size</strong> section, configure:</li>
<ul>
<li>
<em>Burstable classes</em>
</li>
<li><em>db.t2.micro</em></li>
</ul>
<li>In the <strong>Availability &amp; durability</strong> section for <em>Multi-AZ deployment</em>, select <strong>Do not create a standby instance</strong>.</li>
<li>In the <strong>Connectivity</strong> section, configure:</li>
<ul>
<li>
<strong>Virtual Private Cloud (VPC):</strong> <em>Lab VPC</em>
</li>
<li>Expand <strong>Additional connectivity configuration</strong>
</li>
<li>
<strong>Publicly accessible:</strong> <em>No</em>
</li>
<li>
<strong>Existing VPC security groups:</strong>
<ul>
<li>Select <strong>DBSecurityGroup</strong>
</li>
<li>Remove <strong>default</strong>
</li>
</ul>
</li>
</ul>
<li>Expand<strong>Additional configuration</strong>, then configure:</li>
<ul>
<li>
<strong>Initial database name</strong> <input readonly="" class="inputBox1" size="3" type="text" value="lab">
</li>
<li>De-select</i> <strong>Enable automatic backups</strong>
</li>
<li>De-select</i> <strong>Enable Enhanced monitoring</strong>
</li>
<li>De-select</i> <strong>Enable auto minor version upgrade</strong>
</li>
</ul>
<li>Scroll to the bottom of the screen, then click <span style="background-color:#ec7211;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Create database</span>
</li>
<p>This page shows you the details for your newly launched RDS instance. The RDS instance will take about 10 minutes to create.</p>
</ol>
<h2>Task 2: Login to your EC2 Instance</h2>
<p>During the lab setup, an Amazon EC2 Linux instance was created. You will now log in to the EC2 instance.</p>
<h3>Windows Users: Using SSH to Connect</h3>
<ol start="13">
  <li>To connect to EC2 instance dowmload ppk file by clicking: <a href="demo.ppk" download><strong>Download PPK</strong></a>.</li>
  <li>Save the file to the directory of your choice.</li>
</ol>
<p>You will use PuTTY to SSH to Amazon EC2 instances.</p>
<p>If you do not have PuTTY installed on your computer, <a href="putty.exe" download>download it here</a>.</p>
<ol start="15">
<li>Open PuTTY.exe</li>
<li>Configure the PuTTY to not timeout:</li>
<ul>
<li>Click <strong>Connection</strong></li>
<li>Set <strong>Seconds between keepalives</strong> to <input readonly="" class="copyable-inline-input" size="2" type="text" value="30"></li>
</ul>
<p>This allows you to keep the PuTTY session open for a longer period of time.</p>
<li>Configure your PuTTY session:</li>
<ul>
<li>Click <strong>Session</strong>
</li>
<li>
<strong>Host Name (or IP address):</strong> Copy and paste the <strong>EC2PublicIP</strong>.To get EC2PublicIP go to console, click on <span style="background-color:#232f3e;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;">Services</span> menu, click <strong>EC2</strong>.Click on running instances and from the bottom menu copy the Public IP address</li>
<li>In the <strong>Connection</strong> list, expand </i> <strong>SSH</strong>
</li>
<li>Click <strong>Auth</strong> (don't expand it)</li>
<li>Click <strong>Browse</strong>
</li>
<li>Browse to and select the PPK file that you downloaded</li>
<li>Click <strong>Open</strong> to select it</li>
<li>Click <strong>Open</strong>
</li>
</ul>
<li>Click <strong>Yes</strong>, to trust the host and connect to it.</li>
<li>When prompted <strong>login as</strong>, enter: <input readonly="" class="copyable-inline-input" size="8" type="text" value="ec2-user"></li>
<p>This will connect to your EC2 instance.</p>
</ol>
<h2>Task 3: Access the Database</h2>
<p>You will now connect to the RDS database by using the <strong>mysql</strong> client installed on the EC2 instance.First, gather the connection details to create the new connection.</p>
<ol start="20">
<li>Return to the <strong>AWS Management Console</strong>.</li>
<li>In the left navigation pane, click <strong>Databases</strong>.</li>
<li>Wait for your <strong>my-rds</strong> instance to display a status of <strong>Available</strong>.</li>
You can click refresh every 60 seconds to update the console.
<li>Click your <strong>my-rds</strong> instance.</li>
<li>Under the <strong>Connectivity &amp; security</strong> section, copy the <strong>Endpoint</strong> to a text editor.</li>
It will look similar to:<br>
<em>my-rds.cmq1uckiyvci.us-west-2.rds.amazonaws.com</em>
<li>In your SSH session, do the following:</li>
<ul>
<li>Paste <input readonly="" size="47" type="text" value="mysql --user student --password --host ENDPOINT">
</li>
<li>Replace <strong>ENDPOINT</strong> with the RDS endpoint that you copied to your text editor</li>
<li>Press <strong>Enter</strong></li>
<li>When prompted for a password, enter: <input readonly="" class="copyable-inline-input" size="8" type="text" value="Pass.123">
Now you are logged in to the MySQL console. You should see the <strong>mysql&gt;</strong> prompt.</li>
<li>Copy and paste the following command:</li>
<pre><code><span >CREATE</span> <span>TABLE</span> <span >lab</span><span>.</span><span>staff</span> <span>(</span><span>firstname</span> <span>text</span><span>,</span> <span >lastname</span> <span >text</span><span>,</span> <span>phone</span> <span>text</span><span>);</span>

<span>INSERT</span> <span>INTO</span> <span>lab</span><span>.</span><span>staff</span> <span>VALUES</span> <span>(</span><span>"John"</span><span>,</span> <span >"Smith"</span><span>,</span> <span>"555-1234"</span><span>);</span>

<span>INSERT</span> <span>INTO</span> <span>lab</span><span>.</span><span>staff</span> <span>VALUES</span> <span>(</span><span>"Sarah"</span><span>,</span> <span>"Jones"</span><span>,</span> <span>"555-8866"</span><span>);</span>
</code></pre>
These commands create a new table and insert some data into the database.You can now query the database.
</ul>
<li>Copy and paste the following command:</li>
<pre><code><span>SELECT</span> <span>*</span> <span>FROM</span> <span>lab</span><span>.</span><span>staff</span> <span>WHERE</span> <span>firstname</span> <span >=</span> <span>"Sarah"</span><span>;</span>
</code></pre>
Sarah's details will be displayed. You can also experiment with other SQL commands.
</ol>
<h2>Conclusion</h2>
<ul>
  Congratulations! You now have successfully:
<li>Created a RDS (RDS) Instance</li>
<li>Connected to the RDS Instance with Client Software</li>
</ul>
<h2>END Lab</h2>
<ol start="27">
Follow these steps to close the console, end your lab.
<li>Return to the AWS Management Console.</li>
<li>On the navigation bar, click <strong>lab-user@6649-3680-6613</strong>, and then click <strong>Sign Out</strong>.</li>
<li>Click <span style="background-color:#D93025;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;border-color:#D93025;border-radius:4px;border-width:2px;border-style:solid;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">End Lab</span></li>
</ol>
</div>
</div>
<script type="text/javascript">

  function copyUsername(){
    var copyText = document.getElementById('uname');
    copyText.select();
    copyText.setSelectionRange(0,9999);
    document.execCommand("copy");
  }

  function copyPassword(){
    var copyText = document.getElementById('password');
    copyText.select();
    copyText.setSelectionRange(0,9999);
    document.execCommand("copy");
  }
</script>
</body>
</html>
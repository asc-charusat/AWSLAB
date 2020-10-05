<?php
  if(isset($_POST['start'])) { 
            shell_exec('aws cloudformation create-stack --stack-name Wordpress --template-body file://Template2(Wordpress).yaml --parameters ParameterKey=KeyName,ParameterValue=*Your_KeyPair*');
        } 
        if(isset($_POST['end'])) { 
            shell_exec('aws cloudformation delete-stack --stack-name Wordpress');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Host Wordpress on EC2</title>
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
  <h1>Hosting Wordpress on Amazon EC2</h1>
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
     <a href="https://signin.aws.amazon.com/console" class="button buttonLink" target="_blank">AWS Console</a>
    <div class="inputBox">
      <label class="textHeading">Username</label><input type="text" name="" id="uname" readonly="" value="*Your Username*">
      <img src="image/copy.jpg" height=20px width=20px  class="copy" onclick="copyUsername();">
    </div>
    <div class="inputBox">
      <label class="textHeading">Password</label><input type="text" name="" id="password" readonly="" value="*Your Password*">
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
        <li>Configure Wordpress on Amazon EC2 instance</li>
      </ul>
      <h2>Start Lab</h2>
      <ol>
      <li>Launch your lab by clicking <span style="background-color:#4CAF50;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">Start Lab</span> on left side of your screen.This will start provisioning oy your lab resources and an estimated time of 15-20 minutes will be taken for complete provisioning of your resources. You must wait for resources to be provisioned before continuing.</li>
      <li>Open your lab by clicking on <span style="background-color:#008CBA;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">AWS Console</span> on left side of your screen.This will you take you to the IAM user login page.</li>
      <li>Copy the <b>Username</b> and <b>Password</b> provided on left side of your screen to login to AWS Management Console.You should now be able to access the AWS Management Console.</li></ol>
      <h2>Task 1: Configure Wordpress on Amazon EC2</h2>
      <p>An Amazon EC2 instance containing WordPress has been automatically provisioned as part of this lab.</p>
      <p>In this task, you perform the initial configuration of WordPress and create a blog post.</p>
      <ol start="4">
        <li>To the left of these instructions, copy the <strong>WordPressURL</strong>.</li>
        <li>In the <strong>AWS Management Console</strong>, on the <span style="background-color:#232f3e;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;">Services</span> menu, click <strong>EC2</strong>.</li>
        <li>In the left navigation pane, click <strong>Instances</strong>.</li>
        <li>Select the instance whose <strong>Instance State</strong> shows <strong><em>running</em></strong></li>
        <li>From the <strong>Description</strong> tab below, copy the <strong>Public DNS(IPv4)</strong> and paste the URL into new web browser tab and press Enter.</li>
         <p> The WordPress configuration page displays.</p>
         <li>Configure the following values:</li>
            <ul>
            <li>
            <strong>Site Title:</strong> Enter any title you wish</li>
            <li>
            <strong>Username:</strong> <input readonly="" class="copyable-inline-input" size="7" type="text" value="student">
            </li>
            <li>
            <strong>Password:</strong> <input readonly="" class="copyable-inline-input" size="11" type="text" value="a34%#adhAE3">
            </li>
            <li>
            <strong>Your Email:</strong> <input readonly="" class="copyable-inline-input" size="19" type="text" value="student@example.com">
            </li>
            <li>
            <strong>Search Engine Visibility:</strong> Leave deselected</li>
            </ul>
        <li>Choose <strong>Install WordPress</strong>.</li>
        <p>You are presented with a <strong><em>Success</em></strong> screen.</p>
        <li>Choose <strong>Log In</strong> and then log in with the following credentials:</li>
        <ul>
          <li>
          <strong>Username:</strong> <input readonly=""  size="7" type="text" value="student">
          </li>
          <li>
          <strong>Password:</strong> <input readonly=""  size="11" type="text" value="a34%#adhAE3">
          </li>
        </ul>
        <p>The WordPress dashboard displays.</p>
        <p>You can now create a blog post to add information to your website.</p>
        <li>At the top of the page, under <strong>Next Steps</strong>, choose <strong>Write your first blog post</strong>.</li>
        <li>If you see <em>Welcome to the Block Editor</em>, click <strong>Close</strong>.</li>
        <li>Enter a <strong>Title</strong> and write some text. Be creative!</li>
        <li>After you have finished, at the top-right corner of the page choose <strong>Publish...</strong></li>
        <li>Choose <strong>Publish</strong> again to save your blog post.</li>
        <p>You can now view your website.</p>
        <li>At the right side of the screen, click <strong>View Post</strong>.</li>
        <p>Your website is displayed, with your most recent blog post at the top.</p>
      </ol>
      <h2>Conclusion</h2>
      <p>Congratulations! You have now successfully:</p>
      <ul>
        <li>Configured WordPress on Amazon EC2 and have hosted a blog on Wordpress.</li>
      </ul>
      <h2>END Lab</h2>
      <p>Follow these steps to close the console, end your lab.</p>
      <ol>
<li>Return to the AWS Management Console.</li>
<li>On the navigation bar, click <strong>*Username*</strong>, and then click <strong>Sign Out</strong>.</li>
<li>Click <span style="background-color:#D93025;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;border-color:#D93025;border-radius:4px;border-width:2px;border-style:solid;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">End Lab</span></p></li>
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

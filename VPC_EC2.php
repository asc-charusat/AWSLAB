<?php
  if(isset($_POST['start'])) { 
            shell_exec('aws cloudformation create-stack --stack-name VPC-EC2 --template-body file://Template3_EC2-VPC.yaml --parameters ParameterKey=KeyName,ParameterValue=*Your_KeyPair*');
        } 
        if(isset($_POST['end'])) { 
            shell_exec('aws cloudformation delete-stack --stack-name VPC-EC2');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Introduction to Amazon EC2</title>
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
  <h1>Introduction to Amazon EC2</h1>
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
      <label class="textHeading">Username</label><input type="text" name="" id="uname" readonly="" value="*Your_Username*">
      <img src="image/copy.jpg" height=20px width=20px  class="copy" onclick="copyUsername();">
    </div>
    <div class="inputBox">
      <label class="textHeading">Password</label><input type="text" name="" id="password" readonly="" value="*Your_Password*">
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
        <li>Examine the VPC</li>
        <li>Launch an Amazon EC2 instance</li>
      </ul>
      <h2>Start Lab</h2>
      <ol>
      <li>Launch your lab by clicking <span style="background-color:#4CAF50;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">Start Lab</span> on left side of your screen.This will start provisioning oy your lab resources and an estimated time of 15-20 minutes will be taken for complete provisioning of your resources. You must wait for resources to be provisioned before continuing.</li>
      <li>Open your lab by clicking on <span style="background-color:#008CBA;font-family:Google Sans;font-weight:bold;font-size:90%;color:white;padding-top:5px;padding-bottom:5px;padding-left:10px;padding-right:10px;">AWS Console</span> on left side of your screen.This will you take you to the IAM user login page.</li>
      <li>Copy the <b>Username</b> and <b>Password</b> provided on left side of your screen to login to AWS Management Console.You should now be able to access the AWS Management Console.</li></ol>
      <h2>Task 1: Examine the VPC</h2>
      <p>In this task, you will examine the VPC resources that were automatically provisioned as part of this lab.</p>
      <p>Here are the resources that have been created by CloudFormation:</p>
      <ul>
          <li>An Amazon VPC</li>
          <li>An Internet Gateway</li>
          <li>Two Subnets</li>
          <li>Two Route Tables</li>
      </ul>
      <p>These resources all reside within one <strong>Availability Zone</strong>. An Availability Zone is an isolated location within a Region, and consists of one or more data centers.</p>
        <ol start="4">
        <li><p>On the <span style="background-color:#232f3e;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;">Services</span> menu, click <strong>VPC</strong>.</p></li>
        <li><p>In <strong>Filter by VPC</strong> in the top-left corner, select <strong>Lab VPC</strong>.</p></li>
        <li><p>In the left navigation pane, click <strong>Your VPCs</strong>.</p></li>
        <li><p>Select <i class="fas fa-square" style="color:blue;"></i> <strong>Lab VPC</strong>.</p></li>
        </ol>
        <p>A VPC is an isolated section of the AWS Cloud that allows resources to communicate with each other and, selectively, with the Internet. When deploying resources such as Amazon EC2 instances, you must select the VPC in which the instance will be launched.</p>
        <p>The <strong>Description</strong> tab displays the <strong>IPv4 CIDR</strong>, which is a range of IP addresses assigned to the VPC. This VPC has a CIDR of <em>10.0.0.0/16</em>, which means it contains all IP addresses that start with <input readonly="" class="copyable-inline-input" size="5" type="text" value="10.0.x.x">.</p>
        <ol start="8">
        <li>In the left navigation pane, click <strong>Internet Gateways</strong>.</li>
        </ol>
        <p>An <strong>Internet gateway</strong> is a horizontally scaled, redundant, and highly available VPC component that allows communication between instances in your VPC and the Internet. It therefore imposes no availability risks or bandwidth constraints on your network traffic.</p>
        <p>An Internet gateway serves two purposes: to provide a target in your VPC route tables for Internet-routable traffic, and to perform network address translation (NAT) for instances that have been assigned public IPv4 addresses.</p>
        <p>A VPC Gateway Attachment creates a relationship between a VPC and a gateway, such as this Internet Gateway.</p>
        <ol start="9">
        <li>In the left navigation pane, click <strong>Subnets</strong>.</li>
        </ol>
        <p>Two subnets will appear:</p>
        <ul>
        <li>
        <strong>Public Subnet 1</strong> is connected to the Internet via the Internet Gateway and can be used by resources that need to be publicly accessible.</li>
        <li>
        <strong>Private Subnet 1</strong> is <em>not</em> connected to the Internet. Any resources in this subnet cannot be reached from the Internet, thereby providing additional security around these resources.</li>
        </ul>
        <ol start="10">
        <li><p>In the left navigation pane, click <strong>Route Tables</strong>.</p></li>
        <li><p>Select the <strong>Public Route Table</strong>.</p></li>
        <li><p>Click the <strong>Routes</strong> tab in the lower half of the window.</p></li>
        </ol>
        <p>Route Tables are used to direct (or <em>route</em>) traffic in and out of subnets. The configuration for this route table is:</p>
        <ul>
        <li>For traffic within the VPC (10.0.0.0/16), route the traffic locally.</li>
        <li>For traffic going to the Internet (0.0.0.0/0), route the traffic to the Internet Gateway (indicated by <em>igw-</em>).</li>
        </ul>
        <ol start="13">
        <li>Click the <strong>Subnet Associations</strong> tab.</li>
        </ol>
        <p>The console shows that the Public Route Table is <em>associated</em> with <strong>Public Subnet 1</strong>. A Route Table can be associated with multiple subnets, with each association requiring an explicit linkage.</p>
        <p><span style="color:blue;"><i class="far fa-thumbs-up"></i></span> <strong>Congratulations!</strong> You have successfully examined all the provisioned resources for this lab.</p>

        <h2>Task 2: Launch an Amazon EC2 instance</h2>
        <p>In this task, you will launch an Amazon EC2 instance with <em>termination protection</em>. Termination protection prevents you from accidentally terminating an EC2 instance. You will deploy your instance with a User Data script that will allow you to deploy a simple web server.</p>
        <ol start="14">
        <li><p>In the <strong>AWS Management Console</strong> on the <span style="background-color:#232f3e;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;">Services</span> menu, click <strong>EC2</strong>.</p></li>
        <li><p>At the top right of the screen, if you see <strong>New EC2 Experience</strong> toggle to use the new UI, if it is not enabled by default.</p></li>
        <li><p>Click <span style="background-color:#ec7211;font-weight:bold;font-size:90%;color:white;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Launch instance</span> &gt; <strong>Launch instance</strong>.</p></li>
        </ol>
        <h3>Step 1: Choose an Amazon Machine Image (AMI)</h3>
        <p><i class="fas fa-info-circle"></i> An <strong>Amazon Machine Image (AMI)</strong> provides the information required to launch an instance, which is a virtual server in the cloud. An AMI includes:</p>
        <ul>
        <li>A template for the root volume for the instance (for example, an operating system or an application server with applications)</li>
        <li>Launch permissions that control which AWS accounts can use the AMI to launch instances</li>
        <li>A block device mapping that specifies the volumes to attach to the instance when it is launched</li>
        </ul>
        <p>The <strong>Quick Start</strong> list contains the most commonly-used AMIs. You can also create your own AMI or select an AMI from the AWS Marketplace, an online store where you can sell or buy software that runs on AWS.</p>
        <ol start="17">
        <li>Click <span style="background-color:#257ACF;font-weight:bold;font-size:90%;color:white;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Select</span> next to <strong>Amazon Linux 2 AMI</strong> (at the top of the list).</li>
        </ol>
        <h3>Step 2: Choose an Instance Type</h3>
        <p><i class="fas fa-info-circle"></i> Amazon EC2 provides a wide selection of <em>instance types</em> optimized to fit different use cases. Instance types comprise varying combinations of CPU, memory, storage, and networking capacity and give you the flexibility to choose the appropriate mix of resources for your applications. Each instance type includes one or more <em>instance sizes</em>, allowing you to scale your resources to the requirements of your target workload.</p>
        <ol start="18">
        <li>Scroll down and select <i class="fas fa-square" style="color:blue;"></i> <strong>t3.micro</strong>.</li>
        </ol>
        <p>A <strong>t3.micro</strong> instance type has 2 virtual CPUs and 1 GiB of memory.</p>
        <ol start="19">
        <li>Click <span style="background-color:#DEDEDE;font-weight:bold;font-size:90%;color:#444;border-radius:5px;border-width:1px;border-style:solid;border-color:#444;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Next: Configure Instance Details</span>
        </li>
        </ol>
        <h3>Step 3: Configure Instance Details</h3>
        <p>This page is used to configure the instance to suit your requirements. This includes networking and monitoring settings.</p>
        <p>The <strong>Network</strong> indicates which Virtual Private Cloud (VPC) you wish to launch the instance into. You can have multiple networks, such as different ones for development, testing and production.</p>
        <ol start="20">
        <li>For <strong>Network</strong>, select <strong>Lab VPC</strong>.</li>
        </ol>
        <p>The Lab VPC was created using a CloudFormation template during the setup process of your lab. This VPC includes two public subnets in two different Availability Zones.</p>
        <ol start="21">
        <li>For <strong>Enable termination protection</strong>, select <i class="far fa-check-square"></i> <strong>Protect against accidental termination</strong>.</li>
        </ol>
        <p><i class="fas fa-info-circle"></i> When an Amazon EC2 instance is no longer required, it can be <em>terminated</em>, which means that the instance is stopped and its resources are released. A terminated instance cannot be started again. If you want to prevent the instance from being accidentally terminated, you can enable <em>termination protection</em> for the instance, which prevents it from being terminated.</p>
        <ol start="22">
        <li>Scroll down, then expand <i class="fas fa-caret-right"></i> <strong>Advanced Details</strong>.</li>
        </ol>
        <p>A field for <strong>User data</strong> will appear.</p>
        <p><i class="fas fa-info-circle"></i>  When you launch an instance, you can pass <em>user data</em> to the instance that can be used to perform common automated configuration tasks and even run scripts after the instance starts.</p>
        <p>Your instance is running Amazon Linux, so you will provide a <em>shell script</em> that will run when the instance starts.</p>
        <ol start="23">
        <li>Copy the following commands and paste them into the <strong>User data</strong> field:</li>
        </ol>
        <pre class="highlight plaintext"><code>
        #!/bin/bash
        yum -y install httpd
        systemctl enable httpd
        systemctl start httpd
        echo '&lt;html&gt;&lt;h1&gt;Hello From Your Web Server!&lt;/h1&gt;&lt;/html&gt;' &gt; /var/www/html/index.html
        </code></pre>
        <p>The script will:</p>
        <ul>
        <li>Install an Apache web server (httpd)</li>
        <li>Configure the web server to automatically start on boot</li>
        <li>Activate the Web server</li>
        <li>Create a simple web page</li>
        </ul>
        <ol start="24">
        <li>Click <span style="background-color:#DEDEDE;font-weight:bold;font-size:90%;color:#444;border-radius:5px;border-width:1px;border-style:solid;border-color:#444;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Next: Add Storage</span>
        </li>
        </ol>
        <h3>Step 4: Add Storage</h3>
        <p><i class="fas fa-info-circle"></i> Amazon EC2 stores data on a network-attached virtual disk called <em>Elastic Block Store</em>.</p>
        <p>You will launch the Amazon EC2 instance using a default 8 GiB disk volume. This will be your root volume (also known as a 'boot' volume).</p>
        <ol start="25">
        <li>Click <span style="background-color:#DEDEDE;font-weight:bold;font-size:90%;color:#444;border-radius:5px;border-width:1px;border-style:solid;border-color:#444;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Next: Add Tags</span>
        </li>
        </ol>
        <h3>Step 5: Add Tags</h3>
        <p><i class="fas fa-info-circle"></i> Tags enable you to categorize your AWS resources in different ways, for example, by purpose, owner, or environment. This is useful when you have many resources of the same type — you can quickly identify a specific resource based on the tags you have assigned to it. Each tag consists of a Key and a Value, both of which you define.</p>
        <ol start="26">
        <li>Click <span style="background-color:#DEDEDE;font-weight:bold;font-size:90%;color:#444;border-radius:5px;border-width:1px;border-style:solid;border-color:#444;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Add Tag</span> then configure:</li>
        </ol>
        <ul>
        <li>
        <strong>Key:</strong> <input readonly="" class="copyable-inline-input" size="4" type="text" value="Name">
        </li>
        <li>
        <strong>Value:</strong> <input readonly="" class="copyable-inline-input" size="10" type="text" value="Web Server">
        </li>
        </ul>
        <ol start="27">
        <li>Click <span style="background-color:#DEDEDE;font-weight:bold;font-size:90%;color:#444;border-radius:5px;border-width:1px;border-style:solid;border-color:#444;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Next: Configure Security Group</span>
        </li>
        </ol>
        <h3>Step 6: Configure Security Group</h3>
        <p><i class="fas fa-info-circle"></i> A <em>security group</em> acts as a virtual firewall that controls the traffic for one or more instances. When you launch an instance, you associate one or more security groups with the instance. You add <em>rules</em> to each security group that allow traffic to or from its associated instances. You can modify the rules for a security group at any time; the new rules are automatically applied to all instances that are associated with the security group.</p>
        <ol start="28">
        <li>On <strong>Step 6: Configure Security Group</strong></li>
        </ol>
        <p> In this lab, a security group is already configured for you.</p>
        <p>Therfore do the selection, Select an <strong>existing</strong> security group.</p>
        <p>Among the security groups displayed, Select the <strong>VPC-EC2-WebServerSG</strong> security group.</p>
        <p>View the Inbound and Outbound rules pre-configured for this lab.</p>
        <ol start="29">
        <li><p>Click <span style="background-color:#257ACF;font-weight:bold;font-size:90%;color:white;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Review and Launch</span></p></li>
        </ol>
        <h3>Step 7: Review Instance Launch</h3>
        <p>The Review page displays the configuration for the instance you are about to launch.</p>
        <ol start="30">
        <li>Click <span style="background-color:#257ACF;font-weight:bold;font-size:90%;color:white;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Launch</span>
        </li>
        </ol>
        <p>A <strong>Select an existing key pair or create a new key pair</strong> window will appear.</p>
        <p><i class="fas fa-info-circle"></i> Amazon EC2 uses public–key cryptography to encrypt and decrypt login information. To log in to your instance, you must create a key pair, specify the name of the key pair when you launch the instance, and provide the private key when you connect to the instance.</p>
        <p>In this lab you will not log into your instance, so you do not require a key pair.</p>
        <p><i class="fas fa-exclamation-triangle" style="color:red;"></i> <i class="fas fa-exclamation-triangle" style="color:red;"></i> <i class="fas fa-exclamation-triangle" style="color:red;"></i> YOU MUST select <strong>Proceed without a key pair</strong> below. If you do not select this, your instance will fail to launch. <i class="fas fa-exclamation-triangle" style="color:red;"></i> <i class="fas fa-exclamation-triangle" style="color:red;"></i> <i class="fas fa-exclamation-triangle" style="color:red;"></i>  </p>
        <ol start="31">
        <li><p>Click the <strong>Choose an existing key pair</strong> <i class="fas fa-angle-down"></i> drop-down and select <span style="background-color:yellow;"> <strong>Proceed without a key pair</strong> </span></p></li>
        <li><p>Select <i class="far fa-check-square"></i> <strong>I acknowledge that ...</strong>.</p></li>
        <li><p>Click <span style="background-color:#257ACF;font-weight:bold;font-size:90%;color:white;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">Launch Instances</span></p></li>
        </ol>
        <p>Your instance will now be launched.</p>
        <ol start="34">
        <li>Click <span style="background-color:#257ACF;font-weight:bold;font-size:90%;color:white;border-radius:5px;padding-top:3px;padding-bottom:3px;padding-left:10px;padding-right:10px;white-space: nowrap;">View Instances</span>
        </li>
        </ol>
        <p>The instance will appear in a <em>pending</em> state, which means it is being launched. It will then change to <em>running</em>, which indicates that the instance has started booting. There will be a short time before you can access the instance.</p>
        <p>The instance receives a <em>public DNS name</em> that you can use to contact the instance from the Internet.</p>
        <p>Select Your <i class="fas fa-square" style="color:blue;"></i> <strong>Web Server</strong> and the <strong>Details</strong> tab displays detailed information about your instance.</p>
        <p><i class="fas fa-comment"></i> To view more information in the Details tab, drag the window divider upwards.</p>
        <p>Review the information displayed in the <strong>Details</strong> tab. It includes information about the instance type, security settings and network settings.</p>
        <ol start="35">
        <li>Wait for your instance to display the following:</li>
        </ol>
        <ul>
        <li>
        <strong>Instance State:</strong> <span style="color:green;"><i class="fas fa-circle"></i></span> running</li>
        <li>
        <strong>Status Checks:</strong>  <span style="color:green;"><i class="fas fa-check-circle"></i></span> 2/2 checks passed</li>
        </ul>
        <ol start="36">
        <li>Select the instance whose <strong>Instance State</strong> shows <strong><em>running</em></strong></li>
        <li>From the <strong>Description</strong> tab below, copy the <strong>Public DNS(IPv4)</strong> and paste the URL into new web browser tab and press Enter.</li>
        </ol>
         <p>A simple Web page will be displayed.</p>
        <p><span style="color:blue;"><i class="far fa-thumbs-up"></i></span> <strong>Congratulations!</strong> You have successfully launched your first Amazon EC2 instance.</p>

      <h2>Conclusion</h2>
      <p>Congratulations! You have now successfully:</p>
      <ul>
        <li>Examined the VPC and all other resources</li>
        <li>Launched an Amazon EC2 Instance</li>
        <li>Connected to your EC2 Instance</li>
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
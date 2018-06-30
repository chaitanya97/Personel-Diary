
<?php

require 'vendor/autoload.php';
include_once ('demo.php');

session_start();
if(isset($_SESSION['user']))
echo $_SESSION['user'];
else
header("location:login.php");
?>
<!DOCTYPE html>
<html ng-app="diaryApp">
<head>
	<title>My Diary</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img/Book1.ico">
  
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
  <script type="text/javascript" src="js/App.js"></script>
  <script type="text/javascript" src="js/AppFactory.js"></script>
  <script type="text/javascript" src="js/lib/jquery.js"></script>
  <script type="text/javascript" src="js/lib/bootstrap-modal.js"></script>
  
  <style>
    html, body {height: 100%;}
    body {background-color:#2c3e50; margin-bottom:80px; margin-left:20px;}
    .version {font-size:10pt; color:white;}
  </style>
  <script type="text/javascript">
    $('document').ready(function(){
        $('#txtPost').focus();
        $("#menu").height($(document).height());
    });
    
  </script>
</head>
<body ng-controller="DiaryController">
  
  <!-- Sliding menu -->
  <div id="menu">
    <div class="arrow">></div>
    
    <nav>
      <a href="index.php"><i class="icon icon-white icon-home"></i>&nbsp;Home</a>
      <a href="profile.php"><i class="icon icon-white icon-user"></i>&nbsp;Profile</a>
      <a href="#messages"><i class="icon icon-white icon-envelope"></i>&nbsp;Messages</a>
      <a href="#settings"><i class="icon icon-white icon-wrench"></i>&nbsp;Settings</a>
      <a href="#about"><i class="icon icon-white icon-info-sign"></i>&nbsp;About</a>
      <a href="#logout"><i class="icon icon-white icon-off"></i>&nbsp;Logout</a>
    </nav>
  </div>
  <!-- Sliding menu end -->
  
  
  <div id="wrap">
  <div class="container-fluid">
  
    <div class="row-fluid">
      <div class="span12">
        <h1><a href="/mydiary"><img src="img/Book1.png" width="45" height="50">My Diary</a><span class="version">&nbsp;1.0</span></h1>
        
          <label style="color:white;float: left;left:38%;position: relative;">Full Name</label>
          <p style="color:white;float: left;left:45%;position: relative;">
          <?php  

             echo $_SESSION['fname'];

          ?>
        </p>
          <br>
          <br>
              <label style="color:white;float: left;left:38%;position: relative;">User Name</label>
              <p style="color:white;float: left;left:45%;position: relative;">
<?php
    echo $_SESSION['user'];

?>

</p>
<br><br>

 <label style="color:white;float: left;left:38%;position: relative;">Phone </label>
              <p style="color:white;float: left;left:45%;position: relative;">
<?php
    echo $_SESSION['phone'];

?>
</p>

          
      
         
      </div>
    </div>
  
   
    

  </div> <!-- Container End -->
  </div> <!-- wrap End -->


  
</body>
</html>
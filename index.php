
<?php
require 'vendor/autoload.php';
include_once ('demo.php');


session_start();
if(isset($_SESSION['user']))
$user = $_SESSION['user'];

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
  
  
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
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
      <a href="logout.php"><i class="icon icon-white icon-off"></i>&nbsp;Logout</a>
    </nav>
  </div>
  <!-- Sliding menu end -->
  
  
  <div id="wrap">
  <div class="container-fluid">
  
    <div class="row-fluid">
      <div class="span12">
        <h1><a href="/mydiary"><img src="img/Book1.png" width="45" height="50">My Diary</a><span class="version">&nbsp;1.0</span></h1>
        <h5 style="float:right;right:5%;position: relative;"><a href="profile.php"><?php echo $_SESSION['user']; ?></a></h5>
        <form action="l.php" method="post">
          <input type="submit" name="create_pdf" value="Generate PDF" >
          <input type="hidden" name="pdf" value="<?php echo $user; ?>">
        </form>
   
        
        <form action="insert.php" method="post" enctype="multipart/form-data">
          <input type="text" placeholder="Add Title" class="form-control span5" name="title">
          <input type="file" name="file">
          <textarea name="txtPost" ng-model="txtPost" rows="5" class="form-control span12" placeholder="Share what's new .."  required autofocus></textarea>
          <button name="submit" class="btn btn-success btn-large" type="submit">
            <i class="icon icon-white icon-share"></i>&nbsp;Post
          </button>

          <input type="hidden" value="<?php echo $user; ?>" name ="user">
         <div ng-show="txtPost" class="muted pull-right">{{txtPost.length}} characters !</div>
        </form>
        
      </div>
    </div>
  
    <hr></hr>
    <?php

include_once ('config.php');
         // $myCollection = $connection->mydiary->personnel; // mydiary: database, diary: collection

          // Find everything in our collection:
         // $count = $myCollection->count();

        $count =  $db->personnel->count();
        


    ?>
        

    <div class="row-fluid">
      <div class="span12">
        <h3 ng-show="notescount()==0" class="text-warning well">

    <?php
      if($count == 0)
      {
         ?>

        No notes in your diary yet !
        <?php
      }
     else
     {
     ?>
      </h3>
        
        <div class="pull-right label label-warning">
          <?php
             echo  $count;
     }
          ?> 
        Posts

      </div>

    
     <!--   
        <div class="pagination pagination-mini pull-left">
          <ul>
            <li ng-repeat="page in pages"><a href="javascript:void(0);return false;" ng-click="loadPage($index)">{{page}}</a></li>
          </ul>
        </div>
      -->

   <?php

                    require 'vendor/autoload.php';
                    include_once ('config.php');
                    $myCollection = $db->personnel;
$Query = array("user"=>$user);
                
          // Find everything in our collection:
          $results = $myCollection->find($Query);

          foreach ($results as $obj)
{
  $img = $obj['filename'];
  ?>
        
        
        <table class="table" id="mynotes" >
          <tr class="info" >
            <td style="padding-top:15px; padding-bottom:15px;">

           

  <i class='fa fa-calendar' aria-hidden='true'><p style="color: red;opacity: 0.8;"><?php echo $obj['date'];?></p></i>
  <?php
  echo "<br>";
  ?>
  <p style="color: black;font-size: 19px;"><?php echo $obj['title'];?></p>
       



<p style="color: black;font-weight: 400;font-size: 15px;"><?php echo $obj['txtPost'];?></p> <?php
   echo "<div class ='thumbnail'>";

               if($obj['status'] == 1 )
               {
                    echo "<img src = 'img/".$img."' width= '250' height = '250'>";
               }
               else
               {
                echo "no image";
              }

      echo "</div>";
               
          ?>



        
              
              
            <!-- <a href="#myModal" role="button" class="btn close" data-toggle="modal" title="Delete note" ><i class="icon icon-trash"></i></a>-->
              <?php

      //  echo "<a href=\"#myModal\" role =\"button\" data-toggle =\"modal\" class=\"btn close\"><i class=\"icon icon-refresh\" aria-hidden=\"true\" ></i></a>  <a href=\"delete.php?id=$obj[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn close\"><i class=\"icon icon-trash\"></i></a>";   
        
        $i = $obj['_id'];
         echo "<a href=\"edit.php?id=$obj[_id]\" class=\"btn close\"><i class=\"icon icon-refresh\" aria-hidden=\"true\" ></i></a>  <a href=\"delete.php?id=$obj[_id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class=\"btn close\"><i class=\"icon icon-trash\"></i></a> <a href=\"print_pdf.php?id=$obj[_id]\" class=\"btn close\"><i class=\"icon icon-refresh\" aria-hidden=\"true\" ></i></a> ";   
      
}

?>
              
             
              
            </td>
          </tr>
        </table>
        
      </div>
    </div>
  </div> <!-- Container End -->
  </div> <!-- wrap End -->

  <!-- Modal -->

  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h3 id="myModalLabel">Update note</h3>
    </div>
    <div class="modal-body">
     

      <form method="post" action="edit.php">
    <textarea name="txtPost" ng-model="txtPost" rows="5" cols="7" class="form-control span6" placeholder="Share what's new .."  required autofocus></textarea>
          <button name="submit" class="btn btn-success btn-large" type="submit">
            <i class="icon icon-white icon-share"></i>&nbsp;Post
          </button>
          <input type="hidden" value="<?php echo $user ?>" name ="user">
        <input type="text" name="id" value=" <?php echo $i  ?> ">
         <div ng-show="txtPost" class="muted pull-right">{{txtPost.length}} characters !</div>

       </form>
    </div>
 
  </div>


  
</body>
</html>

<?php
require 'vendor/autoload.php';

    $client = new MongoDB\Client();

    $project = $client->mydiary;

    $crud = $project->personnel;
    

$id = $_GET['id'];
echo $id;
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
 
<body>
  
    
    <form name="form1" method="post" action="update.php">
      
      <textarea name="txtPost" ng-model="txtPost" rows="5" cols="7" class="form-control span6" placeholder="Share what's new .."  required autofocus></textarea>
          <button name="submit" class="btn btn-success btn-large" type="submit">
            <i class="icon icon-white icon-share"></i>&nbsp;Post
          </button>
          <input type="hidden" value="<?php echo $id ?>" name ="id">

       
         <div ng-show="txtPost" class="muted pull-right">{{txtPost.length}} characters !</div>
    </form>
</body>
</html>


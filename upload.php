 

<?php
require 'vendor/autoload.php';
include_once ('config.php');

if(isset($_POST['submit']))
{
 $file = $_FILES['file'];

//$usermail = "chaitanya";
  $filename = $_FILES['file']['name'];
  $fileTmoName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];
  $fileExt = explode('.', $filename);
  $fileActExt = strtolower(end($fileExt));

  $allowed = array('jpg','jpeg','png');

  if(in_array($fileActExt,$allowed))
  {
           if($fileError  == 0)
           {
                   if($fileSize <  10000000)
                   {
                    //  $fileNameNew = "profile".$usermail.".".$fileActExt;
                    $fileNameNew = uniqid('' , true).".".$fileActExt;
                        $fileDestination = 'img/'.$fileNameNew;
                        move_uploaded_file($fileTmoName, $fileDestination);
                        //$sql = "UPDATE profile set status  = 0 where useremail = '$usermail'";
                         $doc =array('title' => 'chaitanya' , 'user' => $usermail , 'txtPost' =>'love india' , "status"=> 1, "date"=> $time); 
                         echo $doc;
                   $d =     $db->personnel->insertOne($doc);
                   echo $d;
                       // $result = mysql_query($sql);
                       // header("Location:index.php?upload=success");
                   }
                   else
                   {
                    echo "file too big";
                   }
           }
           else
           {
              echo "error in uploading file";
           }
  }
  else
  {
    echo "You cannot upload files of this type";
  }
}
  ?>
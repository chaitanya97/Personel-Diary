

<?php 
require 'vendor/autoload.php';
include_once ('config.php');




if(isset($_POST["submit"]))
{
$txtPost=$_POST["txtPost"];
$user=$_POST["user"];
$title = $_POST['title'];
$date=gmdate('d-m-Y H:i:s'); //

/*

//echo  $user;

/*
$doc=array('title' => $title , 'user'=>$user,'txtPost'=>$txtPost,'date' =>$date );
$db->personnel->insertOne($doc);
echo "<script>alert('succssfully updated!!!'); window.location.assign('index.php')</script>";

echo "success";
*/
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
                       //$fileNameNew = "profile".$user.".".$fileActExt;
                   	 $fileNameNew = uniqid('' , true).".".$fileActExt;
                        $fileDestination = 'img/'.$fileNameNew;
                        move_uploaded_file($fileTmoName, $fileDestination);
                        //$sql = "UPDATE profile set status  = 0 where useremail = '$usermail'";
                         $doc =array('title' => $title , 'user' => $user , 'txtPost' => $txtPost , "status"=> 1, "date"=> $date , "filename" => $fileNameNew, "de" => 'asdfgg'); 
                       $db->personnel->insertOne($doc);

                       // $result = mysql_query($sql);
                        header("Location:index.php?upload=success");
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


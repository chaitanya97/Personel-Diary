<?php
// including the database connection file
require 'vendor/autoload.php';

    $client = new MongoDB\Client();

    $project = $client->mydiary;

    $crud = $project->personnel;
 
   if(isset($_POST['submit']))
   { 
    $id = $_POST['id'];
    $txtPost = $_POST['txtPost'];
//echo $txtPost;
//echo $id;
    
    $date=gmdate('d-m-Y H:i:s'); //
 


        //updating the 'users' table/collection
        //$db->personnel->update(array('_id' => new MongoDB\BSON\ObjectID($id),'$txtPost' => $txtPost));

/*
   // $obj = $crud->findOne();

$update = array('txtPost' => $txtPost);
echo $update;

$collection->update(
    array( '_id' => $id ),
    array( '$set' => $update )
);



//$obj = $collection->findOne();
//var_dump($obj);
/*
/*
*/ 
/* 
$id = '52d68c93cf5dc944128b4567';
    $posts->update(
        array('_id'     => new MongoId($id)),
    array('$set'    => array('title'   => 'What is phalcon'))
    );
*/

/*
//echo "hell";
$c = $crud->update(
   { '_id': new MongoId($id) },
   {
    
     $set: {
      'txtPost' : $txtPost
       
        }
     }
   }
)
*/
$ii = new MongoDB\BSON\ObjectID($id);
//var_dump($ii);
$st = array('_id' => $ii);
$st2 = array('$set' => array('txtPost' => 'My last post'));
//var_dump($st);
echo "<br>Trying to update";
$crud->update(['_id' => $id], ['$set' => ['txtPost' => 'My last post']]);
echo "<br>Updated";
  /*  $update = array('txtPost' => $txtPost);
    echo $update;
   $c =   $crud->update(
                        array('_id' =>new MongoId($id)),
                       array('$set' => array($update))
                    );
   echo $c;
       var_dump($c->findOne());
        //redirectig to the display page. In our case, it is index.php*/
        //header("Location: index.php");
 }

?>
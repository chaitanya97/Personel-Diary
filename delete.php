
<?php
//including the database connection file
require 'vendor/autoload.php';
include_once ("config.php");
 
//getting id of the data from url
$id = $_GET['id'];
echo $id;
 
//deleting the row from table/collection

//echo $doc;



$db->personnel->deleteOne(array('_id' => new MongoDB\BSON\ObjectID($id)));


 
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>
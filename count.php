 

    <?php

                    require 'vendor/autoload.php';
                    include_once ('config.php');
                    $myCollection = $db->personnel;

                
          // Find everything in our collection:
          $results = $myCollection->find();

          foreach ($results as $obj)
{

echo $obj['_id'];
echo $obj['user'];
;
//$_SESSION['address']=$obj['address'];
//$_SESSION['pincode']=$obj['pincode'];
echo $obj['txtPost'];



}
         

              ?>
        
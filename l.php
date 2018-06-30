<head>
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>
<?php
  require 'vendor/autoload.php';
  //include_once('config.php');
  $user = $_POST['pdf'];
  //echo $user;
  $pass =  generateRow($user);
  //$r = generateR($user);
//echo $r;
	//echo generateRow();
	require_once('tcpdf/tcpdf.php');  
   //$path = 'img/';
    $fileDestination = 'img/'.$pass[0];
  
  /*$pid=0;
   while($pid < sizeof($pass)) {
      echo $pass[$pid]."<br>";
      $pid++;
   }*/
    //  $filepath = $img.'.jpg';
      //echo $filepath;
     
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle("Details");  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
   
    $pdf->AddPage();
     //$pdf->Image($fileDestination,50,80,50,50);  
    $content = '';  
    $content .= '
      	<h2 align="center">My diary</h2>


      

      	
      <div class ="container">
      ';  
    //$content .= $pass;
    $pid=0;
   while($pid < sizeof($pass)) {
      if($pid % 2 != 0)
        $content .= $pass[$pid]."<br>";
      else
        $content .= "<img src=\"img/".$pass[$pid]."\" width=\"225\" height=\"225\"><br>";
      $pid++;
   } 
    $content .= '</div>';  
    $pdf->writeHTML($content);
    ob_end_clean();  
    $pdf->Output('output.pdf', 'I');
	
    //echo $content;



		function generateRow($em_str)
    {

		$client = new MongoDB\Client();

		$project = $client->mydiary;

		$crud = $project->personnel;
    $df = $em_str;
    //echo $df;
$query = array('user' => $df);
$result = $crud->find($query);

		$contents = '';
		//echo $result;

    $ret = array();
		foreach ($result as $row)
    {
     $img = $row['filename'];
			$contents = "
			
				<h2>".$row['title']."</h2>
				<i class='fa fa-calendar' aria-hidden='true'>".$row['date']."</i><p>
				<p>".$row['txtPost']."</p>

         

		
			";
    // echo $img;

      array_push($ret, $img, $contents);
		}
	//echo $img;
		
		return $ret;
    //return $img;
	}

  


?>

	

<?php 
class Report
{


/*
Main certified reports
*/
//getCertReportImage
public function getCertCategoryImage($type, $userID){
$countAll = mysql_query("SELECT * FROM collection WHERE coinCategory = '".str_replace('_', ' ', $type)."' AND userID = '$userID' AND proService != 'None'") or die(mysql_error());
$img_check = mysql_num_rows($countAll);
  if($img_check > 0){ 
	  $type = str_replace(' ', '_', $type);
		  $image = $type.'.jpg';
  } else {
$image = "slabGraded.jpg";
}
return $image;
}	





}
?>
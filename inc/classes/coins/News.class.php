<?php 
class News
{
	public function construct() 
    { 

    }

    public function getNewsIDById($newsID) {
        $sql = 'SELECT * FROM news WHERE newsID = ' . $newsID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->newsID = $row['newsID'];
        $this->newsTitle = $row['newsTitle'];		
        $this->newsDescription = $row['newsDescription'];
        $this->newsAddDate = $row['newsAddDate'];
		$this->newsPostDate = $row['newsPostDate'];
		$this->userID = $row['userID'];
		$this->newsURL = $row['newsURL'];
		$this->fileName = $row['fileName'];
		$this->newsType = $row['newsType'];
		$this->coinClubID = $row['coinClubID'];
		
        return true;
    }
	
	public function getCoinClub() {
        return strip_tags($this->coinClubID);
    }	
	public function getFileName() {
        return strip_tags($this->fileName);
    }
	public function getNewsType() {
        return strip_tags($this->newsType);
    }
    public function getNewsURL() {
        return strip_tags($this->newsURL);
    }	
	
	public function getNewsID() {
        return strip_tags($this->newsID);
    }
	public function getNewsTitle() {
        return strip_tags($this->newsTitle);
    }
    public function getNewsDescription() {
        return strip_tags($this->newsDescription);
    }
	public function getNewsAddDate() {
        return strip_tags($this->newsAddDate);
    }
    public function getNewsPostDate() {
        return strip_tags($this->newsPostDate);
    }    
	public function getAddedBy() {
        return strip_tags($this->userID);
    }




public function deleteNewsItem($newsID){
	$sql = mysql_query("DELETE FROM news WHERE newsID = '$newsID'") or die(mysql_error());
		if(!$sql) {
		return false;
		} else {
		  return true;
		}
}




public function deleteNewsLetter($newsID) {
	$this->getNewsIDById($newsID);
	if(unlink($this->newsURL())){
    $sql = mysql_query("DELETE FROM news WHERE newsID = '$newsID'");
	}
	 return;
}






}
?>

<?php 
//getProductTypeCount
class Sites
{

    public function getSiteById($siteID) {
		$sql = mysql_query("SELECT * FROM sites WHERE siteID = '$siteID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->siteID = $row['siteID'];
        $this->siteName = $row['siteName'];
        $this->siteURL = $row['siteURL'];
		$this->details = $row['details'];
		$this->added = $row['added'];
		$this->active = $row['active'];
        return true;
    }

	public function getSiteName() {
        return strip_tags($this->siteName);
    }
	public function getSiteURL() {
        return strip_tags($this->siteURL);
    }		
	public function getDetails() {
        return strip_tags($this->details);
    }	
	public function getDateAdded() {
        return strip_tags($this->added);
    }

	public function getSiteNameByID($siteID) {
		$sql = mysql_query("SELECT * FROM sites WHERE siteID = '$siteID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        return strip_tags($row['siteName']);
    }	
	public function deleteSiteByID($siteID) {
        $sql = mysql_query("DELETE FROM sites WHERE siteID = '$siteID' LIMIT 1")or die(mysql_error());
        return;
    }	
	public function changeActiveStatusByID($siteID, $active) {
        $sql = mysql_query("UPDATE sites SET active = '$active' WHERE siteID = '$siteID' LIMIT 1")or die(mysql_error());
        return;
    }				
	public function getActiveSiteCount() {
	$sql = mysql_query("SELECT * FROM sites WHERE active = '1'")or die(mysql_error());
	 return mysql_num_rows($sql);
  } 



}//End Class
?>

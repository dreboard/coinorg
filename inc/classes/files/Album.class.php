<?php 
class Album {

    public function getAlbumByID($albumID) {
        $sql = 'SELECT * FROM album WHERE albumID = ' . $albumID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->albumID = $row['albumID'];
        $this->groupID = $row['groupID'];
		$this->userID = $row['userID'];		
		$this->clubID = $row['coinClubID'];
        $this->albumName = $row['albumName'];
		$this->albumDescription = $row['albumDescription'];
	    $this->eventID = $row['eventID'];
        return true;
    }
	public function getAlbumName() {
        return strip_tags($this->albumName);
    }	
	public function getAlbumGroup() {
        return strip_tags($this->imgName);
    }		
	public function getAlbumClub() {
        return strip_tags($this->eventID);
    }	
	public function getAlbumUser() {
        return strip_tags($this->userID);
    }
	public function getAlbumID() {
        return strip_tags($this->albumID);
    }
	public function getAlbumDescription() {
        return strip_tags($this->albumDescription);
    }
	public function getEventID() {
        return strip_tags($this->eventID);
    }
    public function getAlbumpicByID($albumpicID) {
        $sql = 'SELECT * FROM albumpics WHERE albumpicID = ' . $albumpicID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->albumID = $row['albumID'];
        $this->albumpicID = $row['albumpicID'];
		$this->clubID = $row['coinClubID'];
        $this->imgTitle = $row['imgTitle'];
		$this->userID = $row['userID'];		
		$this->imgDescription = $row['imgDescription'];
        $this->imgDate = $row['imgDate'];
        $this->imgURL = $row['imgURL'];
		$this->imgCategory = $row['imgCategory'];
		$this->imgTitle = $row['imgTitle'];
        return true;
    }
	public function getPicID() {
        return strip_tags($this->albumpicID);
    }
	public function getAlbum() {
        return strip_tags($this->albumID);
    }
	public function getClubID() {
        return strip_tags($this->clubID);
    }	
	public function getImgCategory() {
        return strip_tags($this->imgCategory);
    }
	public function getImgTitle() {
        return strip_tags($this->imgTitle);
    }	
	public function getUserID() {
        return strip_tags($this->userID);
    }
	public function getImgDescription() {
        return strip_tags($this->imgDescription);
    }
	public function getImgDate() {
        return strip_tags($this->imgDate);
    }	
	public function getImgURL() {
        return strip_tags($this->imgURL);
    }		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Album views	

	public function getAlbumImgCount($albumID) {
	$sql = mysql_query("SELECT * FROM albumpics WHERE albumID = '$albumID' ") or die(mysql_error()); 
	return mysql_num_rows($sql);    	
    }	
	public function albumFirstPic($albumID) {
		$img = '';
		$this->getAlbumByID($albumID);
        $sql = mysql_query("SELECT * FROM albumpics WHERE albumID = '$albumID' LIMIT 1")or die(mysql_error());		
			  while($row = mysql_fetch_array($sql))
			  {
				 $img = $row['imgURL'];
			  }
	  return $img;
	}		
	

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////Image MGT
//Clubs
public function deleteAlbum($albumID, $coinClubID) {
	$this->getAlbumByID($albumID);
	$folderName = "../album/".$coinClubID;
	if($this->deleteDir($folderName)){
    $sql = mysql_query("DELETE FROM album WHERE albumID = '$albumID'");
	}
	 return;
}
public function deleteImg($albumpicID) {
	$this->getAlbumpicByID($albumpicID);
	if(unlink($this->getImgURL())){
    $sql = mysql_query("DELETE FROM albumpics WHERE albumpicID = '$albumpicID'");
	}
	 return;
}
function createAlbumFolder($coinClubID) {
		$folderName = 'gallery/'.$coinClubID.'/';
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }	

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Delete folder
	
public static function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException('$dirPath must be a directory');
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}	

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

public function getEventGallery($eventID){
        $sql = mysql_query("SELECT * FROM album WHERE eventID = '$eventID' LIMIT 1")or die(mysql_error());		
        $row = mysql_fetch_array($sql);
	  return intval($row['albumID']);
	}		
	


}//End Class
?>
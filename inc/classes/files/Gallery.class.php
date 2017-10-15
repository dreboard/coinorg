<?php 
class Gallery {

    public function getGalleryByID($galleryID) {
        $sql = 'SELECT * FROM gallery WHERE galleryID = ' . $galleryID;
        $results = mysql_query($sql);
        $row = mysql_fetch_array($results);
        $this->galleryID = $row['galleryID'];
        $this->eventID = $row['eventID'];
        $this->imgTitle = $row['imgTitle'];
		$this->userID = $row['userID'];		
		$this->imgDescription = $row['imgDescription'];
        $this->imgDate = $row['imgDate'];
        $this->imgURL = $row['imgURL'];
		$this->imgCategory = $row['imgCategory'];
		$this->imgName = $row['imgName'];
		$this->albumName = $row['albumName'];
        return true;
    }
	public function getAlbumName() {
        return strip_tags($this->imgName);
    }	
	public function getImgName() {
        return strip_tags($this->imgName);
    }		
	public function getEventID() {
        return strip_tags($this->eventID);
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
//Image MGT

public function deleteImg($galleryID) {
	$this->getGalleryByID($galleryID);
	if(unlink($this->getImgURL())){
    $sql = mysql_query("DELETE FROM gallery WHERE galleryID = '$galleryID'");
	}
	 return;
}

function createAlbum($userID) {
		$folderName = "../gallery/".$userID;
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			$this->createEventThumbFolder($userID);
			return true;
			} else {
				return false;
			}

    }	
function createEventThumbFolder($userID) {
		$folderName = "../gallery/".$userID.'thumbs/';
		if ( !file_exists($folderName) ) {
			mkdir($folderName, 0777);
			return true;
			} else {
				return false;
			}

    }


}//End Class
?>
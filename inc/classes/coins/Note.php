<?php 

class Note {
	
    public function __construct() {}
	
	
	public function getNoteByID($noteID) {
		$sql = mysql_query("SELECT * FROM notes WHERE noteID = '$noteID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->noteID = $row['noteID'];
		$this->userID = $row['userID'];
		$this->noteTitle = $row['noteTitle'];
		$this->note = $row['note'];
        $this->noteDate = $row['noteDate'];		
		$this->noteCategory = $row['noteCategory'];	
		$this->collectfolderID = $row['collectfolderID'];
		$this->collectrollsID = $row['collectrollsID'];
		$this->collectsetID = $row['collectsetID'];			
        return true;
    }

	public function getNoteID() {
        return strip_tags($this->noteID);
    }
	public function getUserID() {
        return strip_tags($this->userID);
    }
	public function getNoteTitle() {
        return strip_tags($this->noteTitle);
    }
	public function getNote() {
		$allow = '<table> <tr> <td> <table> <tr> <td> <thead> <tbody> <tfoot> <span> <sub> <sup> <li> <ol> <ul> <a> <br> <p> <h1> <h2> <h3> <h4> <h5> <h6> <strong> <hr> <div> <img> <b> <i> <em> <strike> <del> <pre>';	
		$this->stripInlineScripts($this->note);
        return strip_tags($this->note, $allow);
    }
	public function stripInlineScripts($value) {
		 preg_replace('#(<[^>]+[\x00-\x20\"\'\/])(on|xmlns)[^>]*>#iUu', "$1>", $value);
	}	
		
	public function getNoteDate() {
        return strip_tags($this->noteDate);
    }
	public function getNoteCategory() {
        return strip_tags($this->noteCategory);
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//NOTE MANAGEMENT

	public function deleteNote($userID, $noteID) {
		if(mysql_query("DELETE FROM notes WHERE userID = '$userID' AND  noteID = '$noteID'")){
		return;
		}  else {
			return false;
		}
	}

	
	public function getNoteCount($userID) {
	$sql = mysql_query("SELECT * FROM notes WHERE userID = '$userID'") or die(mysql_error());
	return mysql_num_rows($sql);
    }  
	
	function getNoteCategoryCount($userID, $noteCategory){
	$sql = mysql_query("SELECT * FROM folders WHERE noteCategory = '$noteCategory' AND userID = '$userID'");
	return mysql_num_rows($sql);
 }
 
 
 
 
	
}//End Class
?>
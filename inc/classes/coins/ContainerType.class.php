<?php 
//getOpenList

class ContainerType {

	public function __construct() { 
		} 

    public function getContainerTypeById($containerTypeID) {	
		$sql = mysql_query("SELECT * FROM containerType WHERE containerTypeID = '$containerTypeID'") or die(mysql_error());
        $row = mysql_fetch_array($sql);		
        $this->containerTypeID = $row['containerTypeID'];
		$this->containerTypeName = $row['containerTypeName'];
		$this->coinType = $row['coinType'];
        $this->coinCategory = $row['coinCategory'];		
        $this->containerType = $row['containerType'];
		$this->rollCount = $row['rollCount'];	
		$this->slabCount = $row['slabCount'];	
		$this->coinCount = $row['coinCount'];	
		$this->setCount = $row['setCount'];	
		return true;
    }
							
	
	public function getCoinCategory() {
        return strip_tags($this->coinCategory);
    }	
	public function getCoinType() {
        return strip_tags($this->coinType);
    }	
	public function getContainerTypeName() {
        return $this->containerTypeName;
    }	
	  public function getContainerType() {
	  return strip_tags($this->containerType);
    }	
	  public function getContainerTypeID() {
	  return strip_tags($this->containerTypeID);
    }		
	 public function getSetCount() {
	  return strip_tags($this->setCount);
    }	
	 public function getCoinCount() {
	  return strip_tags($this->coinCount);
    }	
	 public function getSlabCount() {
	  return strip_tags($this->slabCount);
    }	
	 public function getRollCount() {
	  return strip_tags($this->rollCount);
    }	
	
	
	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





}//END CLASS
?>
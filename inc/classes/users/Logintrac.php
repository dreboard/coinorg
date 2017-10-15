<?php 
class Logintrac{

    public function getUserById($userID) {
		$sql = mysql_query("SELECT * FROM logintrac WHERE loginID = '$loginID' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->loginID = $row['loginID'];
        $this->logintime = $row['logintime'];
        $this->loginIP = $row['loginIP'];
		$this->userID = $row['userID'];
        return true;
    }



}

?>

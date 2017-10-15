<?php 
class Maps
{

    public function getCoordinatesByZip($zip) {
		$sql = mysql_query("SELECT * FROM geolocation WHERE zip = '$zip' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->zip = $row['zip'];
        $this->lat = $row['lat'];
		$this->long = $row['long'];
        return true;
    }

	public function getZipCode() {
        return strip_tags($this->zip);
    }
	public function getLatitude() {
        return strip_tags($this->lat);
    }
	public function getLongitude() {
        return strip_tags($this->long);
    }

}//End Class
?>
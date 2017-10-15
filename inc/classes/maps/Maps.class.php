<?php 
class Maps
{

    public function getCoordinatesByZip($zip) {
		$sql = mysql_query("SELECT * FROM zipcodes WHERE zipcode = '$zip' LIMIT 1")or die(mysql_error());
        $row = mysql_fetch_array($sql);
        $this->zip = $row['zip'];
        $this->latitude = $row['latitude'];
		$this->longitude = $row['longitude'];
		$this->state = $row['state'];
		$this->city = $row['city'];
        return true;
    }

	public function getZipCode() {
        return strip_tags($this->zip);
    }
	public function getLatitude() {
        return strip_tags($this->latitude);
    }
	public function getLongitude() {
        return strip_tags($this->longitude);
    }
	public function getCity() {
        return strip_tags($this->city);
    }
	public function getState() {
        return strip_tags($this->state);
    }




public function validateZipCode($zip, $city){
	$this->getCoordinatesByZip($zip);
	
}

/*
////////////////////////////////////////Supported Place Types

https://developers.google.com/places/documentation/supported_types
accounting
airport
amusement_park
aquarium
art_gallery
atm
bakery
bank
bar
beauty_salon
bicycle_store
book_store
bowling_alley
bus_station
cafe
campground
car_dealer
car_rental
car_repair
car_wash
casino
cemetery
church
city_hall
clothing_store
convenience_store
courthouse
dentist
department_store
doctor
electrician
electronics_store
embassy
establishment
finance
fire_station
florist
food
funeral_home
furniture_store
gas_station
general_contractor
grocery_or_supermarket
gym
hair_care
hardware_store
health
hindu_temple
home_goods_store
hospital
insurance_agency
jewelry_store
laundry
lawyer
library
liquor_store
local_government_office
locksmith
lodging
meal_delivery
meal_takeaway
mosque
movie_rental
movie_theater
moving_company
museum
night_club
painter
park
parking
pet_store
pharmacy
physiotherapist
place_of_worship
plumber
police
post_office
real_estate_agency
restaurant
roofing_contractor
rv_park
school
shoe_store
shopping_mall
spa
stadium
storage
store
subway_station
synagogue
taxi_stand
train_station
travel_agency
university
veterinary_care
zoo

*/



	
}//End Class
?>
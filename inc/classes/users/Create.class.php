<?php 
class Createmember
{
	
	protected $_email;
	protected $_password;
	protected $_first;
	protected $_last;
	protected $_officePhone;
	protected $_card_number;
	
	
	
	function processMember($profileArray)
	{
		$allowedKeys = array('first','last','phone','card_number','email','password');
		$profileArray = array_intersect_key($profileArray, array_fill_keys($allowedKeys,NULL));
		foreach ($profileArray as $key => $value) {
			$profileArray[$key] = strip_tags(trim($value));
		}
		
		if (array_key_exists($profileArray, 'first')) {
			$this->_first = $profileArray['first'];
		}
		if (array_key_exists($profileArray, 'last')) {
			$this->_last = $profileArray['last'];
		}
		if (array_key_exists($profileArray, 'phone')) {
			$this->_phone = $profileArray['phone'];
		}
		if (array_key_exists($profileArray, 'card_number')) {
			$this->_card_number = $profileArray['card_number'];
		}
		if (array_key_exists($profileArray, 'email')) {
			$this->_email = $profileArray['email'];
		}
		if (array_key_exists($profileArray, 'password')) {
			$this->_password = $profileArray['password'];
		}
		
		return $this->email;
	}
}
?>

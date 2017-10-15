<?php 
include"../inc/config.php";

if (isset($_GET["coinID"])) { 
$coinID = intval($_GET["coinID"]);
$coin-> getCoinById($coinID);

switch ($coin->getCoinStrike()) {

    case 'Business':
        echo '
		<option value="No Grade" selected="selected">None</option>
		<option value="B0">(B-0) Basal 0 </option>
		  <option value="P1" >(PO-1) Poor</option>
		  <option value="FR2">(FR-2) Fair</option>
		  <option value="AG3">(AG-3) About Good</option>
		  <option value="G4">(G-4) Good</option>
		  <option value="G6">(G-6) Good</option>
		  <option value="VG8">(VG-8) Very Good</option>
		  <option value="VG10">(VG-10) Very Good</option>
		  <option value="F12">(F-12) Fine</option>
		  <option value="F15">(F-15) Fine</option>
		  <option value="VF20">(VF-20) Very Fine</option>
		  <option value="VF25">(VF-25) Very Fine</option>
		  <option value="VF30">(VF-30) Very Fine</option>
		  <option value="VF35">(VF-35) Very Fine</option>
		  <option value="EF40">(EF-40) Extremely Fine</option>
		  <option value="EF45">(EF-45) Extremely Fine</option>
		  <option value="AU50">(AU-50) About Uncirculated</option>
		  <option value="AU53">(AU-53) About Uncirculated</option>
		  <option value="AU55">(AU-55) About Uncirculated</option>
		  <option value="AU58">(AU-58) Very Choice About Uncirculated</option>
		  <option value="MS60">(MS-60) Mint State Basal</option>
		  <option value="MS61">(MS-61) Mint State Acceptable</option>
		  <option value="MS62">(MS-62) Mint State Acceptable</option>
		  <option value="MS63">(MS-63) Mint State Acceptable</option>
		  <option value="MS64">(MS-64) Mint State Acceptable</option>
		  <option value="MS65">(MS-65) Mint State Choice</option>
		  <option value="MS66">(MS-66) Mint State Choice</option>
		  <option value="MS67">(MS-67) Mint State Choice</option>
		  <option value="MS68">(MS-68) Mint State Premium</option>
		  <option value="MS69">(MS-69) Mint State All-But-Perfect</option>
		  <option value="MS70">(MS-70) Mint State Perfect</option>';
				  break;
			  case 'Proof':
				  echo '
				  <option value="No Grade" selected="selected">None</option>
				  <option value="PR35">(PR-35) Impaired Proof.</option>
		  <option value="PR40">(PR-40) Impaired Proof.</option>
		  <option value="PR45">(PR-45) Impaired Proof.</option>
		  <option value="PR50">(PR-50) Impaired Proof.</option>
		  
		  <option value="PR55">(PR-55) Impaired Proof.</option>
		  <option value="PR58">(PR-58) Impaired Proof.</option>
		  <option value="PR60">(PR-60) Brilliant Proof.</option>
		  <option value="PR61">(PR-61) Brilliant Proof.</option>
		  <option value="PR62">(PR-62) Brilliant Proof.</option>
		  <option value="PR63">(PR-63) Brilliant Proof.</option>
		  <option value="PR64">(PR-64) Brilliant Proof.</option>
		  <option value="PR65">(PR-65) Gem Proof.</option>
		  <option value="PR66">(PR-66) Choice Gem Proof.</option>
		  <option value="PR67">(PR-67) Extraordinary Proof.</option>
		  <option value="PR68">(PR-68) Extraordinary Proof.</option>
		  <option value="PR69">(PR-69) Extraordinary Proof.</option>
		  <option value="PR70">(PR-70) Perfect Proof.</option>';
				  break;
	  }
}
?>
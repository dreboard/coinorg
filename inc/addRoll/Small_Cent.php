<?php 
function newCoinSelects($coinType, $i){
   $sql = mysql_query("SELECT * FROM coins WHERE coinType = '".str_replace('_', ' ', $coinType)."' AND byMint = '1' AND coinYear <= ".date('Y')." ORDER BY coinYear ASC") or die(mysql_error());
   $html = '<select name="coinID['.$i.'][theID]" class="coinOptions"><option value="0">Select Coin</option>';
   while($row = mysql_fetch_array($sql))
		{
		  $coin = new Coin();
		  $coinID = intval($row['coinID']);
		  $coin->getCoinById($coinID);
		  $html .= '<option value="'.$coinID.'">'.$coin->getCoinName().'</option>';	
		}	
		$html .= '</select>';
	return $html;	
}	
?>
<table width="80%" border="0">
<?php 
for ($i=1; $i<=$CoinTypes->getRollCount(); $i++)
  {
  echo '
  <tr>
    <td width="10%">Coin '.$i.'</td>
    <td width="38%">
	 '.newCoinSelects($coinType, $i).'</td>
    <td width="14%">Grade </td>
    <td width="38%"><select name="coinID['.$i.'][coinGrade]">
      <option value="No Grade" selected="selected">No Grade</option>
      <option value="B0">B-0</option>
      <option value="P1" >PO-1</option>
      <option value="FR2">FR-2</option>
      <option value="AG3">AG-3</option>
      <option value="G4">G-4</option>
      <option value="G6">G-6</option>
      <option value="VG8">VG-8</option>
      <option value="VG10">VG-10</option>
      <option value="F12">F-12</option>
      <option value="F15">F-15</option>
      <option value="VF20">VF-20</option>
      <option value="VF25">VF-25</option>
      <option value="VF30">VF-30</option>
      <option value="VF35">VF-35</option>
      <option value="EF40">EF-40</option>
      <option value="EF45">EF-45</option>
      <option value="AU50">AU-50</option>
      <option value="AU53">AU-53</option>
      <option value="AU55">AU-55</option>
      <option value="AU58">AU-58</option>
      <option value="MS60">MS-60</option>
      <option value="MS61">MS-61</option>
      <option value="MS62">MS-62</option>
      <option value="MS63">MS-63</option>
      <option value="MS64">MS-64</option>
      <option value="MS65">MS-65</option>
      <option value="MS66">MS-66</option>
      <option value="MS67">MS-67</option>
      <option value="MS68">MS-68</option>
      <option value="MS69">MS-69</option>
      <option value="MS70">MS-70</option>
      <option value="PR35">PR-35</option>
      <option value="PR40">PR-40</option>
      <option value="PR45">PR-45</option>
      <option value="PR50">PR-50</option>
      <option value="PR55">PR-55</option>
      <option value="PR58">PR-58</option>
      <option value="PR60">PR-60</option>
      <option value="PR61">PR-61</option>
      <option value="PR62">PR-62</option>
      <option value="PR63">PR-63</option>
      <option value="PR64">PR-64</option>
      <option value="PR65">PR-65</option>
      <option value="PR66">PR-66</option>
      <option value="PR67">PR-67</option>
      <option value="PR68">PR-68</option>
      <option value="PR69">PR-69</option>
      <option value="PR70">PR-70</option>
    </select></td>
  </tr>';
  }
?>
</table>

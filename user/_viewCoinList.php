<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if(isset($_GET['q'])){
$q = strip_tags($_GET["q"]);
$coinID = intval($_GET["coinID"]);
$coin->getCoinById($coinID);
		switch($q){
			case 'folder':
			$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectfolderID != '0' AND userID = '$userID'") or die(mysql_error());
				  echo '<table width="100%" border="0" id="clientTbl">
					  <thead class="darker">
						<tr>
						  <td width="57%">Folder Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
					  </thead>
						<tbody>';
						if(mysql_num_rows($countAll) == 0){
					echo '
						<tr>
						<td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coin->getCoinName().' collected</strong></a></td>
						<td width="11%" align="center">&nbsp;</td>  
						<td width="14%" align="center">&nbsp;</td>
						<td width="18%" align="center">&nbsp;</td>
						</tr>  ';
			  } else {
			  
				  while($row = mysql_fetch_array($countAll))
					{
					$collectionFolder->getCollectionFolderById(intval($row['collectfolderID']));	
                    $collection->getCollectionById(intval($row['collectionID'])); 
					echo '<tr align="center">';
					echo '<td align="left"><a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'">'.$collectionFolder->getFolderNickname().'</a></td>';
					echo '<td>' .$collection->getCoinGrade().'</td>';
					echo '<td>' .date("M j, Y",strtotime($collection->getCoinDate())).'</td>';
					echo '<td>' .$collection->getCoinPrice().'</td>';
					echo "</tr>";
					}
			  }
				  echo '</tbody>
					  <tfoot class="darker">
						<tr>
						  <td width="57%">Folder Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
						  </tfoot>
					  </table>';
			break;	
			case 'roll':
			$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectrollsID != '0' AND userID = '$userID'") or die(mysql_error());
				  echo '<table width="100%" border="0" id="clientTbl">
					  <thead class="darker">
						<tr>
						  <td width="57%">Roll Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
					  </thead>
						<tbody>';
						if(mysql_num_rows($countAll) == 0){
					echo '
						<tr>
						<td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coin->getCoinName().' collected</strong></a></td>
						<td width="11%" align="center">&nbsp;</td>  
						<td width="14%" align="center">&nbsp;</td>
						<td width="18%" align="center">&nbsp;</td>
						</tr>  ';
			  } else {
			  
				  while($row = mysql_fetch_array($countAll))
					{
					$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));	
                    $collection->getCollectionById(intval($row['collectionID'])); 
					echo '<tr align="center">';
					echo '<td align="left">'.$collectionRolls->getRollTypeLink(intval($row['collectrollsID'])).'</td>';
					echo '<td>' .$collection->getCoinGrade().'</td>';
					echo '<td>' .date("M j, Y",strtotime($collection->getCoinDate())).'</td>';
					echo '<td>' .$collection->getCoinPrice().'</td>';
					echo "</tr>";
					}
			  }
				  echo '</tbody>
					  <tfoot class="darker">
						<tr>
						  <td width="57%">Roll Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
						  </tfoot>
					  </table>';
			break;	
						case 'set':
			$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectsetID != '0' AND userID = '$userID'") or die(mysql_error());
				  echo '<table width="100%" border="0" id="clientTbl">
					  <thead class="darker">
						<tr>
						  <td width="57%">Set Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
					  </thead>
						<tbody>';
						if(mysql_num_rows($countAll) == 0){
					echo '
						<tr>
						<td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coin->getCoinName().' sets</strong></a></td>
						<td width="11%" align="center">&nbsp;</td>  
						<td width="14%" align="center">&nbsp;</td>
						<td width="18%" align="center">&nbsp;</td>
						</tr>  ';
			  } else {
			  
				  while($row = mysql_fetch_array($countAll))
					{
					$CollectionSet->getCollectionSetById(intval($row['collectsetID']));	
                    $collection->getCollectionById(intval($row['collectionID'])); 
					echo '<tr align="center">';
					echo '<td align="left"><a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'">'.$CollectionSet->getSetNickname().'</a></td>';
					echo '<td>' .$collection->getCoinGrade().'</td>';
					echo '<td>' .date("M j, Y",strtotime($collection->getCoinDate())).'</td>';
					echo '<td>' .$collection->getCoinPrice().'</td>';
					echo "</tr>";
					}
			  }
				  echo '</tbody>
					  <tfoot class="darker">
						<tr>
						  <td width="57%">Set Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
						  </tfoot>
					  </table>';
			break;
case 'vam':
			$countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND collectrollsID != '0' AND vam != 'None' AND userID = '$userID'") or die(mysql_error());
				  echo '<table width="100%" border="0" id="clientTbl">
					  <thead class="darker">
						<tr>
						  <td width="57%">Year/Mint</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
					  </thead>
						<tbody>';
						if(mysql_num_rows($countAll) == 0){
					echo '
						<tr>
						<td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coin->getCoinName().' Collected</strong></a></td>
						<td width="11%" align="center">&nbsp;</td>  
						<td width="14%" align="center">&nbsp;</td>
						<td width="18%" align="center">&nbsp;</td>
						</tr>  ';
			  } else {
			  
				  while($row = mysql_fetch_array($countAll))
					{
					$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));	
                    $collection->getCollectionById(intval($row['collectionID'])); 
					echo '<tr align="center">';
					echo '<td align="left">'.$collectionRolls->getRollTypeLink(intval($row['collectrollsID'])).'</td>';
					echo '<td>' .$collection->getCoinGrade().'</td>';
					echo '<td>' .date("M j, Y",strtotime($collection->getCoinDate())).'</td>';
					echo '<td>' .$collection->getCoinPrice().'</td>';
					echo "</tr>";
					}
			  }
				  echo '</tbody>
					  <tfoot class="darker">
						<tr>
						  <td width="57%">Roll Name</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
						  </tfoot>
					  </table>';
			break;									
			case 'certified':
			$countAll = mysql_query("SELECT * FROM certlist WHERE coinID = '$coinID' AND userID = '$userID' ") or die(mysql_error());
				  echo '<table width="100%" border="0" id="clientTbl">
					  <thead class="darker">
						<tr>
						  <td width="57%">Service</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
					  </thead>
						<tbody>';
						if(mysql_num_rows($countAll) == 0){
					echo '
						<tr>
						<td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coin->getCoinName().' on certified list</strong></a></td>
						<td width="11%" align="center">&nbsp;</td>  
						<td width="14%" align="center">&nbsp;</td>
						<td width="18%" align="center">&nbsp;</td>
						</tr>  ';
			  } else {
			  
				  while($row = mysql_fetch_array($countAll))
					{
					$CertList->getCertCoinById(intval($row['certlistID']));	
                    $collection->getCollectionById(intval($CertList->getCollectionID())); 
					echo '<tr align="center">';
					echo '<td align="left">'.$CertList->getGrader().'</td>';
					echo '<td>' .$collection->getCoinGrade().'</td>';
					echo '<td>' .date("M j, Y",strtotime($collection->getCoinDate())).'</td>';
					echo '<td>' .$collection->getCoinPrice().'</td>';
					echo "</tr>";
					}
			  }
				  echo '</tbody>
					  <tfoot class="darker">
						<tr>
						  <td width="57%">Service</td>
						  <td width="11%" align="center">Grade</td>  
						  <td width="14%" align="center">Collected</td>
						  <td width="18%" align="center">Purchase</td>
						</tr>
						  </tfoot>
					  </table>';
			break;	
			case 'all':
			echo '<table width="100%" border="0" id="clientTbl">
			  <thead class="darker">
				<tr>
				  <td width="57%">Year / Mint</td>
				  <td width="11%" align="center">Grade</td>  
				  <td width="14%" align="center">Collected</td>
				  <td width="18%" align="center">Purchase</td>
				</tr>
			  </thead>
				<tbody>';
			  $countAll = mysql_query("SELECT * FROM collection WHERE coinID = '$coinID' AND userID = '$userID'") or die(mysql_error());
			  if(mysql_num_rows($countAll) == 0){
					echo '
						<tr>
						<td width="57%"><a href="addCoinByID.php?coinID='.$coinID.'"><strong>No '.$coin->getCoinName().' Collected</strong></a></td>
						<td width="11%" align="center">&nbsp;</td>  
						<td width="14%" align="center">&nbsp;</td>
						<td width="18%" align="center">&nbsp;</td>
						</tr>  ';
			  } else {
			  
				while($row = mysql_fetch_array($countAll))
					{
		  $collection->getCollectionById(intval($row['collectionID']));    
		  $coin-> getCoinById(intval($row['coinID']));
		   
		if($collection->getCollectionFolder() == '0' && intval($row['collectrollsID']) == '0' && $collection->getGrader() == 'None' && intval($row['collectsetID']) == '0') {
			$coinIcon = '<img align="absbottom" src="../img/'.str_replace(' ', '_', $coin->getCoinVersion()).'.jpg" width="20" height="20" />&nbsp;';
		}
		else if($collection->getGrader() != 'None') {
			$coinIcon = '<img align="absbottom" src="../img/graded.jpg" width="20" height="20" /> ';
		}
		else if($collection->getCollectionFolder() != '0') {
			$collectionFolder->getCollectionFolderById($collection->getCollectionFolder());
			$coinIcon = '<a href="viewFolderDetail.php?ID='.$Encryption->encode(intval($row['collectfolderID'])).'" title="'.$collectionFolder->getFolderNickname().'"><img align="absbottom" src="../img/Folder3.jpg" width="20" height="20" /></a> ';
		}
		else if(intval($row['collectrollsID']) != '0') {
			$collectionRolls->getCollectionRollById(intval($row['collectrollsID']));
		   $coinIcon = $collectionRolls->getRollTypeIconLink(intval($row['collectrollsID']));
		}
		else if(intval($row['collectsetID']) != '0') {
			$CollectionSet->getCollectionSetById(intval($row['collectsetID']));
		   $coinIcon = '<a href="viewSetDetail.php?ID='.$Encryption->encode(intval($row['collectsetID'])).'" title="'.$CollectionSet->getSetNickname().'"><img align="absbottom" src="../img/SetIcon.jpg" width="20" height="20" /></a> ';
		}
		else { 
		   $coinIcon = '<img align="absbottom" src="../img/'.$coinLink.'.jpg" width="20" height="20" />&nbsp;&nbsp;';
		}
				
				echo '
			<tr align="center">
			<td align="left">'.$coinIcon.'<a href="viewCoinDetail.php?ID='.$Encryption->encode(intval($row['collectionID'])).'">'.$coin->getCoinName().' '.$collection->getVarietyForCoin(intval($row['collectionID'])).' '.$Errors->getErrorForCoin(intval($row['collectionID'])).'</a></td>
			<td>'. $collection->getCoinGrade() .'</td>
				<td>'.date("M j, Y",strtotime($collection->getCoinDate())) .'</td>
			<td>$'. $collection->getCoinPrice() .'</td>	   
		  </tr>
				';
					}
			  }
			  echo '</tbody>
			  <tfoot class="darker">
				<tr>
				  <td width="57%">Year / Mint</td>
				  <td width="11%" align="center">Grade</td>  
				  <td width="14%" align="center">Collected</td>
				  <td width="18%" align="center">Purchase</td>
				</tr>
				  </tfoot>
			  </table>';
			break;				
		}

}
?>







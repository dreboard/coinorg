<?php 

//TYPE VARIABLES
$getVarietyCountCollectedVar = getVarietyCountCollected($value);
$getVarietyCountVar = getVarietyCount($value);


$getCompleteCollectedVar = getCompleteCollected($value); 
$getCompleteAllVar = getCompleteAll($value);
$completePercentCalc = ((100*$getCompleteCollectedVar)/$getCompleteAllVar);
$completePercent = number_format($completePercentCalc, 0);


//By Mint Mark counts
$getMintCollectedTypeVar = getMintCollectedType($value);
$getMintCountTypeVar = getMintCountType($value);
$mintPercentCalc = ((100*$getMintCollectedTypeVar)/$getMintCountTypeVar);
$mintPercent = number_format($mintPercentCalc, 0);
?>
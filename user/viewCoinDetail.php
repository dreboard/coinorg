<?php
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";

if (isset($_GET['ID'])) {
    $collectionID = $Encryption->decode($_GET['ID']);

    if (!$collection->getCollectionById($collectionID)) {
        header("location: myCoins.php");
    } else {

        $coinType = $collection->getCoinType();
        $coinID = $collection->getCoinID();
        $coin->getCoinById($coinID);
        $coinVersion = str_replace(' ', '_', $coin->getCoinVersion());
        $coinName = $coin->getCoinName();
        $additional = $collection->getAdditional();
        $coinGrade = $collection->getCoinGrade();
        $proService = $collection->getGrader();
        $coinCategory = $coin->getCoinCategory();
        $coinSubCategory = $coin->getCoinSubCategory();
        $page->getCoinPage($coinCategory);
        $linkName = str_replace(' ', '_', $coinType);
        $categoryLink = str_replace(' ', '_', $coinCategory);
        $coinLink = str_replace(' ', '_', $coinType);
        $varietyType = $collection->getVariety();
        if ($collection->getCoinImage1() !== '../img/noPic.jpg') {
            $coinPic1 = '<img src="' . $collection->getCoinImage1() . '" class="coinImg" />';
        } else {
            $coinPic1 = '<img src="../img/' . $coinVersion . '.jpg" width="250" height="250" />';
        }
    }
}
//Delete coin
if (isset($_POST["deleteCoinFormBtn"])) {
    if (!$collection->deleteCoin($Encryption->decode($_POST["ID"]), $userID)) {
        $_SESSION['message'] = '<span class="errorTxt">Coin Not Deleted</span>';
    } else {
        header("location: viewCoin.php?coinID=" . $collection->getThisCoinsCoinID($Encryption->decode($_POST["ID"]), $userID) . "");
        exit();
    }
}
//Lock coin

if (isset($_POST["lockCoinFormBtn"])) {
    $collection->changeCoinLock($Encryption->decode($_POST["ID"]), intval($_POST["locked"]), $userID);
    header('Location: viewCoinDetail.php?ID=' . $Encryption->encode($collectionID) . '');
    exit();
}

if (isset($_POST["certRemoveBtn"])) {
    $collectionID = mysql_real_escape_string($Encryption->decode($_POST["certCoinID"]));
    mysql_query("UPDATE collection SET certlist = '0' WHERE collectionID = '$collectionID' AND userID = '$userID' ") or die(mysql_error());
    $_SESSION['message'] = '<span class="greenLink">Coin List Updated</span>';
    header('Location: viewCoinDetail.php?ID=' . $Encryption->encode($collectionID) . '');
    exit();
}

if (isset($_POST['varietyBtn'])) {
////////VARIETIES
    $ddo = mysql_real_escape_string($_POST["ddo"]);
    $ddr = mysql_real_escape_string($_POST["ddr"]);
    $rpm = mysql_real_escape_string($_POST["rpm"]);
    $omm = mysql_real_escape_string($_POST["omm"]);
    $mms = mysql_real_escape_string($_POST["mms"]);
    $odv = mysql_real_escape_string($_POST["odv"]);
    $rdv = mysql_real_escape_string($_POST["rdv"]);
    $red = mysql_real_escape_string($_POST["red"]);
    $imm = mysql_real_escape_string($_POST["imm"]);
    $dmr = mysql_real_escape_string($_POST["dmr"]);
    $mdo = mysql_real_escape_string($_POST["mdo"]);
    $mdr = mysql_real_escape_string($_POST["mdr"]);
    $rpd = mysql_real_escape_string($_POST["rpd"]);

    if ($ddo !== 'None' || $ddr !== 'None' || $rpm !== 'None' || $omm !== 'None' || $mms !== 'None' || $odv !== 'None' || $rdv !== 'None' || $red !== 'None' || $imm !== 'None' || $dmr !== 'None' || $mdo !== 'None' || $mdr !== 'None' || $rpd !== 'None') {
        $varietyCoin = '1';
    } else {
        $varietyCoin = $coin->getVarietyCoin();
    }

    $trailDieStrength = mysql_real_escape_string($_POST["trailDieStrength"]);
    $trailDieNumber = mysql_real_escape_string($_POST["trailDieNumber"]);
    $trailDieDirection = mysql_real_escape_string($_POST["trailDieDirection"]);
    $trailDieDeviation = mysql_real_escape_string($_POST["trailDieDeviation"]);

    if ($trailDieStrength !== 'None' || $trailDieNumber !== 'None' || $trailDieDirection !== 'None' || $trailDieDeviation !== 'None') {
        $trailDie = '1';
    } else {
        $trailDie = '0';
    }
////////REFERENCE
    $FSDenom = $coin->getFSDenom($coinType, $coinCategory);

    if ($_POST["fs1"] !== 'None') {
        $fsNum = mysql_real_escape_string($_POST["fs1"]) . mysql_real_escape_string($_POST["fs2"]) . mysql_real_escape_string($_POST["fs3"]);
    } else {
        $fsNum = 'None';
    }

    if ($_POST["wileyBugert"] !== 'None') {
        $wileyBugert = mysql_real_escape_string($_POST["wileyBugert"]) . $collection->addPeriodToReferenceNum($_POST["wileyBugert2"]);
    } else {
        $wileyBugert = 'None';
    }

    $sheldon = trim(mysql_real_escape_string($_POST["sheldon"]) . mysql_real_escape_string($_POST["sheldon2"]));
    $newcomb = trim(mysql_real_escape_string($_POST["newcomb"]) . mysql_real_escape_string($_POST["newcomb2"]));
    $snow = mysql_real_escape_string($_POST["snow"]);
    $fortin = trim(mysql_real_escape_string($_POST["fortin"]) . mysql_real_escape_string($_POST["fortin2"]));

    if (in_array($coin->getCoinType(), $vamTypes)) {
        $vam = $collection->processVamNum($_POST["vam1"], $_POST["vam2"], $_POST["vam3"]);
    } else {
        $vam = 'None';
    }

}

if (isset($_POST["folderCoinBtn"])) {
    $sql = mysql_query("UPDATE collection SET collectfolderID = '0' WHERE collectionID = '" . $Encryption->decode($_POST["ID"]) . "' AND userID = '$userID'") or die(mysql_error());
    if (!$sql) {
        $_SESSION['message'] = '<span class="errorTxt">Coin Not Removed</span>';
    } else {
        header('Location: viewCoinDetail.php?ID=' . $_POST["ID"] . '');
        exit();
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="icon" type="image/png" href="../img/icon.png"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?php include("../secureScripts.php"); ?>
    <link rel="stylesheet" type="text/css" href="../scripts/lightbox.css"/>
    <script type="text/javascript" src="../scripts/lightbox.js"></script>
    <script type="text/javascript" src="../scripts/images.js"></script>
    <title><?php echo $coinName ?></title>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#collectTbl').dataTable({
                "aaSorting": [[0, "desc"]],
                "iDisplayLength": 50
            });


            $("#wantForm").submit(function () {
                if ($("#coinGrade").val() == "") {
                    $("#coinGrade").addClass("errorInput");
                    return false;
                } else {
                    $('#wantBtn').val("Adding to list.....");
                    return true;
                }
            });

            $("#loginForm :input").focus(function () {
                $("label[for='" + this.id + "']").addClass("labelfocus");
            }).blur(function () {
                $("label").removeClass("labelfocus");
            });

            $("#collectionListForm").submit(function () {
                if ($("#Collection").val() == "") {
                    $("#Collection").addClass("errorInput");
                    return false;
                } else {
                    $('#collectionListBtn').val("Adding to collection.....");
                    return true;
                }
            });


        });
    </script>
    <style type="text/css">

    </style>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
    <span><?php echo $_SESSION['message']; ?></span>

    <h2 class="tblH1"><a
                href="viewListReport.php?coinType=<?php echo $coinLink ?>&amp;page=1"><?php echo '<img src="../img/' . $coinVersion . '.jpg" width="65" height="65" align="absmiddle" />'; ?></a>
        <a href="viewCoin.php?coinID=<?php echo $coinID ?>" class="brownLink"><?php echo $coinName; ?></a></h2>


    <?php include('../inc/pageElements/viewCoinLinks.php'); ?>
    <br/>
    <table width="100%" border="0">
        <tr>
            <td width="17%" class="darker">Nickname:</td>
            <td width="83%" class="brownLink"><?php echo $collection->getCoinNickname(); ?></td>
        </tr>
        <tr>
            <td width="17%" class="darker">Variety:</td>
            <td width="83%" class="brownLink"><?php echo $collection->getVarietyForCoin(intval($collectionID)); ?></td>
        </tr>
        <tr>
            <td class="darker">Errors:</td>
            <td class="brownLink"><?php echo $Errors->getErrorForCoin(intval($collectionID)); ?></td>
        </tr>
        <?php if (in_array($collection->getCoinID(), $bieCoins)) { ?>
            <tr>
                <td class="darker">BIE Type:</td>
                <td class="brownLink"><?php echo $collection->setToUndefined($collection->getBIE()); ?></td>
            </tr>
        <?php } else {
            echo '';
        } ?>
        <?php if ($collection->getCoinType() == 'Morgan Dollar') { ?>
            <tr>
                <td class="darker">Proof Like:</td>
                <td class="brownLink"><?php echo $collection->setToUndefined($collection->getMorganDesignation()); ?></td>
            </tr>
        <?php } else {
            echo '';
        } ?>
        <tr>
            <td class="tdHeight"><strong>Category:</strong></td>
            <td class="tdHeight"><a href="<?php echo $categoryLink ?>.php"><?php echo $coinCategory ?></a></td>
        </tr>
        <tr>
            <td width="17%" class="tdHeight"><span class="darker">Type: </span></td>
            <td width="83%" class="tdHeight"><a
                        href="viewListReport.php?coinType=<?php echo $coinLink ?>"><?php echo $coinType ?></a></td>
        </tr>
        <tr>
            <td class="tdHeight"><strong>Year:</strong></td>
            <td class="tdHeight"><a
                        href="viewCoinYear.php?coinType=<?php echo $coinLink ?>&year=<?php echo $coin->getCoinYear() ?>"><?php echo $coin->getCoinYear() ?></a>
            </td>
        </tr>
        <tr>
            <td class="tdHeight"><strong>Grade:</strong></td>
            <td class="tdHeight"><?php echo $coinGrade ?><?php echo $collection->getCoinAttribute($collectionID, $userID); ?>


            </td>
        </tr>
        <tr>
            <td class="tdHeight"><strong>Grading Service:</strong></td>
            <td class="tdHeight"><a
                        href="viewTypeService.php?proService=<?php echo $proService ?>&coinType=<?php echo $coinLink ?>"><?php echo $proService ?></a>
                <?php
                if ($proService !== 'None') {
                    echo $collection->getGraderNumber();
                }
                ?>
                &nbsp;
                <?php
                if ($proService == 'None') {
                    if ($collection->getCertlist() == '0') {
                        echo '(<a href="certListAdd.php?ID=' . $_GET['ID'] . '" class="greenLink">Add to Certification list</a>)';
                    } else {
                        echo '(This Coin Is On The <a href="certList.php" class="brownLinkBold">To Be Certified List</a>) <form action="" method="post" class="compactForm">
	  <input name="certCoinID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />
	  <input name="certRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove this Coin?\')" />
	  </form>';
                    }
                }
                ?></td>
        </tr>
        <tr>
            <td class="tdHeight"><span class="darker">Purchase Date: </span></td>
            <td class="tdHeight"><?php echo date("F j, Y", strtotime($collection->getCoinDate())); ?></td>
        </tr>
        <tr>
            <td class="tdHeight"><strong>Purchase Price:</strong></td>
            <td class="tdHeight">$<?php echo $collection->getCoinPrice(); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php if ($collection->getLocked() == "1"){ ?>
                    <form action="" method="post" name="unlockCoinForm" id="unlockCoinForm" class="compactForm">

                        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>"/>
                        <input name="locked" type="hidden" value="0"/>
                        <input name="lockCoinFormBtn" type="submit" value="Unlock Coin"
                               onclick="return confirm('Unlock this Coin?')"/>
                    </form>
                <?php } else { ?>
                <form action="" method="post" name="lockCoinForm" id="lockCoinForm" class="compactForm">

                    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>"/>
                    <input name="locked" type="hidden" value="1"/>
                    <input name="lockCoinFormBtn" type="submit" value="Lock Coin"
                           onclick="return confirm('Lock this Coin?')"/>
                </form>
                <form action="" method="post" name="deleteCoinForm" id="deleteCoinForm" class="compactForm">

                    <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>"/>
                    <input name="deleteCoinFormBtn" type="submit" value="Delete Coin"
                           onclick="return confirm('Delete this Coin?')"/>
                </form>
            </td>
        </tr>
    </table>
<?php } ?>

    <hr/>
    <h3><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle"/>
        Notes/Additional Details</h3>
    <p><?php echo $collection->getCoinNote(); ?></p>
    <?php
    //Edit coin or set
    if ($collection->getCollectionSet() != '0') {
        ?>

        <span><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle"/> <a
                    class="brownLinkBold"
                    href="editMintSet.php?ID=<?php echo $Encryption->encode($collection->getCollectionSet()) ?>">Edit/Add Set Details</a></span>

    <?php } else { ?>

        <span><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle"/> <a
                    class="brownLinkBold" href="viewCoinEdit.php?ID=<?php echo $Encryption->encode($collectionID) ?>">Edit/Add Details</a></span>

    <?php } ?>
    <hr/>
    <h3><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle"/> Storage
        Details</h3>

    <table width="100%" border="0">
        <tr>
            <td class="darker">Collection</td>
            <td>
                <?php
                if ($collection->getCollectionFolder() == '0' && $collection->getCollectionRoll() == '0' && $collection->getCollectionSet() == '0') {

                    $countAll = $db->dbhc->prepare("SELECT COUNT(*) FROM collection WHERE collection.userID = :userID AND collection.collectionID = :collectionID AND coincollectID != '0'");
                    $countAll->bindValue(':userID', $_SESSION['userID'], PDO::PARAM_INT);
                    $countAll->bindParam(':collectionID', $collectionID, PDO::PARAM_INT);
                    $countAll->execute();

                    //$countWant = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND coincollectID != '0' AND userID = '$userID'") or die(mysql_error());
                    if ($countAll->fetchColumn() == 0) {
                        echo 'This coin is not in a collection, Add to: 
	  <form action="" method="post" class="compactForm" id="collectionListForm">
	  <select name="Collection" id="Collection">
      <option selected="selected" value="">Select</option>
		' . $CoinCollect->getOpenList($userID) . '
    </select>
	  <input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />
	  <input id="collectionListBtn" name="collectionListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Collection?\')" />
	  </form> &nbsp;<a href="addCollection.php">Create New Collection</a>
	  ';
                    } else {

                        while ($row = mysql_fetch_array($countWant)) {
                            $coincollectID = intval($row['coincollectID']);
                            $CoinCollect->getCoinCollectionById($coincollectID);
                            echo '<a href="coinCollectionList.php?ID=' . $Encryption->encode($coincollectID) . '"><strong>' . $CoinCollect->getCoinCollectionName() . '</strong></a>&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />
	    <input id="collectionRemoveBtn" name="collectionRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Collection?\')" />
	  </form>';
                        }
                    }
                } else {
                    echo 'This coin can not be placed in a collection';
                }
                ?>
            </td>
        </tr>
        <?php
        if ($collection->getCollectionRoll() == '0' && $collection->getCollectionSet() == '0') { ?>
            <tr>
                <td width="12%" class="darker">Folder</td>
                <td width="88%">
                    <?php echo $collection->getFolderHolderNumber($collectionID, $userID) ?>
                </td>
            </tr>
        <?php } else {
            echo '';
        }
        ?>
        <?php
        if ($collection->getCollectionSet() == '0' && $collection->getCollectionFolder() == '0') { ?>
            <tr>
                <td class="darker">Roll</td>
                <td><?php echo $collection->getRollHolderNumber($collectionID, $userID) ?></td>
            </tr>
        <?php } else {
            echo '';
        }
        ?>
        <?php
        if ($collection->getCollectionSet() != '0') { ?>
            <tr>
                <td><strong> Set</strong></td>
                <td><?php echo $collection->getSetHolderNumber($collectionID, $userID) ?></td>
            </tr>
        <?php } else {
            echo '';
        } ?>

        <tr>
            <td><strong>Container</strong></td>
            <td>
                <?php
                /*$contain = mysql_query("SELECT * FROM collection WHERE collectionID = '$collectionID' AND containerID != '0' AND userID = '$userID'") or die(mysql_error());
                if(mysql_num_rows($contain) == 0){
                      echo 'This coin is not in a container, Add to:
                      <form action="" method="post" class="compactForm" id="containerListForm">
                      <select name="Collection" id="Collection">
                      <option selected="selected" value="">Select</option>
                        '.$Container->getOpenList($userID).'
                    </select>
                      <input name="ID" type="hidden" value="'.$Encryption->encode($collectionID).'" />
                      <input id="containerListBtn" name="containerListBtn" type="submit" value="Add" onclick="return confirm(\'Add to This Container?\')" />
                      </form> &nbsp;<a href="coinContainerNew.php">Save New Container</a>
                      ';
                } else {*/


                if ($collection->getCollectionFolder() == '0' && $collection->getCollectionRoll() == '0' && $collection->getCollectionSet() == '0') {
                    if ($collection->getContainerID() == '0') {
                        switch ($collection->getGrader()) {
                            case 'None':
                                echo 'This coin is not in a container, Add to: ' . $Container->getOtherBoxList($userID, $collectionID);
                                break;
                            default:
                                echo 'This coin is not in a container, Add to: ' . $Container->getSlabBoxList($userID, $collectionID);
                                break;
                        }
                    } else {

                        $Container->getContainerById($collection->getContainerID());
                        echo '<a href="coinContainerList.php?ID=' . $Encryption->encode($collection->getContainerID()) . '"><strong>' . $Container->getContainerName() . '</strong></a>&nbsp;
		<form action="" method="post" class="compactForm" id="collectionRemoveForm">
        <input name="ID" type="hidden" value="' . $Encryption->encode($collectionID) . '" />
	    <input id="containerRemoveBtn" name="containerRemoveBtn" type="submit" value="Remove" onclick="return confirm(\'Remove From Container?\')" />
	  </form>';
                    }
                } else {
                    echo 'This coin can not be placed in a container';
                }

                ?>
            </td>
        </tr>
    </table>
    <hr/>
    <h3><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle"/>
        Certification Details</h3>
    <?php if ($proService !== 'None') { ?>
        <table width="50%" border="0">
            <tr>
                <td width="28%"><strong>Slab Label:</strong></td>
                <td width="72%"><?php echo $collection->getSlabLabel(); ?></td>
            </tr>
            <tr>
                <td><strong>Designation:</strong></td>
                <td><?php echo $collection->getDesignation(); ?></td>
            </tr>
            <tr>
                <td><strong>Slab Condition:</strong></td>
                <td><?php echo $collection->getSlabCondition(); ?></td>
            </tr>
            <tr>
                <td><strong>Problem:</strong></td>
                <td><?php echo $collection->getProblem(); ?></td>
            </tr>
        </table>
    <?php } else {
        echo 'This coin is not graded by a third party';
    } ?>


    <hr/>
    <?php if ($collection->getGrader() == 'PCGS') { ?>

        <div id="wantedCoinsDiv">

        <?php if ($collection->getSetReg() != '0') { ?>

            <form class="compactForm" method="post" action="" id="addRegForm">
                <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>"/>
                <img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle"/>
                <input name="addRegBtn" id="addRegBtn" type="submit" value="Add to Registry List"/>
            </form>
            <br/>

            </div>
            <hr/>

        <?php } else {
            echo '';
        } ?>


    <?php } else {
        echo '';
    } ?>


    <form class="compactForm" method="post" action="" id="addRegForm">
        <input name="ID" type="hidden" value="<?php echo $Encryption->encode($collectionID); ?>"/>
        <img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle"/> <input
                name="addRegBtn" id="addRegBtn" type="submit" value="Add to ANACS List"/>
    </form>

    <hr/>
    <h3><img src="../img/<?php echo $coinVersion ?>.jpg" alt="11" width="30" height="30" align="absmiddle"/>
        Reference/Error Details</h3>
    <div class="floatLeft">
        <table width="995" border="0" class="floatLeft">
            <tr>
                <td><img src="../img/pencilIcon.jpg" alt="" width="20" height="20" align="absmiddle"/> <a
                            href="viewCoinVariety.php?ID=<?php echo $_GET['ID'] ?>"
                            class="brownLinkBold">Update/Edit</a></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td width="18%"><strong>Errors</strong></td>
                <td width="82%"><?php if ($Errors->getErrorForCoin(intval($collectionID)) == false) {
                        echo 'None';
                    } else {
                        echo $Errors->getErrorForCoin(intval($collectionID));
                    } ?>

                </td>
            </tr>
            <tr>
                <td><strong>Varieties</strong></td>
                <td><?php if ($collection->getVarietyForCoin(intval($collectionID)) == false) {
                        echo 'None';
                    } else {
                        echo $collection->getVarietyForCoin(intval($collectionID));
                    } ?></td>
            </tr>
            <?php if (in_array($collection->getCoinType(), $vamTypes)) { ?>
                <tr>
                    <td><strong>Van Allen / Mallis</strong></td>
                    <td><?php echo $collection->getVam(); ?></td>
                </tr>
            <?php } else {
                echo '';
            } ?>
            <tr>
                <td><strong>Fivaz-Stanton</strong></td>
                <td><?php echo $collection->getFsNum(); ?></td>
            </tr>
            <?php if (in_array($collection->getCoinType(), $sheldonTypes)) { ?>
                <tr>
                    <td><strong>Sheldon</strong></td>
                    <td><?php echo $collection->getSheldon(); ?></td>
                </tr>
            <?php } else {
                echo '';
            } ?>
            <?php if (in_array($collection->getCoinType(), $newcombTypes)) { ?>
                <tr>
                    <td><strong>Newcomb</strong></td>
                    <td><?php echo $collection->getNewcomb(); ?></td>
                </tr>
            <?php } else {
                echo '';
            } ?>
            <?php if (in_array($collection->getCoinType(), $wileyBugertTypes)) { ?>
                <tr>
                    <td><strong>Wiley-Bugert</strong></td>
                    <td><?php echo $collection->getWileyBugert(); ?></td>
                </tr>
            <?php } else {
                echo '';
            } ?>
            <?php if (in_array($collection->getCoinType(), $snowTypes)) { ?>
                <tr>
                    <td><strong>Snow</strong></td>
                    <td><?php echo $collection->getSnow(); ?></td>
                </tr>
            <?php } else {
                echo '';
            } ?>

            <?php if (in_array($collection->getCoinType(), $fortinTypes)) { ?>
            <tr>
                <td><strong>Fortin</strong></td>
                <td><?php echo $collection->getFortin(); ?></td>
            </tr>
            <tr>
                <?php } else {
                    echo '';
                } ?>

                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>


    <?php if (in_array($collection->getCoinType(), $trailTypes)) { ?>
        <table width="400" border="0" cellpadding="3" id="wexlerTbl">
            <tr>
                <td width="200"><h3> Trail Dies</h3></td>
                <td width="260"><a href="viewCoinVariety.php?ID=<?php echo $_GET['ID'] ?>">Update/Edit</a></td>
            </tr>
            <tr>
                <td><label for="trailDieStrength">Strength</label></td>
                <td><?php echo $collection->getTrailDieStrength(); ?></td>
            </tr>
            <tr>
                <td><label for="trailDieDeviation">Step Deviation</label></td>
                <td><?php echo $collection->getTrailDieDeviation(); ?></td>
            </tr>
            <tr>
                <td><label for="trailDieNumber">Number</label></td>
                <td><?php echo $collection->getTrailDieNumber(); ?></td>
            </tr>
            <tr>
                <td><label for="trailDieDirection">Offset Direction</label></td>
                <td><?php echo $collection->getTrailDieDirection(); ?></td>
            </tr>
            <tr>
                <td colspan="2"><a href="#" class="brownLink">View Full Trail Die Report</a></td>
            </tr>
        </table>
    <?php } else {
        echo '';
    } ?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><a class="topLink" href="#top">Top</a></p>
</div>

<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>
<?php 
include '../inc/config.php';
include_once "../inc/pageElements/logSession.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="../img/icon.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("../secureScripts.php"); ?>
<title>Add A Coin</title>

<link rel="stylesheet" type="text/css" href="../style.css"/>
<style type="text/css">
table img {width:15px; height:15px;}
</style>

<script type="text/javascript">
$(document).ready(function(){
$("#getYear").click(function() {
	$(this).prop('value', 'Loading Coins...');
});

});
</script>
</head>

<body>
<?php include("../inc/pageElements/navUser.php"); ?>

<div id="content" class="clear">
<h1>Add Coin</h1>

<table width="100%" border="0">
  <tr>
    <td valign="middle"><a href="addBullion.php" class="brownLink"><strong>Add Bullion Coin</strong></a>&nbsp;</td>
    <td valign="middle"><a href="addCommemorative.php" class="brownLink"><strong>Add Commemorative Coin </strong></a>&nbsp;</td>
    <td valign="middle"><form action="addCoinTypeYear.php" method="get" class="compactForm">
By Year 
<select name="century">
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select>
<select name="theYear">
<option value="00">00</option>
<option value=01>01</option><option value=02>02</option><option value=03>03</option><option value=04>04</option><option value=05>05</option><option value=06>06</option><option value=07>07</option><option value=08>08</option><option value=09>09</option><option value=10>10</option><option value=11>11</option><option value=12>12</option><option value=13>13</option><option value=14>14</option><option value=15>15</option><option value=16>16</option><option value=17>17</option><option value=18>18</option><option value=19>19</option><option value=20>20</option><option value=21>21</option><option value=22>22</option><option value=23>23</option><option value=24>24</option><option value=25>25</option><option value=26>26</option><option value=27>27</option><option value=28>28</option><option value=29>29</option><option value=30>30</option><option value=31>31</option><option value=32>32</option><option value=33>33</option><option value=34>34</option><option value=35>35</option><option value=36>36</option><option value=37>37</option><option value=38>38</option><option value=39>39</option><option value=40>40</option><option value=41>41</option><option value=42>42</option><option value=43>43</option><option value=44>44</option><option value=45>45</option><option value=46>46</option><option value=47>47</option><option value=48>48</option><option value=49>49</option><option value=50>50</option><option value=51>51</option><option value=52>52</option><option value=53>53</option><option value=54>54</option><option value=55>55</option><option value=56>56</option><option value=57>57</option><option value=58>58</option><option value=59>59</option><option value=60>60</option><option value=61>61</option><option value=62>62</option><option value=63>63</option><option value=64>64</option><option value=65>65</option><option value=66>66</option><option value=67>67</option><option value=68>68</option><option value=69>69</option><option value=70>70</option><option value=71>71</option><option value=72>72</option><option value=73>73</option><option value=74>74</option><option value=75>75</option><option value=76>76</option><option value=77>77</option><option value=78>78</option><option value=79>79</option><option value=80>80</option><option value=81>81</option><option value=82>82</option><option value=83>83</option><option value=84>84</option><option value=85>85</option><option value=86>86</option><option value=87>87</option><option value=88>88</option><option value=89>89</option><option value=90>90</option><option value=91>91</option><option value=92>92</option><option value=93>93</option><option value=94>94</option><option value=95>95</option><option value=96>96</option><option value=97>97</option><option value=98>98</option><option value=99>99</option></select>

<input name="getYear" type="submit" value="Go" id="getYear" />
</form></td>
    <td valign="middle"><a href="viewCoinHistory.php?coinID=<?php echo $coinID ?>"><img src="../img/timeIcon.jpg" alt="" width="25" height="25" align="absmiddle" /></a><a href="addHistoryAll.php" class="brownLink"><strong> View Add History</strong></a></td>
    <td>&nbsp;</td>
  </tr>
</table>


<br />

<table width="100%" border="0">
  <tr align="center">
    <td colspan="2" align="left"><h3>Add Unknown Year/Mint Categories</h3></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td width="166"><a href="addHalfCent.php"><img src="../img/Half_Cent.jpg" alt="Half Cent" name="Half_CentImg"  class="typeImg" height="80" width="80" id="Half_CentImg" /></a></td>
    <td width="166"><a href="addLargeCent.php"><img src="../img/Braided_Hair_Liberty_Head_Large_Cent.jpg" name="Braided_Hair_Liberty_Head_Large_Cent"  class="typeImg" height="100" width="100" id="Braided_Hair_Liberty_Head_Large_Cent" /></a></td>
    <td width="166"><a href="addCent.php"><img src="../img/Union_Shield.jpg" class="typeImg" height="100" width="100" id="Union_Shield" /></a></td>
    <td width="166"><a href="addTwoCent.php"><img src="../img/Two_Cent.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td width="166"><a href="addThreeCent.php"><img src="../img/Three_Cent.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td width="166"><a href="addHalfDime.php"><img src="../img/Seated_Liberty_Half_Dime.jpg" class="typeImg" height="100" width="100" /></a></td>
  </tr>  
  <tr align="center">
    <th scope="col"><a href="addHalfCent.php">Half-Cents</a></th>
    <th scope="col"><a href="addLargeCent.php">Large Cents</a></th>
    <th scope="col"><a href="addCent.php">Small Cents</a></th>
    <th scope="col"><a href="addTwoCent.php">Two Cent</a></th>
    <th scope="col"><a href="addThreeCent.php">Three Cent</a></th>
    <th scope="col"><a href="addHalfDime.php">Half Dime</a></th>
  </tr>

  <tr align="center">
    <td><a href="addNickel.php"><img src="../img/Indian_Head_Nickel.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td><a href="addDime.php"><img src="../img/Winged_Liberty_Dime.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td><a href="addTwentyCent.php"><img src="../img/Twenty_Cent_Piece.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td><a href="addQuarter.php"><img src="../img/Standing_Liberty.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td><a href="addHalfDollar.php"><img src="../img/Walking_Liberty.jpg" class="typeImg" height="100" width="100" /></a></td>
    <td><a href="addDollar.php"><img src="../img/Morgan_Dollar.jpg" class="typeImg" height="100" width="100" /></a></td>
  </tr>
  <tr align="center">
    <th scope="col"><a href="addNickel.php">Nickels</a></th>
    <th scope="col"><a href="addDime.php">Dimes</a></th>
    <th scope="col"><a href="addTwentyCent.php">Twenty Cent</a></th>
    <th scope="col"><a href="addQuarter.php">Quarters</a></th>
    <th scope="col"><a href="addHalfDollar.php">Half Dollars</a></th>
    <th scope="col"><a href="addDollar.php">Dollars</a></th>
  </tr>
</table>
<hr />

<h2>Add Raw or Slabbed Coin</h2>
<table width="100%" border="0">
  <tr>
    <td width="31%"><h3>Half Cents<a name="halfCent" id="halfCent2"></a></h3></td>
    <td width="19%">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="gryHover">
    <td><img src="../img/Liberty_Cap_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Cap (1793-1797)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Half_Cent">Add Single</a></td>
    <td width="20%"><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Cent">Add Multiple</a></td>
    <td width="30%"><a href="viewList.php?coinType=Liberty_Cap_Half_Cent">View Check List</a></td>
  </tr>
  <tr class="gryHover">
    <td><img src="../img/Draped_Bust_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Draped Bust (1800-1808)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Half_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Draped_Bust_Half_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Classic_Head_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Classic Head (1809-1836)    </td>
    <td><a href="addCoinType.php?coinType=Classic_Head_Half_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Classic_Head_Half_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Classic_Head_Half_Cent">View Check List</a></td>
    </tr>
  <tr class="gryHover">
    <td><img src="../img/Braided_Hair_Half_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Braided Hair (1840-1857)</td>
    <td><a href="addCoinType.php?coinType=Braided_Hair_Half_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Braided_Hair_Half_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Braided_Hair_Half_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><h3>Large Cents<a name="halfCent" id="halfCent2"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Flowing_Hair_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Flowing Hair (1793)</td>
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Large_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Flowing_Hair_Large_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Flowing_Hair_Large_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Cap_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Cap (1793-1796)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Large_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Large_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Liberty_Cap_Large_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Draped Bust (1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Large_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Large_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Draped_Bust_Large_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Classic_Head_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Classic Head (1808-1814)</td>
    <td><a href="addCoinType.php?coinType=Classic_Head_Large_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Classic_Head_Large_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Classic_Head_Large_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Coronet_Liberty_Head_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Coronet Liberty Head (1816-1839)</td>
    <td><a href="addCoinType.php?coinType=Coronet_Liberty_Head_Large_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Coronet_Liberty_Head_Large_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Coronet_Liberty_Head_Large_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Braided_Hair_Liberty_Head_Large_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Braided Hair (1839-1857)</td>
    <td><a href="addCoinType.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Braided_Hair_Liberty_Head_Large_Cent">View Check List</a></td>
    </tr>
  <tr>
    <td><h3>Small Cent<a name="halfCent" id="halfCent3"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Flying_Eagle.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Flying Eagle (1856-1858)</td>
    <td><a href="addCoinType.php?coinType=Flying_Eagle">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Flying_Eagle">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Flying_Eagle">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Indian_Head.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Indian Head (1859-1909)</td>
    <td><a href="addCoinType.php?coinType=Indian_Head">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Indian_Head">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Indian_Head">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Lincoln_Wheat.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Lincoln Wheat (1909-1958)</td>
    <td><a href="addCoinType.php?coinType=Lincoln_Wheat">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Lincoln_Wheat">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Lincoln_Wheat">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Lincoln_Memorial.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Lincoln Memorial (1959-2008)</td>
    <td><a href="addCoinType.php?coinType=Lincoln_Memorial">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Lincoln_Memorial">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Lincoln_Memorial">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Lincoln_Bicentennial.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Lincoln Bicentennial (2009)</td>
    <td><a href="addCoinType.php?coinType=Lincoln_Bicentennial">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Lincoln_Bicentennial">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Lincoln_Bicentennial">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Union_Shield.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Union Shield (2010-Present)</td>
    <td><a href="addCoinType.php?coinType=Union_Shield">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Union_Shield">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Union_Shield">View Check List</a></td>
    </tr>
  <tr>
    <td><h3>Two Cent<a name="halfCent" id="halfCent4"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Two_Cent_Piece.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Two Cent (1864-1873)</td>
    <td><a href="addCoinType.php?coinType=Two_Cent_Piece">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Two_Cent_Piece">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Two_Cent_Piece">View Check List</a></td>
    </tr>
  <tr>
    <td><h3>Three Cent<a name="halfCent" id="halfCent5"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Silver_Three_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Three Cent Silver</td>
    <td><a href="addCoinType.php?coinType=Silver_Three_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Silver_Three_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Silver_Three_Cent">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Nickel_Three_Cent.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Three Cent Nickel</td>
    <td><a href="addCoinType.php?coinType=Nickel_Three_Cent">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Nickel_Three_Cent">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Nickel_Three_Cent">View Check List</a></td>
  </tr>
  <tr>
    <td><h3>Half Dime<a name="halfCent" id="halfCent6"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Flowing_Hair_Half_Dime.jpg" width="250" height="250" alt="Flowing_Hair_Half_Dime" /> Flowing Hair (1794-1795)</td>
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Half_Dime">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dime">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Flowing_Hair_Half_Dime">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Half_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Draped Bust (1796-1805)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Half_Dime">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dime">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Draped_Bust_Half_Dime">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Cap_Half_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Cap (1829-1837)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Half_Dime">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dime">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Liberty_Cap_Half_Dime">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Half_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Seated Liberty (1837-1873)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Half_Dime">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dime">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Seated_Liberty_Half_Dime">View Check List</a></td>
    </tr>
  <tr>
    <td><h3>Nickel<a name="nickel" id="Nickel"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Shield_Nickel.jpg" width="250" height="250" alt="Shield_Nickel" />   Shield (1866-1883)</td>
    <td><a href="addCoinType.php?coinType=Shield_Nickel">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Shield_Nickel">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Shield_Nickel">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Head_Nickel.jpg" width="250" height="250" alt="Liberty_Head_Nickel" /> Liberty Head (1883-1913)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Head_Nickel">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Liberty_Head_Nickel">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Liberty_Head_Nickel">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Indian_Head_Nickel.jpg" width="250" height="250" alt="Indian_Head_Nickel" /> Indian Head (1913-1938)</td>
    <td><a href="addCoinType.php?coinType=Indian_Head_Nickel">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Indian_Head_Nickel">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Indian_Head_Nickel">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Jefferson_Nickel.jpg" width="250" height="250" alt="Jefferson_Nickel" /> Jefferson (1938-2003)</td>
    <td><a href="addCoinType.php?coinType=Jefferson_Nickel">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Jefferson_Nickel">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Jefferson_Nickel">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/Westward_Journey.jpg" width="250" height="250" alt="Westward_Journey" /> Westward Journey (2004-2005)</td>
    <td><a href="addCoinType.php?coinType=Westward_Journey">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Westward_Journey">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Westward_Journey">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Return_to_Monticello.jpg" width="250" height="250" alt="Return_to_Monticello" /> Return to Monticello (2006-)</td>
    <td><a href="addCoinType.php?coinType=Return_to_Monticello">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Return_to_Monticello">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Return_to_Monticello">View Check List</a></td>
    </tr>
    <tr>
      <td><h3>Dime<a name="dime" id="halfCent6"></a></h3></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td><img src="../img/Draped_Bust_Dime.jpg" width="250" height="250" alt="Draped_Bust_Dime" /> Draped Bust (1796-1807)</td>
      <td><a href="addCoinType.php?coinType=Draped_Bust_Dime">Add Single</a></td>
      <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Dime">Add Multiple</a></td>
      <td><a href="viewList.php?coinType=Draped_Bust_Dime">View Check List</a></td>
    </tr>
    <tr>
      <td><img src="../img/Liberty_Cap_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Dime" /> Liberty Cap (1809-1837)</td>
      <td><a href="addCoinType.php?coinType=Liberty_Cap_Dime">Add Single</a></td>
      <td><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Dime">Add Multiple</a></td>
      <td><a href="viewList.php?coinType=Liberty_Cap_Dime">View Check List</a></td>
    </tr>
    <tr>
      <td><img src="../img/Seated_Liberty_Dime.jpg" width="250" height="250" alt="Liberty_Cap_Half_Cent" /> Liberty Seated (1837-1873)</td>
      <td><a href="addCoinType.php?coinType=Seated_Liberty_Dime">Add Single</a></td>
      <td><a href="addCoinTypeMulti.php?coinType=Seated_Liberty_Dime">Add Multiple</a></td>
      <td><a href="viewList.php?coinType=Seated_Liberty_Dime">View Check List</a></td>
    </tr>
    <tr>
      <td><img src="../img/Barber_Dime.jpg" width="250" height="250" alt="Barber_Dime" /> Barber (1892-1916)</td>
      <td><a href="addCoinType.php?coinType=Barber_Dime">Add Single</a></td>
      <td><a href="addCoinTypeMulti.php?coinType=Barber_Dime">Add Multiple</a></td>
      <td><a href="viewList.php?coinType=Barber_Dime">View Check List</a></td>
    </tr>
    <tr>
      <td><img src="../img/Winged_Liberty_Dime.jpg" width="250" height="250" alt="Winged_Liberty_Dime" /> Winged Liberty (1916-1945)</td>
      <td><a href="addCoinType.php?coinType=Winged_Liberty_Dime">Add Single</a></td>
      <td><a href="addCoinTypeMulti.php?coinType=Winged_Liberty_Dime">Add Multiple</a></td>
      <td><a href="viewList.php?coinType=Winged_Liberty_Dime">View Check List</a></td>
    </tr>
    <tr>
      <td><img src="../img/Roosevelt_Dime.jpg" width="250" height="250" alt="Roosevelt_Dime" /> Roosevelt (1946-Present)</td>
      <td><a href="addCoinType.php?coinType=Roosevelt_Dime">Add Single</a></td>
      <td><a href="addCoinTypeMulti.php?coinType=Roosevelt_Dime">Add Multiple</a></td>
      <td><a href="viewList.php?coinType=Roosevelt_Dime">View Check List</a></td>
    </tr>
  <tr>
    <td><h3>Twenty Cents<a name="twenty" id="twenty"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Twenty_Cent_Piece.jpg" width="250" height="250" alt="Flowing_Hair_Half_Dime" /> 20 Cent Piece (1875-1878)</td>
    <td><a href="addCoinType.php?coinType=Twenty_Cent_Piece">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Twenty_Cent_Piece">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Twenty_Cent_Piece">View Check List</a></td>
    </tr>
    <tr>
    <td><h3>Quarter<a name="halfCent" id="halfCent6"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Quarter.jpg" width="250" height="250" alt="Draped_Bust_Quarter" /> Draped Bust (1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Draped_Bust_Quarter">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Capped_Bust_Quarter.jpg" width="250" height="250" alt="Capped_Bust_Quarter" /> Capped Bust (1815-1837)</td>
    <td><a href="addCoinType.php?coinType=Capped_Bust_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Capped_Bust_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Capped_Bust_Quarter">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Quarter.jpg" width="250" height="250" alt="Seated_Liberty_Quarter" /> Liberty Seated (1838-1891)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Seated_Liberty_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Seated_Liberty_Quarter">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Barber_Quarter.jpg" width="250" height="250" alt="Barber_Quarter" /> Barber (1892-1916)</td>
    <td><a href="addCoinType.php?coinType=Barber_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Barber_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Barber_Quarter">View Check List</a></td>
    </tr>
   <tr>
    <td><img src="../img/Standing_Liberty.jpg" width="250" height="250" alt="Standing_Liberty" /> Standing Liberty (1916-1930)</td>
    <td><a href="addCoinType.php?coinType=Standing_Liberty">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Standing_Liberty">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Standing_Liberty">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/Washington_Quarter.jpg" width="250" height="250" alt="Washington_Quarter" /> Washington (1931-1998)</td>
    <td><a href="addCoinType.php?coinType=Washington_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Washington_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Washington_Quarter">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/State_Quarter.jpg" width="250" height="250" alt="State_Quarter" /> Statehood (1999-2008)</td>
    <td><a href="addCoinType.php?coinType=State_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=State_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=State_Quarter">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/District_of_Columbia_and_US_Territories.jpg" width="250" height="250" alt="District_of_Columbia_and_US_Territories" /> D.C. and U. S. Territories (2009)</td>
    <td><a href="addCoinType.php?coinType=District_of_Columbia_and_US_Territories">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=District_of_Columbia_and_US_Territories">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=District_of_Columbia_and_US_Territories">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/America_the_Beautiful_Quarter.jpg" width="250" height="250" alt="America_the_Beautiful_Quarter" /> America the Beautiful (2010-2021)</td>
    <td><a href="addCoinType.php?coinType=America_the_Beautiful_Quarter">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=America_the_Beautiful_Quarter">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=America_the_Beautiful_Quarter">View Check List</a></td>
    </tr>
    <tr>
    <td><h3>Half Dollar<a name="halfDollar" id="halfCent6"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
<td><img src="../img/Flowing_Hair_Half_Dollar.jpg" width="250" height="250" alt="Flowing_Hair_Half_Dollar" /> Flowing Hair (1794-1795)</td>
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Flowing_Hair_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Flowing_Hair_Half_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Half_Dollar.jpg" width="250" height="250" alt="Draped_Bust_Half_Dollar" /> Draped Bust (1796-1807)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Draped_Bust_Half_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Liberty_Cap_Half_Dollar.jpg" width="250" height="250" alt="Liberty_Cap_Half_Dollar" /> Liberty Cap (1807-1839)</td>
    <td><a href="addCoinType.php?coinType=Liberty_Cap_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Liberty_Cap_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Liberty_Cap_Half_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Half_Dollar.jpg" width="250" height="250" alt="Seated_Liberty_Half_Dollar" /> Seated Liberty (1839-1891)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Seated_Liberty_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Seated_Liberty_Half_Dollar">View Check List</a></td>
    </tr>
   <tr>
    <td><img src="../img/Barber_Half_Dollar.jpg" width="250" height="250" alt="Barber_Half_Dollar" /> Barber (1892-1916)</td>
    <td><a href="addCoinType.php?coinType=Barber_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Barber_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Barber_Half_Dollar">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/Walking_Liberty.jpg" width="250" height="250" alt="Walking_Liberty" /> Walking Liberty (1916-1947)</td>
    <td><a href="addCoinType.php?coinType=Walking_Liberty">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Walking_Liberty">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Walking_Liberty">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/Franklin_Half_Dollar.jpg" width="250" height="250" alt="Franklin_Half_Dollar" /> Franklin (1948-1963)</td>
    <td><a href="addCoinType.php?coinType=Franklin_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Franklin_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Franklin_Half_Dollar">View Check List</a></td>
    </tr>
      <tr>
    <td><img src="../img/Kennedy_Half_Dollar.jpg" width="250" height="250" alt="Kennedy_Half_Dollar" /> Kennedy (1964-Present)</td>
    <td><a href="addCoinType.php?coinType=Kennedy_Half_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Kennedy_Half_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Kennedy_Half_Dollar">View Check List</a></td>
    <tr>
    <td><h3>Dollar<a name="dollar" id="halfCent6"></a></h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="../img/Flowing_Hair_Dollar.jpg" width="250" height="250" alt="Flowing_Hair_Dollar" /> Flowing Hair (1794-1795)</td>
    <td><a href="addCoinType.php?coinType=Flowing_Hair_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Flowing_Hair_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Flowing_Hair_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Draped_Bust_Dollar.jpg" width="250" height="250" alt="Draped_Bust_Dollar" /> Draped Bust (1795-1804)</td>
    <td><a href="addCoinType.php?coinType=Draped_Bust_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Draped_Bust_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Draped_Bust_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Gobrecht_Dollar.jpg" width="250" height="250" alt="Gobrecht_Dollar" /> Gobrecht (1836-1839)</td>
    <td><a href="addCoinType.php?coinType=Gobrecht_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Gobrecht_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Gobrecht_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Seated_Liberty_Dollar.jpg" width="250" height="250" alt="Seated_Liberty_Dollar" /> Seated Liberty (1836-1873)</td>
    <td><a href="addCoinType.php?coinType=Seated_Liberty_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Seated_Liberty_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Seated_Liberty_Dollar">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Trade_Dollar.jpg" width="250" height="250" alt="Trade_Dollar" /> Trade (1892-1916)</td>
    <td><a href="addCoinType.php?coinType=Trade_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Trade_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Trade_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Morgan_Dollar.jpg" width="250" height="250" alt="Morgan_Dollar" /> Morgan (1878-1904, 1921)</td>
    <td><a href="addCoinType.php?coinType=Morgan_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Morgan_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Morgan_Dollar">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Peace_Dollar.jpg" width="250" height="250" alt="Peace_Dollar" /> Peace (1921-1928, 1934, 1935)</td>
    <td><a href="addCoinType.php?coinType=Peace_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Peace_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Peace_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Eisenhower_Dollar.jpg" width="250" height="250" alt="Eisenhower_Dollar" /> Eisenhower (1971-1978)</td>
    <td><a href="addCoinType.php?coinType=Eisenhower_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Eisenhower_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Eisenhower_Dollar">View Check List</a></td>
  </tr>
  <tr>
    <td><img src="../img/Susan_B_Anthony_Dollar.jpg" width="250" height="250" alt="Susan_B_Anthony_Dollar" /> Susan B Anthony (1979–1981, 1999)</td>
    <td><a href="addCoinType.php?coinType=Susan_B_Anthony_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Susan_B_Anthony_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Susan_B_Anthony_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Sacagawea_Dollar.jpg" width="250" height="250" alt="Sacagawea_Dollar" /> Sacagawea (2000-Present)</td>
    <td><a href="addCoinType.php?coinType=Sacagawea_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Sacagawea_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Sacagawea_Dollar">View Check List</a></td>
    </tr>
  <tr>
    <td><img src="../img/Presidential_Dollar.jpg" width="250" height="250" alt="Presidential_Dollar" /> Presidential (2007-Present)</td>
    <td><a href="addCoinType.php?coinType=Presidential_Dollar">Add Single</a></td>
    <td><a href="addCoinTypeMulti.php?coinType=Presidential_Dollar">Add Multiple</a></td>
    <td><a href="viewList.php?coinType=Presidential_Dollar">View Check List</a></td>
    </tr>
    <tr>
    <td><h3>&nbsp;</h3></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<p>&nbsp;</p>
</div>
<?php include("../inc/pageElements/footer.php"); ?>
</body>
</html>

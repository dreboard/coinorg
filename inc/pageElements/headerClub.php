<script type="text/javascript">
jQuery(document).bind('ready', function(event) {
 jQuery('.placeholder').each(function(i) {
 
 var item = jQuery(this);
 var text = item.attr('rel');
 var form = item.parents('form:first');

 if (item.val() === '') 
 {
 item.val(text);
 item.css('color', '#888');
 }
 
 item.bind('focus.placeholder', function(event) {
 if (item.val() === text)
 item.val('');
 item.css('color', '');
 });
 
 item.bind('blur.placeholder', function(event) {
 if (item.val() === '')
 {
 item.val(text);
 item.css('color', '#888');
 }
 });
 
 form.bind("submit.placeholder", function(event) {
 if (item.val() === text)
 item.val("");
 }); 
 
 });
 
 $("#searchForm").submit(function() {
      if ($("#search").val() == "" || ("$search").val() == 'Find Member') {
		$("#search").addClass("errorInput");
		$("label[for=search]").addClass("errorTxt");
        return false;
      }else {
	  return true;
	  }
});	
 
});
</script>  
<div id="topDiv"><div id="headerContent"><table width="100%" border="0" class="headerTbl">
  <tr>
    <td colspan="7" rowspan="4"><a href="index.php"><img src="http://mycoinorganizer.com/img/logo.jpg" alt="My Coin Organizer" name="headerLogo" width="361" height="198" align="left" id="headerLogo" /></a><span class="topNav3"><a href="index.php">Home</a> | <a href="../logout.php">Logout</a></span>&nbsp;&nbsp;
      
<h2 class="clear">The Worlds Best Coin Collecting Software</h2></td>
    <td valign="top"><form id="searchForm" name="searchForm" method="post" action="search.php" class="compactForm">
        <input name="search" id="search" type="text" class="placeholder" rel="Find Member" />
        <input name="searchCalendarBtn" id="searchCalendarBtn" type="submit" value="Search" />
      </form></td>

  </tr>
  <tr>
    <td align="right" valign="top"><a href="accountEdit.php">Edit Club Account</a></td>
  </tr>
  <tr>
    <td align="right" valign="top"><a href="../../user/index.php">Club Collection</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" id="navLinks" border="0" class="headerTbl">
  <tr align="center" valign="middle">
    <td width="16%"><a href="index.php">Home</a></td>
    <td width="16%"><a href="video.php">Videos</a></td>
    <td width="16"><a href="eventNew.php">New Event</a></td>
    <td width="16%"><a href="eventCalendar.php">Calendar</a></td>
    <td width="16%"><a href="members.php">Members</a></td>
    <td width="16%"><a href="meetings.php">Meetings</a></td>
  </tr>  
  
</table></div></div>
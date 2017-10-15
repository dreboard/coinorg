<?php 
include '../inc/config.php';
include "../inc/pageElements/logSession.php";
if(isset($_GET['ID'])) {  
	$noteID = $Encryption->decode($_GET['ID']);
    $Note->getNoteByID($noteID);
}

if (isset($_GET["delete"])) { 
  $Note->deleteNote($userID, $Encryption->decode($_GET['delete']));
  header("location: userNotes.php");
  exit();
}

if (isset($_POST["saveNoteBtn"])) { 
if($_POST['noteTitle'] == '') {
	$_SESSION['errorMsg'] = 'Please Enter A Title';
	} else {
	mysql_query("UPDATE notes SET noteTitle = '".mysql_real_escape_string($_POST["noteTitle"])."', note = '".mysql_real_escape_string($_POST["note"])."', noteDate = '$theDate' WHERE noteID = '".$Encryption->decode($_POST['ID'])."' ") or die(mysql_error()); 	
	header("location: userNote.php?ID=".$_POST['ID']."");
	exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Note Viewer</title>
<?php include("../headItems.php"); ?>
<script src="../scripts/plugins/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function(){	
    $('.confirmLnk').on('click', function () {
        return confirm('Are you sure?');
    });
});

        tinymce.init({
		selector:'textarea',
	    plugins: "print searchreplace code table",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
					autosave_ask_before_unload: false,
					max_height: 400,
					min_height: 260,
					height : 280
		});
</script>
<style type="text/css">
#textarea {width:99%; height:600px;}
</style>
</head>

<body>
<?php include("../inc/pageElements/bt-nav.php"); ?>
     
<div class="container">
  <div class="btn-group btn-group-justified">
  <div class="btn-group">
  <a href="userCalendar.php" class="btn btn-default confirmLnk" role="button">Calendar</a>
  </div>
  <div class="btn-group">
    <a href="userNotes.php" class="btn btn-default" role="button">Notebook</a>
  </div>
  <div class="btn-group">
    <a href="#" class="btn btn-default" role="button">Gallery</a>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading"><h3 class="noMargin"><span class="glyphicon glyphicon-pencil"></span> <?php echo $Note->getNoteTitle(); ?></h3></div>
  <div class="panel-body">


      
<div class="input-group">
<select class="form-control" onchange="window.open(this.options[this.selectedIndex].value,'_top')">
  <?php 
  	$sql = mysql_query("SELECT * FROM notes WHERE userID = '$userID'") or die(mysql_error());
if(mysql_num_rows($sql) == 0){
	  echo '<option value="" selected="selected">No Saved Notes</option>';
} else {
	echo '<option value="" selected="selected">Load Note</option>';
		while($row = mysql_fetch_array($sql))
		{
			echo '<option value="userNote.php?ID='.$Encryption->encode(intval($row['noteID'])).'">'.substr(strip_tags($row['noteTitle']), 0, 70).'</option>';
		}
}
  ?>        
</select>
  <div class="input-group-btn">
    <a class="btn btn-default btn-danger confirmLnk" role="button" href="userNoteBOOTS.php?delete=<?php echo $_GET['ID'] ?>"> Delete Note</a>
  </div>
</div>
<hr>

<form class="form-horizontal" role="form">
  <div class="form-group">
    <div class="col-sm-10">
      <input type="text" value="<?php echo $Note->getNoteTitle(); ?>" class="form-control" id="noteTitle" placeholder="Note Title:">
    </div>
  </div>  
  
  
  <div class="form-group">
  <div class="col-lg-10">
  <textarea id="textarea" class="form-control" name="note">
  <?php echo $Note->getNote(); ?>
  </textarea>
  </div>
  </div>  

  <div class="form-group">
  <div class="col-lg-10">
  <input name="ID" type="hidden" value="<?php echo $_GET['ID'] ?>" />
      <button type="submit" name="saveNoteBtn" class="btn btn-primary">Save</button>
      
  </div>  
  </div>

</form>
</div>

</div>
<p><a class="topLink" href="#top">Top</a></p>


<?php include("../inc/pageElements/bt-footer.php"); ?>
</div><!--/.container -->


</body>
</html>
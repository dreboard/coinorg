<?php 
include "../inc/config.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
</head>
<body>
<h1>User Site 1.0</h1>
<?php if(isset($_SESSION['logged_in'])) : ?>  
<p><?php echo 'logged in'; ?></p>
    <?php $user = unserialize($_SESSION['user']); ?>  
    Hello, <?php echo $user->email; ?>. You are logged in. <a href="logout.php">Logout</a> | <a href="edit.php">Change Email</a>  
<?php else : ?>  
    You are not logged in. <a href="login.php">Log In</a> | <a href="register.php">Register</a>  <br />
<?php endif; ?>  

<h2>The DB Class </h2>
<p>$data = array( <br />
  &quot;username&quot; =&gt; &quot;'johndoe'&quot;, <br />
  &quot;email&quot; =&gt; &quot;'johndoe@email.com'&quot; <br />
  ); <br />
  <br />
  //Find the user with id = 3 in the database and update the row <br />
  //the username to johndoe and the email to johndoe@email.com <br />
  $db-&gt;update($data, 'users', 'id = 3'); </p>

<h3>Using the get() Function</h3>
<p>This function takes a unique user id and queries the database using   the DB class’s select() function. It will take the associative array   returned by the select() function containing the user row and pass   create and new User object, passing that array into the constructor.   This User object is then returned. Where might you use this? Lots of places. For example if you create a   page that displays users public profiles, you’ll need to dynamically   grab their information and display it. Here’s how you might do that:   (let’s say the URL is http://www.website.com/profile.php?userID=3)</p>
<p>$tools = new UserTools(); <br />
  $user = $tools-&gt;get($_REQUEST['userID']); <br />
  <br />
  echo &quot;Username: &quot;.$user-&gt;username.&quot;&quot;; <br />
echo &quot;Joined On: &quot;.$user-&gt;joinDate.&quot;&quot;; </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>

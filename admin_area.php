<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Area</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="jquery-easyui-1.4.5/themes/gray/easyui.css">
 <link rel="stylesheet" type="text/css" href="jquery-easyui-1.4.5/themes/icon.css">
 <link rel="stylesheet" type="text/css" href="jquery-easyui-1.4.5/demo.css">
 <script src="js/jquery-1.11.0.min.js"></script>
 <script src="js/js.js"></script>
 <script type="text/javascript" src="jquery-easyui-1.4.5/jquery.min.js"></script>
 <script type="text/javascript" src="jquery-easyui-1.4.5/jquery.easyui.min.js"></script>
</head>
<?php 		
session_start();
$session_username = $_SESSION['username'];
$session_access = $_SESSION['access'];
$session_name = $_SESSION['name'];
$session_dob = $_SESSION['dob'];
$session_email = $_SESSION['email'];
$session_id = $_SESSION['id'];
if(empty($session_username))
{
	header("Location: login.html");
}
?>
<body>
<header>
</header>
<div class="topBanner fl"></div>
<div class="nav fl">
	<ul class="warp">
		<li><a href="home_page.php"  class="on">Home Page</a></li>
		<li><a href="my_area.php">My Area</a></li>
		<?php if($session_access == 1){
		       echo "<li><a href='admin_area.php'>Admin Area</a></li>";
		}
		?>
        <li><a href='feedback.php'>Student Feedback</a></li>
		<li><a href="contact_us.php">Contact us</a></li>
		<div class="fr" id="home_page_date_time"></div>
        <div class="fr mr10">
		<?php 
		  if(empty($session_username)){
			  echo "<a href='login.html'>Please login</a>";
		  }
		  else{
		    echo "Welcome ".$session_name."<a href='#' onClick='log_out()'> Log Out</a>";
		  }
		 ?>
       </div>
	</ul>
</div>
<div class="warp mt100">
 <div class="fl">
  <div class="easyui-panel" title="Admin Area" style="width:400px; height:570px;">
    <div class="feedback_form">
        <form id="admin_area_form" method="post" action="action.php">
        <div class="mt10">
         <label><p class="fl mr10">Username:</p><input  type="text" name="admin_area_username" value="<?php echo $session_username  ?>"  disabled/></label> 
        </div>
        <div class="mt10">
         <label><p class="fl mr10">Password:</p><input  type="password" id="admin_area_password" name="admin_area_password"/></label> <input type="button" id="admin_verify_button" value="verify" onClick="verifyPassword('admin')" />
        </div>
        </form>

    </div>
  </div>
 </div> 
 <div id="user_management_panel" class="fr">
  <div class="easyui-panel" title="User Management" style="width:800px; height:570px;">
    <table id="user_management_table" class="ml30 mt10">
    <th>ID</th>
    <th>Username</th>
    <th>Name</th>
    <th>Birthday</th>
    <th>Email</th>
    <th>Access</th>
    <th>Operation</th>
    </table>

   </div>
 </div>
</div>


<!--footer-->
<footer class="fl mt10">

<div class="warp">© Copyright 2016 Penghai Zhang</div>
</footer>

<script>

$('#user_management_table').hide();




</script>

</body>
</html>

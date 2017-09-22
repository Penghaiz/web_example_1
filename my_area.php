<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>My Area</title>
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
  <div class="easyui-panel" title="My Area" style="width:400px; height:570px;">
    <div class="feedback_form">
        <form id="my_area_form" method="post" action="action.php">
        <input type="hidden" name="id" id="id" value="<?php echo $session_id  ?>" />
        <div class="mt10">
         <label><p class="fl mr10">Username:</p><input  type="text" name="my_area_username" value="<?php echo $session_username  ?>"  disabled/></label> 
        </div>
        <div class="mt10">
         <label><p class="fl mr10">Password:</p><input  type="password" id="my_area_password" name="my_area_password"/></label> <input type="button" value="verify" onClick="verifyPassword('my')" id="my_verify_button"/>
        </div>
        
        <div class="mt10" id="my_area_name_panel">
         <label><p class="fl mr10">Name:</p><input  type="text" id="my_area_name" name="my_area_name" value="<?php echo $session_name  ?>"  /></label> 
        </div>
        
        <div class="mt10" id="my_area_birthday_panel" >
         <label><p class="fl mr10">Birthday:</p></label>  <input id="my_area_birthday" name="my_area_birthday" value="<?php echo $session_dob  ?>"class="easyui-datebox" data-options="formatter:myformatter,parser:myparser"/>
        </div>    
                
        <div class="mt10" id="my_area_email_panel">
         <label><p class="fl mr10">Email:</p><input  type="text" id="my_area_email" name="my_area_email" value="<?php echo $session_email  ?>"  /></label> 
        </div>          
        
        </form>
        <div style="text-align:center;padding:5px" id="my_area_button_panel">
            <a href="javascript:void(0)" class="easyui-linkbutton" onClick="my_area_submit()">Submit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onClick="clearForm('#my_area_form')">Reset</a>
        </div>
    </div>
  </div>
 </div> 
 <div id="feedback_information" class="fr">
  <div class="easyui-panel" title="Public Comment" style="width:800px; height:570px;">
    <h2><marquee direction="left" behavior="scroll" scrollamount="5" scrolldelay="0" loop="-1" width="780" height="40" hspace="10" vspace="10">This Website provides a lot of information about uni, So I like it...
    </marquee></h2>
    
     <h2><marquee direction="left" behavior="scroll" scrollamount="3" scrolldelay="0" loop="-1" width="780" height="40" hspace="10" vspace="10">Hello, I am Clay Thompson...I like to play basketball, so Klay Thompson is my idol..
    </marquee></h2>
    
     <h2 style="padding-top:200px;"><marquee direction="right" behavior="scroll" scrollamount="3" scrolldelay="0" loop="-1" width="780" height="40" hspace="10" vspace="10">To visit the website, I have to ensure my laptop is connected with the VPN. 
    </marquee></h2>
    
   </div>
 </div>
</div>


<!--footer-->
<footer class="fl mt10">

<div class="warp">© Copyright 2016 Penghai Zhang</div>
</footer>

<script>
$('#my_area_email_panel').hide();
$('#my_area_birthday_panel').hide();
$('#my_area_name_panel').hide();
$('#my_area_button_panel').hide();
</script>

</body>
</html>

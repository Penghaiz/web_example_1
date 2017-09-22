<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Feedback</title>
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
  <div class="easyui-panel" title="Feedback Form" style="width:400px; height:570px;">
    <div class="feedback_form">
        <form id="feedback_form" method="post" action="action.php">
        <div class="mt10">
         <p class="fl mr10">Gender:</p>
         <label><input  type="radio" name="gender" value="male" checked/> male </label>
         <label><input  type="radio" name="gender" value="female"/> female </label>
        </div>
        <div class="mt10">
         <p class="fl mr10">State:</p>
         <select class="easyui-combobox" name="state" style="width:60px;" id="state">
          <option value=""></option>
           <option value="ACT">ACT</option><option value="TAS">TAS</option>
          <option value="NSW">NSW</option><option value="NT">NT</option>
          <option value="QLD">QLD</option><option value="SA">SA</option>
          <option value="WA">WA</option><option value="VIC">VIC</option>
         </select>
        </div>
        <div class="mt10" id="city_panel">
         <p class="fl mr10">City:</p>
         <select class="easyui-combobox" name="city" style="width:60px;" id="city">
         </select>
        </div>
        <div class="mt10">
         <p class="fl mr10">Satisfaction:</p>
         <label><input  type="radio" name="satisfaction" value="satisfied" checked/> satisfied </label>
         <label><input  type="radio" name="satisfaction" value="not satisfied"/> not satisfied </label>
        </div>
        </form>
        <div style="text-align:center;padding:5px">
            <a href="javascript:void(0)" class="easyui-linkbutton" onClick="feedback_submit()">Submit</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" onClick="clearForm('feedback_form')">Reset</a>
        </div>
        <div class="mt30">
        <img src="images/feedback.png">
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

$('#city_panel').hide();
$('#city').combobox({
valueField:'city_name',
textField:'text'
});
$('#state').combobox({
	onSelect: function(reg){
city_array = [];
switch(reg.value){
	case 'TAS' : 
	  city_array.push({ "text": "HOBART","city_name":"HOBART"});
	  city_array.push({ "text": "LAUNCESTON","city_name":"LAUNCESTON"});break;

	case 'ACT' : 
	  city_array.push({ "text": "CANBERRA","city_name":"CANBERRA"});
	  break;
	case 'NSW' : 
	  city_array.push({ "text": "SYDNEY","city_name":"SYDNEY"});
	  break;
	case 'QLD' : 
	  city_array.push({ "text": "BRISBANE","city_name":"BRISBANE"});
	  break;
	case 'SA' : 
	  city_array.push({ "text": "ADELAIDE","city_name":"ADELAIDE"});
	  break;
	case 'WA' : 
	  city_array.push({ "text": "PERTH","city_name":"PERTH"});
	  break;
	case 'NT' : 
	  city_array.push({ "text": "DARWIN","city_name":"DARWIN"});
	  break;
	case 'VIC' : 
	  city_array.push({ "text": "MELBOUNNE","city_name":"MELBOUNNE"});
	  break;
}
	$("#city").combobox("loadData", city_array);
	$('#city_panel').show();

			}
})


</script>

</body>
</html>

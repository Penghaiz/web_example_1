<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Assignment2-Student Feedback</title>
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

?>
<body>
<!--header-->
<header>
</header>
<!--body-->
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
<div class="warp mt100 contact">
  <div class="easyui-panel" title="Contact Us" style="width:960px; height:600px;">
      <div class="contTitle">
          <div class="contactTitle">Welcome to</div>
          <div class="contactTetles">the university of Tasmania </div>
          <div class="contment">
The University of Tasmania (UTAS) is a public research university primarily located in Tasmania, Australia. Officially founded in 1890, it was the fourth university to be established in Australia, although Christ College, which became affiliated with the university in 1929, was established in 1846 and remains the oldest form of higher education in the country. The University of Tasmania is a sandstone university and is a member of the international Association of Commonwealth Universities and the Association of Southeast Asian Institutions of Higher Learning.
          </div>
      </div>
      <div class="contactUs">
          <h3>info</h3>
        <div class="info">
          <div class="left"><span class="adds"></span></div>
          <div class="right">Campus in Hobart : Churchill Avenue 7005<Br>Campus in Launceston : Newnham Drive 7250 </div>
      </div>
          <div class="info">
              <div class="left"><span class="tel"></span></div>
              <div class="right">
                  <ul>
                      <li> ACT: 0421111111</li>
                      <li> NSW: 0421111112</li>
                      <li> NT : 0421111113</li><Br>
                      <li> QLD: 0421111114</li>
                      <li> SA : 0421111115</li>
                      <li> TAS: 0421111116</li><Br>
                      <li> VIC: 0421111117</li>
                      <li> WA : 0421111118</li>
                  </ul>
              </div>
          </div>
          <!--<div class="info">-->
              <!--<div class="left"><span class="email"></span></div>-->
              <!--<div class="right pt20">12345678@163.com </div>-->
          <!--</div>-->
          <div class="infobt"></div>
      </div>


  </div>
</div>


<!--footer-->
<footer class="fl mt10">
<div class="warp">© Copyright 2016 Penghai Zhang</div>
</footer>
</body>
</html>

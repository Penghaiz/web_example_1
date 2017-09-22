<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home Page</title>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/js.js"></script>
</head>
<?php 		
session_start();
$session_username = $_SESSION['username'];
$session_access = $_SESSION['access'];
$name = $_SESSION['name'];
?>
<body>
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
		    echo "Welcome ".$name."<a href='#' onClick='log_out()'> Log Out</a>";
		  }
		 ?>
       </div>
	</ul>
</div>
<div class="dome fl mt10">
	<div class="warp">
		<div id="teacher" class="teacher fl">
			<ul class="fl">
				<li name="first"><img class="initial_img" src="images/TimCook.jpg"></li>
				<li name="second"><img class="initial_img" src="images/MirandaKerr.jpg"></li>
				<li name="third"><img class="initial_img" src="images/YaoMing.jpg"></li>
			</ul>
            <ul class="fl">
				<li name="first"><div class="name" id="first_name"></div></li>
				<li name="second"><div class="name" id="second_name"></div></li>
				<li name="third"><div class="name" id="third_name"></div></li>
			</ul>
			<div class="tips " id="introduction">
				<div class="title">Welcome to my website</div>
				<p>This is Penghai's assignment3 of KIT502</p>
                <br>
                <span id="more_information">Upcoming activities are showed below</span>
			</div>
		</div>
   </div>
</div>
<div class="dome fl">
<div class="warp  activity ">
  <div class="activity_left_top fl">
    <ul>
      <li> <img id="activity_img1" src="images/act1.png"></li>
      <li> <img id="activity_img2" src="images/act2.png"></li>
    </ul>
  </div>
  <div class="activity_right_top fr">
    <p id="activity_word1" class="ml30">A excellent barbecue will be undertaken at Ronsy Park on 20 Aprial 2016. All students are welcome, especially new International students. Beef, chicken, prawns and red wine are provided for free as well as various vegetables. So no matter whether you are fond of meet or a vegetarian, we are very sure that you will enjoy this happy time. </p>
    <div class="join ml60 mt10">JOIN</div>
  </div>

  <div class="activity_right_bottom fl">
    <p id="activity_word2" class="mt10">There will be a hiking activity on 20 May on MT Wellingtom. MT Wellingtom, which is officially known as kunanyi Mount Wellington, is a mountain in the southeast coastal region of Tasmania, Australia. The mountain is the summit of the Wellington Range on whose foothills is built much of the city of Hobart.</p>
    <div class="join  mt10">JOIN</div>
  </div>
  <div class="activity_right_bottom ">
    <ul>
     <li> <img id="activity_img3" src="images/act3.png"></li>
     <li> <img id="activity_img4" src="images/act4.png"></li>
    </ul>
    </div>
</div>
</div>

<!--footer-->
<footer class="fl mt10">
<div class="warp">© Copyright 2016 Penghai Zhang</div>
</footer>
</body>
<script>
get_teacher_info();

</script>
</html>

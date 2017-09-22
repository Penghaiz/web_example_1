
 
 <?php
/* author: Penghai Zhang
 * date : 08-04-2016
 */
 require("db_conf.php");
 $db = new db_assignment3();
 $submit= $_POST["submit"];
 
//the following codes are used to implement functions needed in sign-up page
 if($submit == "sign_up_submit"){	 
   $username= $_POST["username"];
   $password= $_POST["password"];
   $re_password= $_POST["re_password"];
   $firstname= $_POST["firstname"];
   $lastname= $_POST["lastname"];
   $email= $_POST["email"];
   $year= $_POST["year"];   
   $month= $_POST["month"];
   $day= $_POST["day"];
   $birthday = 0;
  
   //validate username by  regular expression 
   $reg= "/[A-Za-z]/";
   if(!preg_match($reg,$username)){
	 echo "Sorry, your username must contain one letter!"; 
	 exit();
	}
   if(empty($firstname))
	{
	 echo "Sorry, your first name can not be empty!"; 
	 exit();
	}
   if(empty($lastname))
	{
	 echo "Sorry, your last name can not be empty!"; 
	 exit();
	}
   //validate password
   if ($password != $re_password){
	   echo "Sorry, your Re-type Password must match your password!";
	   exit();
   }
   else if ( strlen($password) != strlen(str_replace(" ", "", $password)) ){
	   echo "Sorry, a password is not allowd to have any spaces!";
	   exit();
   }
   else if( strlen($password) < 8){
	   echo "Sorry, your password must contain 8 characters at least!";
	   exit();
   }
   else{
	   $password = md5($password);
   }
   //validate birthday
   if (empty($year)){
	   echo "Sorry, the year of your birthday are not allowed to be empty!";
	   exit();
   }
   else if (empty($month)){
	   echo "Sorry, the month of your birthday are not allowed to be empty!";
	   exit();
   }
   else if (empty($day)){
	   echo "Sorry, the day of your birthday are not allowed to be empty!";
	   exit();
   }
   else{
	   $birthday = $year."".($month < 10 ? '0'.$month : $month)."".($day < 10 ? '0'.$day : $day);
   }	 
   
	   $count = $db->users_select_count($username);;
		
		if( $count > 0)
		{
			echo "Sorry, the username has been taken.";
		}
		else
		{
	     $result = $db->users_insert($username,$password,$firstname,$lastname,$email,$birthday);
		 if($result){
			 echo "congratulation! Register successfully.";
		 }
		 else{
			 echo "Sorry.Please try again later.";
		 }	
		}	   
 }
 
 //the following codes are used to implement functions needed in login page
 if($submit == "login_submit"){	
    $username= $_POST["username"];
    $password= md5($_POST["password"]);
	
	$count = $db->users_select_count($username,$password);
	if( $count > 0)
	{
		
		$list = $db->users_select($username,$password);
		
		session_start();
		$_SESSION['username']= $list[0][0];
		$_SESSION['name']= $list[0][1];
		$_SESSION['access']= $list[0][2];
		$_SESSION['dob']= $list[0][3];
		$_SESSION['email']= $list[0][4];
		$_SESSION['id']= $list[0][5];
		$_SESSION['password']= $list[0][6];
		echo "login successfully";
	}
	else{
		echo "Sorry. The account or password you typed is not correct.";
	}
 }
 //destroy the session
 if($submit == "logout_submit"){
	 session_start();
	 session_destroy();
 }
 //get teachers' details, the access is 1 and sorting is needed. The result list must be converted into a json string and sent back to home page	
  if($submit == "home_page_request"){
   $list = $db->users_select('','',1,'sort');
		echo json_encode($list);
 }
 
 if($submit == "feedback_submit"){
	 $state = $_POST["state"];
	 $city = $_POST["city"];
	 $gender = $_POST["gender"];
	 $satisfaction = $_POST["satisfaction"];
	 $result = $db->feedback_insert($state,$city,$gender,$satisfaction);
		if($result){
			 echo "Thank you for feedback.";
		 }
		 else{
			 echo "Sorry.Please try again later.";
		 }		 
	 
 }
 // verify if the password typed in my area page is identical to that stored in session.
 if($submit == "my_area_verify"){
	$password= md5($_POST["password"]);
	session_start();
	if($password == $_SESSION["password"] ){
		echo "ok";
	}
	else{
		echo "Please type the correct password.";
	}
 }
 //update data  in database and in session
 if($submit == "my_area_update"){
	 $password= md5($_POST["password"]);
	 $email= $_POST["email"];
	 $dob= $_POST["birthday"];
	 $name= $_POST["name"];
	 $id = $_POST["id"];
	 $result = $db->users_update($id,$password,$name,$dob,$email);
		if($result){
			session_start();
			$_SESSION["password"] = $password;
			$_SESSION["email"] = $email;
			$_SESSION["dob"] = $dob;
			$_SESSION["name"] = $name;			
			 echo "Update your details successfully.";
		 }
		 else{
			 echo "Sorry.Please try again later.";
		 }	
 }
 
 if($submit == "admin_area_verify"){
	$password= md5($_POST["password"]);
	session_start();
	if($password == $_SESSION["password"] ){
		$list = $db->users_select('','','','');
		echo json_encode($list);	
	}
	else{
		echo "Please type the correct password.";
	}	 	 
 }
 
 if($submit == "update_access")
 {
	 $id= $_POST["id"];
	 $access= $_POST["access"];
	 $result = $db->access_update($id,$access);
		if($result){		
			 echo "Update successfully.";
		 }
 }
 
?>
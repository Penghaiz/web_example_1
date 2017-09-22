
<?php
//Define the variables used for connection to mysql.

class db_assignment3{
	
public  $conn;

function __construct(){
	$db_server = 'localhost';
    $db_username = 'penghaiz';
    $db_password = '411766';
    $db_name = 'penghaiz';
	$conn = $this->conn = new mysqli($db_server,$db_username,$db_password,$db_name); 
	 if ($conn->connect_error) {
      die('Sorry. The database does not respond now. Please try again later. Error : ('. $conn->connect_errno .') '. $conn->connect_error);
	  }
}
function __destruct()
{
	$conn = $this->conn;
	$conn->close();
	
}

public function users_select($username,$password,$access,$sort){
		$conn = $this->conn;
		$list = array();
		$query = "select * from users where 1 = 1";
		if(!empty($username)){
			$query = $query." and Username = '$username'";
		}
		if(!empty($password)){
			$query = $query." and Password = '$password'";
		}
		if(!empty($access)){
			$query = $query." and Access = '$access'";
		}
		if(!empty($sort)){
			$query = $query." order by Name";
		}
		$result = $conn->query($query);
		$i =0;
		 while($i < mysqli_num_rows($result)){
			$row = $result->fetch_assoc();
            $list[$i][0]=$row["Username"];
			$list[$i][1]=$row["Name"];
			$list[$i][2]=$row["Access"];
			$list[$i][3]=$row["DOB"];
			$list[$i][4]=$row["Email"];
			$list[$i][5]=$row["ID"];
			$list[$i][6]=$row["Password"];
			$i++;
        }
		return $list;
}

public function users_select_count($username,$password){
		$conn = $this->conn;
		$query = "select count(*)count from users where 1 = 1";
		if(!empty($username)){
			$query = $query." and Username = '$username'";
		}
		if(!empty($password)){
			$query = $query." and Password = '$password'";
		}
		$result = $conn->query($query);
		$row = $result->fetch_assoc();
		return $row["count"];
}

public function users_insert($username,$password,$firstname,$lastname,$email,$birthday){
	    $conn = $this->conn;
	    $query = "insert into users(Username,Password,Name,Email,Access,DOB)values('$username','$password','$firstname  $lastname','$email',2,'$birthday')";
		$result = $conn->query($query);
		return $result;
}

public function feedback_insert($state,$city,$gender,$satisfaction){
	    $conn = $this->conn;
	    $query = "insert into feedback(Gender,State,City,Satisfaction)value('$gender','$state','$city','$satisfaction')";
		$result = $conn->query($query);
		return $result;
}

public function users_update($id,$password,$name,$dob,$email){
	$conn = $this->conn;
	$query = "update users set Password = '$password', Name = '$name', DOB = '$dob', Email = '$email' where ID = '$id' ";
	$result = $conn->query($query);
	return $result;	
}

public function access_update($id,$access){
	$conn = $this->conn;
	$query = "update users set Access = '$access' where ID = '$id' ";
	$result = $conn->query($query);
	return $result;	
}

}
?>

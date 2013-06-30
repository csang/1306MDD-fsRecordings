<?php 
/*
Name: Carlos Sang
Description: API for Users
*/

// Functions ----------------------------------------------------------------------------

function findUser($un = ""){
	$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
	$sql = "select username from users where username = :un";
							
	$statement = $db->prepare($sql);
	$statement->execute(array(":un"=>$un));
	return $statement->fetchAll();
}

function findEmail($email = ""){
	$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
	$sql = "select email from users where email = :email";
							
	$statement = $db->prepare($sql);
	$statement->execute(array(":email"=>$email));
	return $statement->fetchAll();
}

if(isset($_GET["action"])){
	
// Actions ----------------------------------------------------------------------------

	// Find One ------------------------------------------------------------------
	
	/*
	Description: Shows one username if it finds one
	
	Inputs: username
	
	*/

	if($_GET["action"] == "findUser" && isset($_GET["username"])){

		$un = $_GET["username"];
		$findUser = findUser($un);
		
		$user = array();
		
		$n = 0;
		foreach($findUser as $p){
			$user[$n] = $p;
			$n++;
		}
		
		echo(json_encode($user));

	}else if($_GET["action"] == "findEmail" && isset($_GET["email"])){
		$email = $_GET["email"];
		$findEmail = findEmail($email);
		
		$user = array();
		
		$n = 0;
		foreach($findEmail as $p){
			$user[$n] = $p;
			$n++;
		}
		
		echo(json_encode($user));
		
	}else{
		
	// Error Messages ----------------------------------------------------------------------
		
		echo '{"Error": "Please make sure to type the action correctly and to use all the required inputs for every action"
				}';
	}
	
}else{
	
	echo '{"Error": "Please make sure to type the action correctly and to use all the required inputs for every action"
			}';
}
?>
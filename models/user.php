<?
class user{
	
	public function add($un = "", $email = "", $created = "", $userCode = "", $db){ // Adds a user to the database
		$sql = "insert into users(username,email,created,usercode) 
							values(:un,:email,:created,:usercode)";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":un"=>$un, ":email"=>$email, ":created"=>$created, ":usercode"=>$userCode));
	}

	public function findOne($un = "", $db){ // Finds a user in the database
		$sql = "select * from users where username = :un";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":un"=>$un));
		return $statement->fetchAll();
	}

	public function update($name = "", $email1 = "", $email2 = "", $uname = "", $db){ // Updates a user's info in the database
		$sql = "update users set name = :name,
    						email = :email1,
							email2 = :email2
                            where
                            username = :uname";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":name"=>$name, ":email1"=>$email1, ":email2"=>$email2, ":uname"=>$uname));
	}

	public function delete($un = "", $db){ // Deletes a user from the database
		$sql = "delete from users where username = :un";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":un"=>$un));
		return $statement->fetchAll();
	}
}
?>
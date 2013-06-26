<?
class user{
	
	public function add($un = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
		$sql = "insert into users(username) 
							values(:un)";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":un"=>$un));
	}

	public function findOne($un = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
		$sql = "select * from users where username = :un";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":un"=>$un));
		return $statement->fetchAll();
	}

	public function update($name = "", $email1 = "", $email2 = "", $uname = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
		$sql = "update users set name = :name,
    						email = :email1,
							email2 = :email2
                            where
                            username = :uname";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":name"=>$name, ":email1"=>$email1, ":email2"=>$email2, ":uname"=>$uname));
	}

	public function delete($un = ""){
		$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
		$sql = "delete from users where username = :un";
							
		$statement = $db->prepare($sql);
		$statement->execute(array(":un"=>$un));
		return $statement->fetchAll();
	}
}
?>
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
}
?>
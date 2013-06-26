<?

class database{

	$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
	return $db;

};

?>
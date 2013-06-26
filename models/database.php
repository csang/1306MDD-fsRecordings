<?
// Using this file to set up the database info

$dbConnection = "mysql:hostname=localhost;dbname=fsRecordings";
$dbUser = "root";
$dbPass = "root";
$db = new PDO($dbConnection,$dbUser,$dbPass);

?>
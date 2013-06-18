<? 
session_start();
	require_once "models/getView.php";
	
	$views = new getView();
	
	$views->getFile("views/home.php");
?>
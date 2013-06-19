<? 
session_start();
	require_once "models/getView.php";
	
	$views = new getView();
	
	$views->getFile("views/header.php");
	$views->getFile("views/login.php");
	$views->getFile("views/footer.php");
?>
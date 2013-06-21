<? 
session_start();
	require_once "controllers/protector.php";
	require_once "models/getFile.php";
	
	$views = new getView();
	
	$views->getFile("views/header.php");
	$views->getFile("views/home.php");
	$views->getFile("views/footer.php");
?>
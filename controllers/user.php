<?
	session_start();
	require_once "models/getFile.php";
	require_once "models/user.php";

	$views = new getView();
	$userModel = new user();

	$views->getFile("views/header.php");

	if(!empty($_GET['action'])){

		if($_GET["action"] == "update"){
			if(isset($_POST["email2"]) || isset($_POST["name"])){
				$userModel->update($_POST["name"],$_POST["email1"],$_POST["email2"],$_SESSION["user"][0]["username"]);
				$data = $userModel->findOne($_SESSION["user"][0]["username"]);
				$views->getFile("views/home.php", $data);
			}else{
				$views->getFile("views/home.php");	
			};
		}elseif($_GET["action"] == "delete"){
			$userModel->delete($_SESSION["user"][0]["username"]);
			session_destroy();
			$_SESSION["loggedin"] = 0;
			$views->getFile("views/login.php");
		};

	}else{
		
		$views->getFile("views/home.php");
		
	};

	$views->getFile("views/footer.php");

?>
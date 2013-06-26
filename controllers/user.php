<?
	/*
	The user goes through here whenever his: 
	- Updating his info
	- Deleting his profile
	*/

	session_start();

	/*
	Getting files we will need to use to:
	-Get a view
	-Connect to the database
	*/
	require_once "models/getFile.php";
	require_once "models/user.php";
	require_once "models/database.php";

	// instance of variables we will need to use
	$views = new getView();
	$userModel = new user();

	if(!empty($_GET['action'])){

		if($_GET["action"] == "update"){ // If the user is updating his info
			if(isset($_POST["email2"]) || isset($_POST["name"])){
				$userModel->update($_POST["name"],$_POST["email1"],$_POST["email2"],$_SESSION["user"][0]["username"],$db);
				$data = $userModel->findOne($_SESSION["user"][0]["username"],$db);
				$views->getFile("views/header.php");
				$views->getFile("views/home.php", $data);
			}else{
				$views->getFile("views/header.php");
				$views->getFile("views/home.php");	
			};
		}elseif($_GET["action"] == "delete"){ // If the user want to delete his profile
			$userModel->delete($_SESSION["user"][0]["username"],$db);
			session_destroy();
			$_SESSION["loggedin"] = 0;
			$views->getFile("views/header.php");
			$views->getFile("views/login.php");
		};

	}else{
		$views->getFile("views/header.php");
		$views->getFile("views/home.php");
	};

	$views->getFile("views/footer.php");

?>
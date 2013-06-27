<? 
	/*
	The user goes through here whenever his: 
	-loggin in
	-loggin out
	-registering
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

		if($_GET["action"] == "sendCode"){
			if(isset($_POST["email"])){
				$date = new DateTime();
				$_SESSION["email"] = $_POST["email"];
				$_SESSION["code"] = $date->format('siHdmY');
				$_SESSION["created"] = $date->format('Y-m-d H:i:s');
				$data = "Your code has been sent to your Full Sail email. " . $_SESSION["code"];
				$views->getFile("views/header.php");
				$views->getFile("views/message.php", $data);
				$views->getFile("views/login.php");
			}else{
				$views->getFile("views/header.php");
				// $views->getFile("views/error.php"); === I'll add an error message afterwards
				$views->getFile("views/login.php");
			};

		}else if($_GET["action"] == "adduser"){ // === When registering
			if(isset($_POST["code"],$_POST["r_username"])){
				if($_POST["code"] == $_SESSION["code"]){
					$userModel->add($_POST["r_username"],$_SESSION["email"],$_SESSION["created"],$_SESSION["code"],$db);
					$data = $userModel->findOne($_POST["r_username"],$db);

					if($data[0] != ""){
						$_SESSION["loggedin"] = 1;
						$_SESSION["user"] = $data;
						$views->getFile("views/header.php");
						$views->getFile("views/home.php", $data);
					}else{
						$views->getFile("views/header.php");
						$views->getFile("views/login.php");	
					}
				}else{
					$views->getFile("views/header.php");
					// $views->getFile("views/error.php"); === I'll add an error message afterwards
					$views->getFile("views/login.php");
				}
			}else{
				$views->getFile("views/header.php");
				$views->getFile("views/login.php");	
			}
		}else if($_GET["action"] == "login"){ // === When loggin in
			if(isset($_POST["l_username"])){
				$data = $userModel->findOne($_POST["l_username"],$db/*,$_SESSION["email"]*/);
				if($data[0] != ""){
					$_SESSION["loggedin"] = 1;
					$_SESSION["user"] = $data;
					$views->getFile("views/header.php");
					$views->getFile("views/home.php", $data);
				}else{
					$views->getFile("views/header.php");
					$views->getFile("views/login.php");	
				}
				
			}else{
				$views->getFile("views/header.php");
				$views->getFile("views/login.php");	
			}
		}else if($_GET["action"] == "logout"){ // === When loggin out
			session_destroy();
			$_SESSION["loggedin"] = 0;
			$views->getFile("views/header.php");
			$views->getFile("views/login.php");
		}

	}else{ // If no action was used, open the default login page

		$views->getFile("views/header.php");
		$views->getFile("views/login.php");
		
	};

	$views->getFile("views/footer.php");
	
?>
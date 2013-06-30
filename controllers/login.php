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

////////////////////////////////////////////////////////////////////////
// === When verifying student
////////////////////////////////////////////////////////////////////////
		if($_GET["action"] == "sendCode"){
			if(isset($_POST["email"]) && $_POST["email"] != "" && $_POST["email"] != "@fullsail.edu"){
				$date = new DateTime();
				$_SESSION["email"] = $_POST["email"]."@fullsail.edu";
				$_SESSION["code"] = $date->format('siHdmY');
				$_SESSION["created"] = $date->format('Y-m-d H:i:s');
				$data = $_SESSION["code"];
				$views->getFile("views/header.php");
				$views->getFile("views/message.php", $data);
				$views->getFile("views/login.php");
			}else{
				$views->getFile("views/header.php");
				// $views->getFile("views/error.php"); === I'll add an error message afterwards
				$views->getFile("views/login.php");
			};

////////////////////////////////////////////////////////////////////////
// === When registering
////////////////////////////////////////////////////////////////////////			
		}else if($_GET["action"] == "adduser"){ 
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

////////////////////////////////////////////////////////////////////////
// === When logging in
////////////////////////////////////////////////////////////////////////	
		}else if($_GET["action"] == "login"){
			if(isset($_POST["l_username"])){
				$data = $userModel->findOne($_POST["l_username"],$db);
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

////////////////////////////////////////////////////////////////////////
// === When logging out
////////////////////////////////////////////////////////////////////////
		}else if($_GET["action"] == "logout"){
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
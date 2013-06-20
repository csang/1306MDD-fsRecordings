<? 
	session_start();
	require_once "models/getView.php";
	require_once "models/user.php";
	
	$views = new getView();
	$userModel = new user();
	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
	
	$views->getFile("views/header.php");

	if(!empty($_GET['action'])){

		if($_GET["action"] == "adduser"){
			if(isset($_POST["code"],$_POST["r_username"])){
				if($_POST["code"] == 00000/*$_SESSION["code"]*/){
					$userModel->add($_POST["r_username"]/*,$_SESSION["email"]*/);
					$_SESSION["loggedin"] = 1;
					$views->getFile("views/home.php");
				}else{
					// $views->getFile("views/error.php");
					$views->getFile("views/login.php");
				}
				/*$_SESSION["loggedin"] = 1;
				$data = $productModel->getAll();
				$views->getFile("controllers/products.php");*/
				//$views->getFile("views/footer.php");
			}else{
				$views->getFile("views/login.php");	
			}
		}else if($_GET["action"] == "login"){
			if(isset($_POST["l_username"])){
				$data = $userModel->findOne($_POST["l_username"]/*,$_SESSION["email"]*/);
				$_SESSION["loggedin"] = 1;
				$views->getFile("views/home.php", $data);
			}else{
				$views->getFile("views/login.php");	
			}
		}

	}else{
		
		$views->getFile("views/login.php");
		
	};

	$views->getFile("views/footer.php");
	
?>
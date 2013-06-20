<?
	session_start();
	require_once "models/getView.php";
	require_once "models/register.php";
	require_once "models/products.php";
	
	$views = new getView();
	$registerModel = new user();
	$productModel = new products();
	$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
	
	if(!empty($_GET['action'])){
		
		if($_GET["action"] == "adduser"){
			if(isset($_POST["code"],$_POST["username"])){
				if($_POST["code"] == $_SESSION["code"]){
					$registerModel->add($_POST["username"],$_SESSION["email"]);
					$_SESSION["loggedin"] = 1;
					header("location: ../index.php");
				}else{
					$views->getFile("views/header.php");
					$views->getFile("views/error.php");
					$captcha = $randomString;
					$images->msg($captcha);
					$_SESSION["captcha"] = $captcha;
					$views->getFile("views/registerform.php");
					$views->getFile("views/footer.php");
				}
				/*$_SESSION["loggedin"] = 1;
				$data = $productModel->getAll();
				$views->getFile("controllers/products.php");*/
				//$views->getFile("views/footer.php");
			}else{
				$views->getFile("views/header.php");
				$captcha = $randomString;
				$images->msg($captcha);
				$_SESSION["captcha"] = $captcha;
				$views->getFile("views/registerform.php");
				$views->getFile("views/footer.php");	
			}
		}
		
	}else{
		$views->getFile("views/header.php");
		$captcha = $randomString;
		$images->msg($captcha);
		$_SESSION["captcha"] = $captcha;
		$views->getFile("views/registerform.php");
		$views->getFile("views/footer.php");
	}
?>
<?	
	if(!empty($_GET["controllers"])){
	
		if($_GET["controllers"] == ""){
			
			include 'controllers/home.php';
				
		}elseif($_GET["controllers"] == "home"){
			
			include 'controllers/home.php';	
			
		}elseif($_GET["controllers"] == "logout"){
			//$_SESSION["loggedin"] = 0;
			//session_destroy();
			include 'controllers/login.php';	
			
		}elseif($_GET["controllers"] == "login"){
			
			include 'controllers/login.php';	
			
		}elseif($_GET["controllers"] == "profile"){
			
			include 'controllers/profile.php';	
			
		}elseif($_GET["controllers"] == "settings"){
			
			include 'controllers/settings.php';	
			
		}elseif($_GET["controllers"] == "recruit"){
			
			include 'controllers/recruit.php';
				
		}elseif($_GET["controllers"] == "upload"){
			
			include 'controllers/image.php';	
		
		}elseif($_GET["controllers"] == "mail"){
			
			include 'controllers/mail.php';	
		
		}
		
	}else{
		include 'controllers/home.php';
	}
?>
<?	
	if(!empty($_GET["controllers"])){
	
		if($_GET["controllers"] == ""){
			
			include 'controllers/home.php';
				
		}elseif($_GET["controllers"] == "home"){
			
			include 'controllers/home.php';	
			
		}elseif($_GET["controllers"] == "logout"){
			
			include 'controllers/login.php';	
			
		}elseif($_GET["controllers"] == "register"){
			
			include 'controllers/register.php';	
			
		}elseif($_GET["controllers"] == "login"){
			
			include 'controllers/login.php';	
			
		}elseif($_GET["controllers"] == "user"){

			include 'controllers/user.php';	
			
		}elseif($_GET["controllers"] == "settings"){
			
			include 'controllers/settings.php';	
			
		}elseif($_GET["controllers"] == "recruit"){
			
			include 'controllers/recruit.php';
				
		}elseif($_GET["controllers"] == "upload"){
			
			include 'controllers/image.php';	
		
		}
		
	}else{
		include 'controllers/home.php';
	}
?>
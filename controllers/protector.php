<?
if(isset($_SESSION["loggedin"])){
	
	if($_SESSION["loggedin"]==1){

	}else{
		header("location: index.php?controllers=login");	
	}
}else{
	header("location: index.php?controllers=login");		
}
?>
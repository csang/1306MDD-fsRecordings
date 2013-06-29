<?php 
/*
Name: Carlos Sang
Description: API for Users
*/

// Functions ----------------------------------------------------------------------------

function userList($un = ""){ //This function gets all the users except himself
	$db = new PDO("mysql:hostname=localhost;dbname=fsRecordings","root","root");
	$sql = "select * from users where username != :un";
							
	$statement = $db->prepare($sql);
	$statement->execute(array(":un"=>$un));
	return $statement->fetchAll();
}

function postInfo($id){ //This function gets the post selected

	
}

function postAdd($author, $title, $text, $category){ //This function adds a post

	
}

function postUpdate($id, $author, $category, $text, $title){ //This function updates a post

	
}

function postCommentAdd($id, $author, $text){ //This function adds a comment to the post selected


}

function categoryList(){ //This function gets all the categories

	
}

if(isset($_GET["action"])){
	
// Actions ----------------------------------------------------------------------------

	// Post List ------------------------------------------------------------------
	
	/*
	Description: Shows all the posts
	
	Inputs: none
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postList
	http://localhost:8080/adb/api/api.php?action=postList&category=test
	*/

	if($_GET["action"] == "userList"){

		$un = $_SESSION["username"];
		$userList = userList($un);
		
		$users = array();
		
		$n = 0;
		foreach($userList as $p){
			$users[$n] = $p;
			$n++;
		}
		
		echo(json_encode($users));
	}
	
	// Post Info ------------------------------------------------------------------

	/*
	Description: Shows one post, the one with the ID you type in the url
	
	Inputs: id
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postInfo&id=12345
	*/
	

	elseif($_GET["action"] == "postInfo" && isset($_GET["id"])){
		// $postInfo = postInfo((int)$_GET["id"]);
		
		// if(json_encode($postInfo) != "null"){
		// 	echo(json_encode($postInfo));
		// }else{
		// 	echo '{"Error": "Make sure that the id exists"}';	
		// }
	}

	// Post Add ------------------------------------------------------------------
	
	/*
	Description: Adds a post
	
	Inputs: author, title, text and category
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postAdd&author=Author&title=Title&text=Text&category=database
	*/

	elseif($_GET["action"] == "postAdd" && 
		// isset($_GET["author"]) && 
		// isset($_GET["title"]) && 
		// isset($_GET["text"]) && 
		// isset($_GET["category"])){
		
		// $author = $_GET["author"];
		// $title = $_GET["title"];
		// $text = $_GET["text"];
		// $category = explode(",",$_GET["category"]);
		
		// $postAdd = postAdd($author,$title,$text,$category);
		
		// $postList = postList();
		
		// if(json_encode($postList) != "null"){
		// 	$posts = array();
			
		// 	$n = 0;
		// 	foreach($postList as $p){
		// 		$posts[$n] = $p;
		// 		$n++;
		// 	}
		// 	echo(json_encode($posts));
			
		// }else{
		// 	echo '{"Error": "Make sure you are using all the inputs (author, title, text and category)"}';	
		// }
	}
	
	// Post Comment Add ------------------------------------------------------------------
	
	/*
	Description: Adds a comment to the post selected with ID
	
	Inputs: id, author and text
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postCommentAdd&id=12345&author=Author&text=Comment
	*/
	
	elseif($_GET["action"] == "postCommentAdd" && 
		// isset($_GET["id"]) && 
		// isset($_GET["author"]) && 
		// isset($_GET["text"])){
				
		// $id = (int)$_GET["id"];
		// $author = $_GET["author"];
		// $text = $_GET["text"];
				
		// $postAdd = postCommentAdd($id,$author,$text);
		
		// $postList = postList();
		// $posts = array();
		
		// $n = 0;
		// foreach($postList as $p){
		// 	$posts[$n] = $p;
		// 	$n++;
		// }
		
		// echo(json_encode($posts));
	}
	
	// Post Update ------------------------------------------------------------------
	
	/*
	Description: Updates the post selected with ID
	
	Inputs: id(required), author, categoory, text and title
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postUpdate&id=12345&text=Text&category=database,vader,post&author=Darth%20Vader&title=Title
	*/
	
	elseif($_GET["action"] == "postUpdate" && 
		// isset($_GET["id"]) && 
		// isset($_GET["author"]) &&
		// isset($_GET["category"]) &&
		// isset($_GET["text"]) &&
		// isset($_GET["title"])){
			
		// $id = (int)$_GET["id"];
		
		// $post = postInfo($id);
		
		// if($post){
															
		// 	$id = $post["_id"];
			
		// 	$author = $post["author"];
		// 	if(isset($_GET["author"])){
		// 		$author = $_GET["author"];
		// 	}
									
		// 	$category = "";
		// 	if(isset($_GET["category"])){
		// 		$category = explode(",",$_GET["category"]);
		// 	}
			
		// 	$text = $post["text"];
		// 	if(isset($_GET["text"])){
		// 		$text = $_GET["text"];
		// 	}
			
		// 	$title = $post["title"];
		// 	if(isset($_GET["title"])){
		// 		$title = $_GET["title"];
		// 	}
										
		// 	if($post["author"] != $author ||
		// 		$post["category"] != $category ||
		// 		$post["text"] != $text ||
		// 		$post["title"] != $title){
												
		// 		$postUpdate = postUpdate($id,$author,$category,$text,$title);
				
		// 	}
			
		// 	$postList = postList();
		// 	$posts = array();
		
		// 	$n = 0;
		// 	foreach($postList as $p){
		// 		$posts[$n] = $p;
		// 		$n++;
		// 	}
			
		// 	echo(json_encode($posts));
		}
	}
	
	// Category List ------------------------------------------------------------------
	
	/*
	Description: Shows all the categories posted
	
	Inputs: none
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=categoryList
	*/

	elseif($_GET["action"] == "categoryList"){
		// $postList = postList();
		
		// $posts = array();
		// $categories = array();
		
		// $n = 0;
		// foreach($postList as $p){
		// 	$posts[$n] = $p["category"];
		// 	$result = call_user_func_array("array_merge", $posts);
		// 	$n++;
		// }
		
		// $categoryList = array_unique($result);
		
		// echo(json_encode($categoryList));
		
	}else{
		
	// Error Messages ----------------------------------------------------------------------
		
		echo '{"Error": "Please make sure to type the action correctly and to use all the required inputs for every action"
				}';
	}
	
}else{
	
	echo '{"Error": "Please make sure to type the action correctly and to use all the required inputs for every action"
			}';
}
?>
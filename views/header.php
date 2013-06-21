<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>fsRecordings</title>
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="header">
			<img src="assets/logo/logo_01.png" />
			<? if($_SESSION["loggedin"] == 1){ ?>
			<form method="post" enctype="multipart/form-data" action="?controllers=login&action=logout">
				<input class="button logout" type="submit" name="send" value="Log Out"/>
			</form>
			<? }?>
		</div>
	</header>
	<div id="center">
	<h1>Welcome to fsRecordings!</h1>
	

	<div class="register_form">

		<div class="email_form">
			<p>To begin we need to verify that you are a student at Full Sail University, 
			please type down your Full Sail email and hit SEND. 
			We will send you a code wich you need to use after this step.</p>
			<form method="post" enctype="multipart/form-data" action="?controllers=login&action=sendCode">
				<div>
					<label>Email:</label><br />
					<input class="email_input" type="email" name="email" value="@fullsail.edu"/>
				</div>
				<input class="button send" type="submit" name="send" value="SEND"/>
			</form>
		</div>

		<div class="user_form">
			<form method="post" enctype="multipart/form-data" action="?controllers=login&action=adduser">
				<div>
					<label>Code:</label><br />
					<input type="number" name="code" placeholder="#####"/>
				</div>
				<div>
					<label>SoundCloud Username:</label><br />
					<input type="text" name="r_username" placeholder="SoundCloud Username"/>
				</div>
				
				<input class="button" type="submit" name="launch" value="LAUNCH"/>
			</form>
		</div>

	</div>

	<div class="login_form">

	<div class="username_form">
		<p>Already a user? Login with your SoundCloud username.</p>
		<form method="post" enctype="multipart/form-data" action="?controllers=login&action=login">
			<div>
				<input type="text" name="l_username" placeholder="SoundCloud Username"/>
			</div>
			<input class="button" type="submit" name="send" value="LAUNCH"/>
		</form>
	</div>

	</div>


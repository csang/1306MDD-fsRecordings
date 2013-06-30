	<h1>Welcome to fsRecordings!</h1>
	<h2>Register now!</h2>

	<div class="register_form">

		<div class="email_form">
			<p>Step 1: Student Verification</p>
			<form method="post" enctype="multipart/form-data" action="?controllers=login&action=sendCode">
				<div>
					<label>Email:</label><br />
					<input class="email_input" type="text" name="email" />@fullsail.edu
				</div>
				<input class="button send" type="submit" name="send" value="SEND"/>
			</form>
		</div>

		<div class="user_form">
			<p>Step 2: SoundCloud Username</p>
			<form method="post" enctype="multipart/form-data" action="?controllers=login&action=adduser">
				<div>
					<label>Code:</label><br />
					<input type="number" name="code" placeholder="#####"/>
				</div>
				<div>
					<label>SoundCloud Username:</label><br />
					<input type="text" class="r_username" name="r_username" placeholder="SoundCloud Username"/>
					<div class="confirmation_icon">
						<img class="user_confirmation" src="">
					</div>
				</div>
				
				<input class="button r_launch" type="submit" name="launch" value="LAUNCH"/>
			</form>
		</div>

	</div>

	<div class="login_form">

		<div class="username_form">
			<p>Already a user? Login with your SoundCloud username below.</p>
			<form method="post" enctype="multipart/form-data" action="?controllers=login&action=login">
				<div>
					<input type="text" class="l_username" name="l_username" placeholder="SoundCloud Username"/>
				</div>
				<input class="button l_launch" type="submit" name="send" value="LAUNCH"/>
			</form>
		</div>

	</div>


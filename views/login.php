	<p>To begin we need to verify that you are a student at Full Sail University, 
		please type down your Full Sail email and hit SEND. 
		We will send you a code wich you need to enter after this step.</p>

	<div class="forms">
	<div class="email_form">
		<form method="post" enctype="multipart/form-data">
			<div>
				<label>Email:</label>
				<input type="text" name="email" value="@fullsail.edu"/>
			</div>
			<input class="button" type="submit" name="send" value="SEND"/>
		</form>
	</div>

	<div class="user_form">
		<form method="post" enctype="multipart/form-data" action="?controllers=home">
			<div>
				<label>Code:</label>
				<input type="text" name="code" placeholder="#####"/>
			</div>
			<div>
				<label>SoundCloud Username:</label>
				<input type="text" name="username" placeholder="Username"/>
			</div>
			
			<input class="button" type="submit" name="launch" value="LAUNCH"/>
		</form>
	</div>
	</div>


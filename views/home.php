	<div class="card">
		<div class="ppic">
			<img src="" />
		</div>
		<div class="card_info">
			<div class="username">
				<h3 class="title"><? echo $_SESSION["user"][0]["username"]; ?></h3>
			</div>
			<div class="recs">
				<p></p>
				<div class="icon songs_icon"></div>
			</div>
			<div class="recruits">
				<p>0</p>
				<div class="icon recruits_icon"></div>
			</div>
			<div class="favorites">
				<p>0</p>
				<div class="icon favorites_icon"></div>
			</div>
		</div>
		<div class="detail_form">
			<form method="post" enctype="multipart/form-data" action="?controllers=user&action=update">
				<div class="d_name d_input">
					<input type="text" name="name" <? if(isset($_SESSION["user"][0]["name"])){?>value=<?echo $_SESSION["user"][0]["name"];}else{?> placeholder="What's your name?"<? }?> />
				</div>
				<div class="d_email d_input">
					<input type="email" name="email1" value=<? echo $_SESSION["user"][0]["email"]; ?> readonly />
				</div>
				<div class="d_email d_input">
					<input type="email" name="email2"<? if(isset($_SESSION["user"][0]["email2"])){?>value=<?echo $_SESSION["user"][0]["email2"];}else{?> placeholder="Add another email"<? }?> />
				</div>
				<input type="submit" class="button save" value="SAVE" />
			</form>
		</div>
	</div>

	<div class="recruit_button button">
		<form method="post" enctype="multipart/form-data" action="?controllers=user&action=userList">
			<input type="submit" class="button users_button" value="Invite users to get more sounds!!!" />
		</form>
	</div>

	<div class="recordings">
	</div>

	<div>
		<form method="post" enctype="multipart/form-data" action="?controllers=user&action=delete">
			<input type="submit" class="button delete_user" value="DELETE USER" />
		</form>
	</div>
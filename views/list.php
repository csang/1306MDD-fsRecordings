<form method="post" enctype="multipart/form-data" action="?controllers=user">
	<input class="button" type="submit" name="profile" value="PROFILE"/>
</form>
<? foreach($data as $d){ ?>
<div class="card">
		<div class="ppic">
			<img src="assets/pattern/pattern_01.gif" />
		</div>
		<div class="card_info">
			<div class="username">
				<h3 class="title"><? echo $d["username"]; ?></h3>
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
					<input type="text" name="name" <? if(isset($d["name"])){?>value=<?echo $data[0]["name"];}else{?> placeholder="???"<? }?> readonly />
				</div>
				<div class="d_email d_input">
					<input type="email" name="email1" value=<? echo $d["email"]; ?> readonly />
				</div>
				<div class="d_email d_input">
					<input type="email" name="email2"<? if(isset($d["email2"])){?>value=<?echo $data[0]["email2"];}else{?> placeholder="???"<? }?> readonly />
				</div>
				<input type="submit" class="button save" value="SAVE" />
			</form>
		</div>
	</div>
<? }?>
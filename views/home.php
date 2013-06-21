	<div class="card">
		<div class="ppic">
			<img src="http://i1.sndcdn.com/avatars-000027013238-to12ln-large.jpg?14d6ecd" />
		</div>
		<div class="card_info">
			<div class="username">
				<h3 class="title"><? echo $data[0]["username"]; ?></h3>
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
	</div>

	<div class="detail">
		<form method="post" enctype="multipart/form-data" action="?controllers=user&action=update">
			<input type="text" value=<? echo $data[0]["username"]; ?> />
		</form> 
	</div>

	<div class="recordings">
	</div>
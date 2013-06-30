$(function(){
	
	// SoundCloud init
	SC.initialize({
	  client_id: 'a0e5078652ad46316cf33f14c367a1e2',
	  client_secret: 'b39825e99518e3872a13938ef9855526'
	});

	if($("h3.title").html()){

		var r_username = "" // username the user is trying to register with
		var confirmed = 0; // confirms username exists in SoundCloud
		var user_exists = 0; // username exists in our database
		var email_exists = 0; // email exists in our database
		
		if($("h3.title").length == 1){
			var username = $("h3.title").html();
		}else{
			var username = $("h3.title")
		}
		
		var player = {};
		var limit = 3;
		var favorites_count = 0;

//////////////////////////////////////////////////////////////
	// SoundCloud API
//////////////////////////////////////////////////////////////
		
		// This is for the UserList page, still need to work on it.
		if($("h3.title").length != 1) {
			for(var u=0, umax=username.length; u<umax; u++){
				var pic = $(".card .ppic img");
				SC.get('/tracks', { q: username[u].html}, function(tracks) {
				    pic.attr("src",tracks[0].user.avatar_url)
				    for(var i=0, max=limit; i<max; i++){
				    	SC.oEmbed(tracks[i].uri, { auto_play: false }, function(oEmbed) {
							
							if($(".recordings")){
								$(".recordings").append(oEmbed.html);
							}
							$(".recs p")[0].innerHTML = $(".recordings")[0]["childElementCount"] + "/" + tracks.length;
							
						});
						favorites_count = tracks[i].favoritings_count + favorites_count
						$(".favorites p")[0].innerHTML = favorites_count;

				    };
				});
			};

		// This is for the user page
		}else{
			SC.get('/tracks', { q: username}, function(tracks) {
			    $(".card .ppic img").attr("src",tracks[0].user.avatar_url)
			    for(var i=0, max=limit; i<max; i++){
			    	SC.oEmbed(tracks[i].uri, { auto_play: false }, function(oEmbed) {
						
						if($(".recordings")){
							$(".recordings").append(oEmbed.html);
						}
						$(".recs p")[0].innerHTML = $(".recordings")[0]["childElementCount"] + "/" + tracks.length;
						
					});
					favorites_count = tracks[i].favoritings_count + favorites_count
					$(".favorites p")[0].innerHTML = favorites_count;

			    };
			});
		};
//////////////////////////////////////////////////////////////
	// Click functions
//////////////////////////////////////////////////////////////

		$(".username").click(function(){
			if($(".card").height() == 100){;
				$(".card").animate({
					height: 270,
				}, 1000);
			}else{
				$(".card").animate({
					height: 100,
				}, 1000);
			}
		});

		$(".delete_user").click(function(){
			if (confirm('Are you sure you want to delete this user?')) {
			    
			} else {
				return false;
			}
		});

//////////////////////////////////////////////////////////////
	// Login Page Animations
//////////////////////////////////////////////////////////////

	}else{
		if($(".message p")[0]){
			$(".user_form").animate({
				height: 270,
			}, 1000);

			$(".message").animate({
				height: 25,
			}, 1000);

			$(".email_form").animate({
				height: 0,
			}, 1000);
		};

//////////////////////////////////////////////////////////////
	// Login Error Handling
//////////////////////////////////////////////////////////////

		$("input.r_username").keyup(function(){
			r_username = $("input.r_username")[0].value;

			SC.get('/users', { q: r_username}, function(users) {
				if(users.length > 0){
					if(users[0].permalink == r_username || users[0].username == r_username){
						confirmed = 1;
				    	$(".user_confirmation").css("display","none")
				    }else{
				    	confirmed = 0;
						$(".user_confirmation").attr("src","assets/img/glyphicons-halflings-d-orange.png")
				    };
				}else{
					$(".user_confirmation").attr("src","assets/img/glyphicons-halflings-d-orange.png")
				};
			});
		});

		$("input.l_username").keyup(function(){
			lib.ajax({
				url: "models/api.php",
				type: "get",
				data: {
					action: "findUser",
					username: $("input.l_username")[0].value
				},
				success: function(result){
					if(result.length == 1){
						$("input.l_username").css("color","#00cc00");
						user_exists = 1;
					}else{
						$("input.l_username").css("color","#cc0000");
						user_exists = 0;
					}
				},
				error: function(result){
					
				}
			});
		});

		$("input.email_input").keyup(function(){
			console.log($("input.email_input")[0].value + "@fullsail.edu");
			lib.ajax({
				url: "models/api.php",
				type: "get",
				data: {
					action: "findEmail",
					email: $("input.email_input")[0].value + "@fullsail.edu"
				},
				success: function(result){
					if(result.length == 1){
						$("input.email_input").css("color","#cc0000");
						email_exists = 1;
					}else{
						$("input.email_input").css("color","#00cc00");
						email_exists = 0;
					}
				},
				error: function(result){
					
				}
			});
		});

		$(".r_launch").click(function(e){
			if(!confirmed){
				e.preventDefault();
			};		
		});

		$(".l_launch").click(function(e){
			if(!user_exists){
				e.preventDefault();
			};		
		});

		$(".send").click(function(e){
			if(email_exists || $("input.email_input")[0].value == ""){
				e.preventDefault();
			}
		});
	};

});
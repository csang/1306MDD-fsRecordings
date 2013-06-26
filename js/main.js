$(function(){

//////////////////////////////////////////////////////////////
	// SoundCloud API
//////////////////////////////////////////////////////////////
	
	if($(".recordings")){

		var username = $("h3.title").html();
		var player = {};
		var limit = 3;
		var favorites_count = 0;

		SC.initialize({
		  client_id: 'a0e5078652ad46316cf33f14c367a1e2',
		  client_secret: 'b39825e99518e3872a13938ef9855526'
		});

		SC.get('/tracks', { q: username}, function(tracks) {
		    // console.log(tracks);
		    for(var i=0, max=limit; i<max; i++){
		    	SC.oEmbed(tracks[i].uri, { auto_play: false }, function(oEmbed) {
				  
					$(".recordings").append(oEmbed.html);
					$(".recs p")[0].innerHTML = $(".recordings")[0]["childElementCount"] + "/" + tracks.length;
					
				});
				//console.log(tracks[i].favoritings_count);
				favorites_count = tracks[i].favoritings_count + favorites_count
				$(".favorites p")[0].innerHTML = favorites_count;

		    };
			// SC.stream("/tracks/"+track.id, function(sound){
			// 	console.log(sound);
			// 	sound.play();
			// });
		});

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
		})
	}

});
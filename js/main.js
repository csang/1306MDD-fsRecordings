$(function(){

	// var UserList = Backbone.View.extend({
	// 	el: ".center",
	// 	render: function(){
	// 		this.$el.html("<p>Hello World!</p>");
	// 	}
	// });

	// var Router = Backbone.Router.extend({
	// 	routes: {
	// 		"": "home"
	// 	}
	// });

	// var userList = new UserList();

	// var router = new Router();

	// router.on("route:home", function(){
	// 	//console.log("Opened the home page");
	// 	userList.render();
	// });

	// Backbone.history.start();

//////////////////////////////////////////////////////////////
	//SoundCloud API
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
	}

});
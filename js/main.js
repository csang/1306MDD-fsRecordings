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

	var username = "";

//////////////////////////////////////////////////////////////
	//SoundCloud API
//////////////////////////////////////////////////////////////
	
	if($(".recordings")){

		var track = "";
		var player = {};

		SC.initialize({
		  client_id: 'a0e5078652ad46316cf33f14c367a1e2',
		  client_secret: 'b39825e99518e3872a13938ef9855526'
		});

		SC.get('/tracks', { q: 'dmitrimijailov' }, function(tracks) {
		    // console.log(tracks);
		    for(var i=0, max=3/*tracks.length*/; i<max; i++){
		    	SC.oEmbed(tracks[i].uri, { auto_play: false }, function(oEmbed) {
				  
					$(".recordings").append(oEmbed.html);
					$(".recs p")[0].innerHTML = $(".recordings")[0]["childElementCount"] + "/" + tracks.length;
				});
		    };
			// SC.stream("/tracks/"+track.id, function(sound){
			// 	console.log(sound);
			// 	sound.play();
			// });
		});
	}

});
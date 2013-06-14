(function(){

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
	
	var track = "";
	var player = {};

	SC.initialize({
	  client_id: 'a0e5078652ad46316cf33f14c367a1e2'
	});

	SC.get('/tracks', { q: 'dmitrimijailov' }, function(tracks) {
	    console.log(tracks);
	    track = tracks[0];

	    SC.oEmbed(track.uri, { auto_play: false }, function(oEmbed) {
		  console.log('oEmbed response: ' + oEmbed);
		  //this."#center".html(oEmbed);
		  player = eval('(' + JSON.stringify(oEmbed) + ')');
		  console.log(player.html);
		  document.getElementById("center").innerHTML=player.html;
		});

		// SC.stream("/tracks/"+track.id, function(sound){
		// 	console.log(sound);
		// 	sound.play();
		// });

	});

	

})();
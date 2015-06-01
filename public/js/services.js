var app = angular.module('godj.services',[]);

//Song Factory ---------------------
app.factory("Song", function($http) {
	return {
	get: function() {
    $http.get('/api/v1/songs').success(function(data){


      return data;
  });

},

save: function(songObject) {
        var request = $http.post('/api/v1/songs',songObject).success(function(data) {
          console.log(data);
return data;
});
	},
	destroy: function(id) {
	return $http.delete('/api/v1/songs/' + id);
}
}

});
//Auth Factory-------------------------------------------------------
app.factory("Auth", function($http) {
return {

login: function(username,password) {
$http.post('/api/v1/apilogin', {username:username, password:password}).success(function(data) {
  localStorage.id = data.id;
  localStorage.username = data.username;
});

},

logout: function() {

}

}

});
// Mood Factory -----------------------------------------------------
app.factory("Mood", function($http) {
	return {
	get: function() {
	return $http.get('/api/v1/moods');
	},

	save: function(moodObject) {
	//return $.post('/api/v1/moods',data);
	var request = $http.post('/api/v1/moods',moodObject).success(function(data) {

return data;
});

	},
	destroy: function(id) {
	return $http.delete('/api/v1/moods/' + id);
}
}

});
// Shoutout Factory -----------------------------------------------------
app.factory("Shoutout", function($http) {
	return {
	get: function() {
	return $http.get('/api/v1/shoutouts');
	},

	save: function(shoutoutObject) {
	//return $.post('/api/v1/moods',data);
	var request = $http.post('/api/v1/shoutouts',shoutoutObject).success(function(data) {
    console.log(data);


return data;
});

	},
	destroy: function(id) {
	return $http.delete('/api/v1/shoutouts/' + id);
}
}

});

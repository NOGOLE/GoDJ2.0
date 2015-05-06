
var app = angular.module("godj", ['ngRoute']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/about', {
        templateUrl: 'partials/about.html',
        //controller: 'PhoneListCtrl'
      })
		}]);

//REST
app.factory("Song", function($http) {
	return {
	get: function() {
    var songs = [];
    $http.get('/api/v1/songs').success(function(data){


      songs = data;
  });
  return songs;
},

save: function(songObject) {
        var request = $.post('/api/v1/songs',songObject, function(data) {
alert("Song Request Successfully Sent!");
return data;
});
	},
	destroy: function(id) {
	return $http.delete('/api/v1/songs/' + id);
}
}

});
app.factory("Mood", function($http) {
	return {
	get: function() {
	return $http.get('/api/v1/moods');
	},

	save: function(moodObject) {
	//return $.post('/api/v1/moods',data);
	var request = $.post('/api/v1/moods',moodObject, function(data) {
alert("Mood Request Successfully Sent!");
console.log(moodObject);
return data;
});

	},
	destroy: function(id) {
	return $http.delete('/api/v1/moods/' + id);
}
}

});

//

app.controller(
"requestController",
function($scope,Mood, Song) {
$scope.song_requestor_name="";
$scope.song_title="";
$scope.song_artist="";
$scope.song_dj_id="";
$scope.mood_requestor_name="";
$scope.mood_title="";
$scope.mood_dj_id="";
$scope.lat=0.0;
$scope.long=0.0;
$scope.songRequests =[];
$scope.addSong = function(song){
  $scope.$apply(function(){

    $scope.songRequests.push(song);
  });

};
//init function
$scope.init = function() {
if(navigator.geolocation){
navigator.geolocation.getCurrentPosition(showPosition);
}
else{
alert("Geolocation is not supported by this browser.");
}
var counter = 0;
var larapush = new Larapush('ws://godj.app:8080');
console.log(larapush);
larapush.watch('demo').on('generic.event', function(msgEvent){
/*
var div = document.getElementById("dj-request");
var par = document.createElement('p');

par.innerText = msgEvent.message;
par.id= counter.toString();
div.appendChild(par);

if(counter > 1) {
var lastElement = document.getElementById((counter - 2).toString());
div.removeChild(lastElement);
}
  counter++;
  */
  //console.log(msgEvent.message);
  $scope.addSong(msgEvent.message);
  console.log($scope.songRequests);


});
};

function showPosition(pos){
$scope.lat = pos.coords.latitude;
$scope.long = pos.coords.longitude;
}


//submit mood request
$scope.submitMood = function() {
var moodObject = {requestor_name:$scope.mood_requestor_name,
title:$scope.mood_title,
dj_id:$scope.mood_dj_id,
lat:$scope.lat,
long:$scope.long
};

var request = Mood.save(moodObject);
$scope.mood_title ="";
return request;

}
//submit song request
$scope.submitSong = function() {
//create JSON object to insert into post
var songObject = {requestor_name:$scope.song_requestor_name,
title:$scope.song_title,
artist:$scope.song_artist,
dj_id:$scope.song_dj_id,
lat:$scope.lat,
long:$scope.long };

var request = Song.save(songObject);
$scope.song_title ="";
$scope.song_artist ="";

return request;
}
});
/*Profile Controller*/

app.controller('ProfileController',function($scope,Mood,Song, $http){
  $scope.songRequests = [];
  $scope.moodRequests = [];
  //delete songs
  $scope.deleteSong = function($index) {
 Song.destroy($scope.songRequests[$index].id);
 $scope.songRequests.splice($index,1);
 };
//delete moods
$scope.deleteMood = function($index) {
Mood.destroy($scope.moodRequests[$index].id);
$scope.moodRequests.splice($index,1);

};
  //initialize function
  $scope.init = function(){


     $http.get('/api/v1/songs').success(function(data){
       console.log(data);

       $scope.songRequests = data;

     });


    var larapush = new Larapush('ws://godj.app:8080');
    //TODO make dynamic 
    larapush.watch('mastashake08').on('song.request', function(msgEvent)
    {
      console.log(msgEvent.message);
      $scope.$apply(function(){
      $scope.songRequests.push(JSON.parse(msgEvent.message));
      });
      //drawMap();
    });
    larapush.watch('{{$dj->username}}').on('mood.request', function(msgEvent)
    {
      console.log(msgEvent.message);
      $scope.$apply(function(){
      $scope.moodRequests.push(JSON.parse(msgEvent.message));
      });
    });
};
  $scope.init();


});

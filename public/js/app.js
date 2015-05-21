
var app = angular.module("godj", ['ngRoute']);

app.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/about', {
        templateUrl: 'partials/about.html',
        //controller: 'PhoneListCtrl'
      })
		}]);

//Song Factory ---------------------
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
//Auth Factory-------------------------------------------------------
app.factory("Auth", function($http) {
return {

login: function(username,password) {
$.post('/api/v1/apilogin', {username:username, password:password},function(data) {});

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
//PartyController
app.controller(
	'PartyController', function($scope,$http){
		$scope.name='';
		$scope.address='';
		$scope.city='';
		$scope.state='';
		$scope.zip=00000;
		$scope.lat=0.0;
		$scope.lng=0.0;
		$scope.api_key='';
		$scope.query=$scope.address+','+$scope.city+','+$scope.state+'&'+$scope.api_key;
		$scope.url='https://maps.googleapis.com/maps/api/geocode/json?address='+$scope.query;
		//get lat/long
		$scope.submitParty = function() {
			$http.get($scope.url)
			.success(function(data){
			$scope.lat = data.results.geometry.location.lat;
			$scope.lng = data.results.geometry.location.lng;
			$http.post('/api/v1/parties',{name:$scope.name,address:$scope.address,city:$scope.city,state:$scope.state,zip:$scope.zip,lat:$scope.lat,lng:$scope.lng})
			.success(function(data){
				alert('Party Successfully Added!');

			});
			});
		};

	});
//RequestController-----------------------------------------------------------

app.controller(
"RequestController",
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
$scope.url = 'ws://'+window.location.host+':8080';
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

var larapush = new Larapush($scope.url);

larapush.watch('demo').on('generic.event', function(msgEvent) {

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
/*Profile Controller
------------------------------------------------------------
*/

app.controller('ProfileController',function($scope,Mood,Song, $http){
  $scope.requests = [['Lat','Long','Name'],[0,0,'Test']];

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
  $scope.init = function(channel){

     $http.get('/api/v1/songs').success(function(data){
       $scope.songRequests = data;
     });

//polar chart---------------------------------------
var data = [
    {
        value: 0,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Song Requests"
    },
    {
        value: 0,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Mood Requests"
    }
];
var polar = document.getElementById("polarchart").getContext("2d");
var myPolarChart = new Chart(polar).PolarArea(data);
//chart-----------------------------------------------




var data = {
    labels: ["Song Requests", "Mood Requests"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(0,0,0,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [0,0]
        },
    ]
};
    var ctx = document.getElementById("radarchart").getContext("2d");

    var myRadarChart = new Chart(ctx).Radar(data);


console.log(myRadarChart);
//end chart------------------------------------------
    var larapush = new Larapush($scope.url);
    //TODO make dynamic
    larapush.watch(channel).on('song.request', function(msgEvent)
    {

      var myData = JSON.parse(msgEvent.message);
      console.log(myData);
      $scope.$apply(function(){
      $scope.songRequests.push(myData);
      });
    

	myRadarChart.datasets[0].points[0].value += 1;

        myRadarChart.update();

	myPolarChart.segments[0].value += 1;
// Would update the first dataset's value of 'Green' to be 10
	myPolarChart.update();
    });
    larapush.watch(channel).on('mood.request', function(msgEvent)
    {
	var myData = JSON.parse(msgEvent.message);
      console.log(msgEvent.message);
      $scope.$apply(function(){
      $scope.moodRequests.push(myData);

	myPolarChart.segments[1].value += 1;
// Would update the first dataset's value of 'Green' to be 10
myPolarChart.update();

	 myRadarChart.datasets[0].points[1].value += 1;

myRadarChart.update();
      });
//console.log(channel);
    });
};



});

/* PartyController
------------------------------------------------------------------------
*/

app.controller('PartyController',function($scope, $http){
//hold all the parties
$scope.parties = [];
//party creation object
$scope.party = {};

$scope.init = function() {
  $http.get('/api/v1/parties').success(function(data){
    $scope.parties = data;
  });
  $scope.init();

};

});

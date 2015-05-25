
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
	var request = $.post('/api/v1/shoutouts',shoutoutObject, function(data) {
    console.log(data);


return data;
});

	},
	destroy: function(id) {
	return $http.delete('/api/v1/shoutouts/' + id);
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
function($scope,Mood, Song,Shoutout) {
$scope.song_requestor_name="";
$scope.song_title="";
$scope.song_artist="";
$scope.mood_requestor_name="";
$scope.mood_title="";
$scope.dj_id="";
$scope.lat=0.0;
$scope.long=0.0;
$scope.songRequests =[];
$scope.twitterUrl = 'https://twitter.com/intent/tweet?button_hashtag=NOGOLEGoDJ&text=';
$scope.moodUrl='I just sent a ' + $scope.mood_title + 'mood request to DJ' + $scope.dj_id +'http://goo.gl/V31Ewl';
$scope.songUrl='I just requested ' + $scope.song_title + ' by '+$scope.song_artist + ' to DJ' + $scope.dj_id +'http://goo.gl/V31Ewl';

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

$scope.submitShoutout = function() {

  var shoutoutObject = {message:$scope.shoutout_message,dj_id:$scope.dj_id};
  console.log(shoutoutObject);
var request = Shoutout.save(shoutoutObject);
$scope.show=true;
};

//submit mood request
$scope.submitMood = function() {
var moodObject = {requestor_name:$scope.mood_requestor_name,
title:$scope.mood_title,
dj_id:$scope.dj_id,
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
dj_id:$scope.dj_id,
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
  $scope.url = 'ws://'+window.location.host + ':8080';
  $scope.songRequests = [];
  $scope.moodRequests = [];
  var ping = new Audio('sounds/pinger2.mp3');
  //delete songs
  $scope.deleteSong = function($index) {
 Song.destroy($scope.songRequests[$index].id);
 $scope.songRequests.splice($index,1);
 $scope.myRadarChart.datasets[0].points[0].value -= 1;

       $scope.myRadarChart.update();

 $scope.myPolarChart.segments[0].value -= 1;
 // Would update the first dataset's value of 'Green' to be 10
 $scope.myPolarChart.update();
 };
//delete moods
$scope.deleteMood = function($index) {
Mood.destroy($scope.moodRequests[$index].id);
$scope.moodRequests.splice($index,1);
$scope.myPolarChart.segments[1].value -= 1;
// Would update the first dataset's value of 'Green' to be 10
$scope.myPolarChart.update();

$scope.myRadarChart.datasets[0].points[1].value -= 1;

$scope.myRadarChart.update();


};
  //initialize function
  $scope.init = function(channel){
    $scope.polarData;
    $scope.radarData;


     $http.get('/api/v1/songs').success(function(data){
       $scope.songRequests = data;
       $http.get('/api/v1/moods').success(function(data){
         $scope.moodRequests = data;




         console.log($scope.totalRequests);
         $scope.polarData = [
             {
                 value: $scope.songRequests.length,
                 color:"#F7464A",
                 highlight: "#FF5A5E",
                 label: "Song Requests"
             },
             {
                 value: $scope.moodRequests.length,
                 color: "#46BFBD",
                 highlight: "#5AD3D1",
                 label: "Mood Requests"
             }
         ];

         $scope.radarData = {
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
                    data: [$scope.songRequests.length,$scope.moodRequests.length]
                },
            ]
        };



        var polar = document.getElementById("polarchart").getContext("2d");
        $scope.myPolarChart = new Chart(polar).PolarArea($scope.polarData);
        //chart-----------------------------------------------





            var ctx = document.getElementById("radarchart").getContext("2d");

           $scope.myRadarChart = new Chart(ctx).Radar($scope.radarData);



        //console.log(myRadarChart);
        //end chart------------------------------------------
            var larapush = new Larapush($scope.url);
            //TODO make dynamic
            larapush.watch(channel).on('song.request', function(msgEvent)
            {
              ping.play();
              var myData = JSON.parse(msgEvent.message);
              console.log(myData);
              $scope.$apply(function(){
              $scope.songRequests.push(myData);
              $scope.totalRequests = $scope.songRequests.length + $scope.moodRequests.length;
              });


        	$scope.myRadarChart.datasets[0].points[0].value += 1;

                $scope.myRadarChart.update();

        	$scope.myPolarChart.segments[0].value += 1;
        // Would update the first dataset's value of 'Green' to be 10
        	$scope.myPolarChart.update();
            });
            larapush.watch(channel).on('mood.request', function(msgEvent)
            {
              ping.play();
        	var myData = JSON.parse(msgEvent.message);
              console.log(msgEvent.message);
              $scope.$apply(function(){
              $scope.moodRequests.push(myData);
              $scope.totalRequests = $scope.songRequests.length + $scope.moodRequests.length;
        	$scope.myPolarChart.segments[1].value += 1;
        // Would update the first dataset's value of 'Green' to be 10
        $scope.myPolarChart.update();

        $scope.myRadarChart.datasets[0].points[1].value += 1;

        $scope.myRadarChart.update();

              });
        //console.log(channel);
            });

       });


     });




};

$scope.totalRequests = $scope.songRequests.length + $scope.moodRequests.length;
$scope.init();

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

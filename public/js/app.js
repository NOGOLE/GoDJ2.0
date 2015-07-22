
var app = angular.module("godj", ['ngRoute','ui.bootstrap','djds4rce.angular-socialshare','godj.services','ngMap']);

/*Constants*/
app.constant('GEOCODING_API_KEY','AIzaSyBCDNt1biVyfA8h-eCZyZ69CKS6NNBCeEQ');
app.config(function($locationProvider){
    $locationProvider.html5Mode(true).hashPrefix('!');
});



/*Angular Modal */


// Please note that $modalInstance represents a modal window (instance) dependency.
// It is not the same as the $modal service used above.

app.controller('ModalInstanceCtrl', function ($scope, $modalInstance,dj) {

$scope.dj_id = dj

  $scope.ok = function () {
    $modalInstance.close();
  };

  $scope.cancel = function () {
    $modalInstance.dismiss('cancel');
  };
});

/*End Angular Modal*/


//RequestController-----------------------------------------------------------

app.controller(
"RequestController",
function($scope,Mood, Song,Shoutout,$modal) {
  $scope.songRequest = {};
  $scope.moodRequest = {};

$scope.dj_id="";
$scope.lat=0.0;
$scope.long=0.0;
$scope.songRequests =[];
$scope.url = 'ws://'+window.location.host+':8080';
$scope.open = function () {

  var modalInstance = $modal.open({
    animation: true,
    templateUrl: 'myModalContent.html',
    controller: 'ModalInstanceCtrl',
    size: 'lg',
    resolve: {
      dj: function () {
        return $scope.dj_id;
      }
    }
  });
};
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

  var shoutoutObject = {message:$scope.shoutout_message,dj_id:sessionStorage.dj};
  console.log(shoutoutObject);
var request = Shoutout.save(shoutoutObject);
$scope.show=true;
};

//submit mood request
$scope.submitMood = function() {
var moodObject = {requestor_name:$scope.moodRequest.mood_requestor_name,
title:$scope.moodRequest.mood_title,
dj_id:$scope.dj_id,
lat:$scope.lat,
long:$scope.long
};
sessionStorage.dj = $scope.dj_id;
var request = Mood.save(moodObject);
$scope.mood_title ="";
$scope.open('lg');
return request;

}
//submit song request
$scope.submitSong = function() {
//create JSON object to insert into post
var songObject = {requestor_name:$scope.songRequest.song_requestor_name,
title:$scope.songRequest.song_title,
artist:$scope.songRequest.song_artist,
dj_id:$scope.dj_id,
lat:$scope.lat,
long:$scope.long };
sessionStorage.dj = $scope.dj_id;
console.log(songObject);
var request = Song.save(songObject);
$scope.song_title ="";
$scope.song_artist ="";
$scope.open('lg');
return request;
}
});
/*Profile Controller
------------------------------------------------------------
*/

app.controller('ProfileController',function($scope,Mood,Song, $http,GEOCODING_API_KEY){


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
 $scope.myPolarChart.update();
 };
//delete moods
$scope.deleteMood = function($index) {
Mood.destroy($scope.moodRequests[$index].id);
$scope.moodRequests.splice($index,1);
$scope.myPolarChart.segments[1].value -= 1;
$scope.myPolarChart.update();
$scope.myRadarChart.datasets[0].points[1].value -= 1;
$scope.myRadarChart.update();
};

$scope.submitParty = function(id) {
  var stime = document.getElementById('party_start_time').value;
  var etime = document.getElementById('party_end_time').value;
  var partyObject = {};

  $http.get('https://maps.googleapis.com/maps/api/geocode/json?address='+$scope.party_address+$scope.party_city+$scope.party_state+'&key='+GEOCODING_API_KEY)
  .success(function(data){
    var data = data.results[0].geometry.location;
    partyObject = {id:id, name: $scope.party_name, address:$scope.party_address,description:$scope.party_description,
    city:$scope.party_city,state:$scope.party_state,zip:$scope.party_zip,start_time:stime,end_time:etime,lat:data.lat,lng:data.lng};
    //console.log(partyObject);

      $http.post('/api/v1/parties',partyObject)
      .success(function(data){
        console.log(data);
      });


  });


  console.log(partyObject);
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
    console.log(data);
    $scope.parties = data;
  });
  //$scope.init();

};

});

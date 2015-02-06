var restService = angular.module('godjServices',['ngResource']);
//song resource for REST calls
restService.factory('Song',['$resource',
function($resource){
	return $resource('/api/songs:id',{}, {
	query: {method:'GET',isArray:true},
	save: {method:'POST'}
	delete: {method:'DELETE'}

});
}]);
//mood resource for REST calls
restService.factory('mood',['$resource',
function($resource){
	return $resource('/api/moods:id',{}, {
	query: {method:'GET', isArray:true},
	save: {method:'POST'},
	delete: {method:'DELETE'}
});
}]);


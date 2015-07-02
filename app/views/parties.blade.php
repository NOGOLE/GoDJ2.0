@extends('layouts.master')

@section('sidebar')

@stop
@section('content')
<h1>GoDJ Parties </h1>
<h3> See What's Poppin'!!</h3>
<div ng-controller="PartyController" ng-init="init()">
<table class="table jumbotron" id="partyTable">
<tr>
<th>Name</th>
<th>Description</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip</th>
<th>Start Time</th>
<th>End Time</th>
</tr>

<tr ng-repeat="x in parties">
<td>{{x.name}}</td>
<td>{{x.description}}</td>
<td>{{x.address}}</td>
<td>{{x.city}}</td>
<td>{{x.state}}</td>
<td>{{x.zip}}</td>
<td>{{x.start_time}}</td>
<td>{{x.end_time}}</td>
<td><form action="http://maps.google.com/maps" method="get" target="_blank">
   <input type="hidden" name="daddr" value="{{x.address+ ' '+x.city + ' '+ x.state+ ' '+ x.zip}}" />
   <input type="submit" class="btn btn-info" value="Get directions" />
</form></td>

</tr>

</table>
@stop

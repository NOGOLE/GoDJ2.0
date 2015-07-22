@extends('layouts.master')

@section('sidebar')


@section('content')
<h1>GoDJ Parties </h1>
<h3> See What's Poppin'!!</h3>
<div ng-controller="PartyController" ng-init="init()">
  <map style="color:black;"center="current-location" zoom="4">
    <marker id="marker"ng-repeat="p in parties" position="{{p.lat}},{{p.lng}}" on-click="showInfoWindow(event, 'bar')">

    <info-window id="bar" visible-on-marker="marker">
      <div ng-non-bindable="">
        <div id="siteNotice"></div>
        <h1 id="firstHeading" class="firstHeading">{{p.name}}</h1>
        <div id="bodyContent">
          <p>{{p.description}}</p>
          <br>
          {{p.address}} {{p.city}} {{p.state}}
          <br>


          <form action="http://maps.google.com/maps" method="get" target="_blank">
             <input type="hidden" name="daddr" value="{{p.address+ ' '+p.city + ' '+ p.state+ ' '+ p.zip}}" />
             <input type="submit" class="btn btn-info" value="Get directions" />
          </form>
          </p>
        </div>
      </div>
    </info-window>
  </marker>
   <info-window position="current-location" visible="true">
     <span>You are here! Explore nearby parties!</span>
   </info-window>
 </map>

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

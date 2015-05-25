@extends('layouts.master')

@section('sidebar')

@stop

@section('content')
<div class="jumbotron">
Let the world know where you are spinnin' at!
</div>
{{ Form::open(array('url' => '')) }}

<p>{{Form::text('name', Input::old('name'), array('class'=>'request_form_field','id'=>'name','placeholder' => 'Party Name')) }}
<p>{{Form::text('address', Input::old('address'), array('class'=>'request_form_field','id'=>'address','placeholder' => 'Party Address')) }}
<p>{{Form::text('city', Input::old('city'), array('class'=>'request_form_field','id'=>'city','placeholder' => 'Party City')) }}
<p>{{Form::text('state', Input::old('state'), array('class'=>'request_form_field','id'=>'state','placeholder' => 'Party State')) }}
<p>{{Form::text('zip', Input::old('zip'), array('class'=>'request_form_field','id'=>'zip','placeholder' => 'Party Zip')) }}
<p>{{ Form::button('Submit!', array('class' => 'btn btn-primary', 'ng-click' =>'submitParty()')) }}</p>
	{{ Form::close() }}
@stop

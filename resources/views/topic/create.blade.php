@extends('layout.master')
@section('menu')
@parent
@endsection

@section('content')
<div class="row">
	<div class="label label-info">{{$page}}</div>
</div>
<div class="row">
	{!! Form::model($topic, array('action'=>'TopicController@store')) !!}

	<div class="form-group">
		{!! Form::label('topicname','Введите название топика') !!}
		{!! Form::text('topicname',"",array('class'=>'form-control')) !!}
	</div>
	<button type="submit" class="btn btn-success">Добавить</button>
	{!! Form::close() !!}
</div>
<div class="row">
	@if(count(session('errors'))>0)
	<div class="alert alert-danger">
		@foreach(session('errors')->all() as $er)
		{{$er}}<br/>
		@endforeach
	</div>
	@endif
	@if(session('message'))
	<div class="alert alert-success">
		{{session('message')}}
	</div>
	@endif
</div>
@endsection
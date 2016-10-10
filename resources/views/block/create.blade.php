@extends('layout.master')
@section('menu')
@parent
@endsection

@section('content')
<div class="row">
	<div class="label label-info">{{$page}}</div>
</div>
<div class="row">
	{!! Form::model($block, array('action'=>'BlockController@store', 'files'=>true, 'class'=>'form'))!!}
	<div class="form-group">
		{!! Form::label('topicid','Выберите топик') !!}
		{!! Form::select('topicid',$topics, array('class'=>'form-control')) !!}
		<a href="{{url('topic/create')}}" class='btn btn-info'>Добавить новый топик</a>
	</div>


	<div class="form-group">
		{!! Form::label('title','Заголовок блока') !!}
		{!! Form::text('title','', array('class'=>'form-control')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content','Добавьте контент блока') !!}
		{!! Form::textarea('content',"",array('class'=>'form-control')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('imagepath','Добавьте картинку') !!}
		{!! Form::file('imagepath',"",array('class'=>'form-control')) !!}
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
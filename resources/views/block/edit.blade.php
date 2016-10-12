@extends('layout.master')
@section('menu')
@parent
@endsection

@section('content')

{!!Form::model($block, array('route'=>array('block.update',$block->id), 'method'=>'PUT'))!!}



<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title',$block->title,array('class'=>'form-control'))!!}
</div>

<div class="form-group ">
	{!! Form::label('topicid','Выберите топик') !!}
	{!! Form::select('topicid',$topics, $block->topicid, array('class'=>'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('content','Измените контент блока') !!}
	{!! Form::textarea('content', $block->content, array('class'=>'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('imagepath','Измените картинку') !!}
	{!! Form::file('imagepath', '', array('class'=>'form-control')) !!}
</div>

{!! Form::submit('Edit the Block!', array('class'=>'btn btn-primary')) !!}


{!! Form::close() !!}
@endsection
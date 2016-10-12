@extends('layout.master')
@section('menu')
@parent
@endsection

@section('content')
<div class="row">
	<div class="col-md-3">
		{!! Form::open(['action'=>'TopicController@search']) !!}
		<div class="form-group">
			{!! Form::text('search','',['class'=>'form-control']) !!}
			<button class="btn btn-success" type="submit"> Поиск <span class="glyphicon glyphicon-search"></span></button>
		</div>
		{!! Form::close() !!}
		<ul class="list-group">
			@foreach($topics as $t)
			<li class="list-group-item">
				<a href="{{url('topic/'.$t->id)}}" >
					<span class="glyphicon glyphicon-plus"></span> 
					{{$t->topicname}}
					<span class="glyphicon glyphicon-plus"></span> 
				</a>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="col-md-9">
		@if($id !=0)
		@foreach($blocks as $b)
		<div>
			<div class="well">
				<div class="row">
					<h2>{{$b->title}}</h2>
					{!! Form::model($b, array('route'=>array('block.update',$b->id), 'method'=>'PUT')) !!}
					<a class ="btn btn-info btn-xs" href="{{url('block/'.$b->id.'/edit')}}">Редактировать</a>
					<br>	
					{!! Form::close() !!}<br>
		 		
					{!! Form::open(array('route'=>array('block.destroy',$b->id))) !!}

					{!! Form::hidden('_method','DELETE') !!}

					{!! Form::submit('Удалить', array('class'=>'btn')) !!}
					
				
					{!! Form::close() !!}<br>
				</div>
				@if($b->imagePath !="")
				<a href="{{url($b->imagePath)}}" target="_blank" class="wrap-image">
					<img src="{{asset($b->imagePath)}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"/>
				</a>
				@endif
				<pre class="pre_text">{{$b->content}}</pre>
			</div>
		</div>
		@endforeach
		@endif
	</div>
</div>
@endsection
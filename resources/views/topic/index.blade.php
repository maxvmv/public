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
					<h2>{{$b->title}}</h2>
					@if($b->imagePath !='')
						<a href="{{url($b->imagePath)}}" target="_blank" class="wrap-image">
							<img src="{{asset($b->imagePath}}"  height = "150px" alt="img"/>
						</a>
					@endif
					<pre>{{$b->content}}</pre>
				</div>
			@endforeach
		@endif
	</div>
</div>
@endsection
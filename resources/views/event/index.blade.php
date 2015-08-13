@extends('planear')

@section('content')

<div class="container">
	<div class="container">
		<table class="table" >
			<thead >
				<th width="200px">ID</th>
				<th width="250px">Name</th>
				<th width="250px">Location</th>
				<th width="150px">Operaciones</th>
			</thead>
			@foreach ($event as $u)
			<tbody>
				<td>{{$u->id_event}}</td>
				<td>{{$u->event_name}}</td>
				<td>{{$u->event_desc}}</td>
				<td>
<a href="{{$url = action('EventController@edit', $u->id_event) }}" class= "btn btn-primary" method="post">Editar <span class="glyphicon glyphicon-pencil"></span> </a>
<a href="{{$url = action('EventController@destroy', $u->id_event) }}" class= "btn btn-danger" method="delete">Eliminar <span class="glyphicon glyphicon-remove"></span> </a>
			
				<!-- ya me hace de una la indexacion del us con su id corresp, y eso se lo paso a usuario.editar -->
			</td>
			</tbody>
			@endforeach

		</table>

	</br>
	<a href="event/create" class= "btn btn-primary">New Event <span class="glyphicon glyphicon-plus"></span></a>
	{{-- <a class="btn btn-warning"> Modify Event </a>
	<a class="btn btn-danger"> Delete Event </a> --}}

	</br>
	</div>	
</div>


@endsection

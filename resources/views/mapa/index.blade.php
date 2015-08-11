@extends('planear')

@section('content')

<div class="container">
	<div class="container">
		<table class="table" >
			<thead >
				<th width="200px">ID</th>
				<th width="250px">Name</th>
				<th width="250px">Latitud</th>
				<th width="150px">Longitud</th>
				<th width="150px">Longitud</th>
			</thead>
			@foreach ($mapa as $u)
			<tbody>
				<td>{{$u->id}}</td>
				<td>{{$u->title}}</td>
				<td>{{$u->lat}}</td>
				<td>{{$u->lng}}</td>
				<td>
				{!!link_to_route('mapa.show', $title = 'Ver Ubicacion', $parameters = $u->id,
				$attributes = ['class'=>'btn btn-primary'])!!}
			
				<!-- ya me hace de una la indexacion del us con su id corresp, y eso se lo paso a usuario.editar -->
			</td>
			</tbody>
			@endforeach

		</table>

	</br>
	<a href="mapa/create" class= "btn btn-primary">New Event <span class="glyphicon glyphicon-plus"></span></a>
	{{-- <a class="btn btn-warning"> Modify Event </a>
	<a class="btn btn-danger"> Delete Event </a> --}}

	</br>
	</div>	
</div>
    @section('script')
    {!!Html::script('js/cargarDatos.js')!!}
 	@endsection


@endsection

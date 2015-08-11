@extends ('planear')

@section('content') 
 <div class="container" >

		<!-- model es como open, pero ya me va a cargar los campos con los datos del modelo
		 $events->idUsuario  es con loq busca -->
		{!!Form::model($event,['route'=>['event.update', $event->id],'method'=>'PUT'] )!!}
<div class="form-group" >
	{!!Form::label('event_name','Name: ')!!}
	{!!Form::text('event_name',null,['id'=> 'event_name', 'class'=> 'form-control', 'placeholder'=>'event_name aca'])!!}
</div>
<div class="form-group" >
	{!!Form::label('event_desc','Description: ')!!}
	{!!Form::text('event_desc',null,['id'=> 'event_desc', 'class'=> 'form-control', 'placeholder'=>'event_desc aca'])!!}
</div>
<div class="form-group" >
	{!!Form::label('event_date','event_date: ')!!}
	{!!Form::date('event_date',null,['id'=> 'event_date', 'class'=> 'form-control', 'placeholder'=>'cantidad aca'])!!}
</div>
<div class="form-group" >
	{!!Form::label('event_type','type: ')!!}
{!!Form::select('event_type', array('def' => 'Select Type','Party' => 'Party', 'Work' => 'Work', 'Friendly' => 'Friendly', 'Other' => 'Other'), $event->event_type,array('class' => 'form-control'))!!}
</div>
<div class="form-group" >
	{!!Form::label('event_loca','event_loca: ')!!}
	{!!Form::text('event_loca',null,['id'=> 'event_loca', 'class'=> 'form-control', 'placeholder'=>'event_loca aca'])!!}
</div>
<div class="form-group" >
	{!!Form::label('event_priv','event_priv: ')!!}
	{!!Form::text('event_priv',null,['id'=> 'event_priv', 'class'=> 'form-control', 'placeholder'=>'event_priv aca'])!!}
</div>

</br>
		<div class="row">
  			<div class="col-md-2">
		{!!Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
		{!!Form::close()!!}
			</div>
			<div class="col-md-2">
			{!!Form::open(['route'=>['event.destroy', $event->id],'method'=>'DELETE'] )!!}
			{!!Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
			{!!Form::close()!!}
			</div>
<input type="button" value="Cancelar" class="btn btn-warning" onclick= "self.location.href = '../../event' "/>
		</div>
</div>
@stop
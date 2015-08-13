{{-- FORMULARIO --}}
<div class="container" >
    {!!Form::open(['route'=>'event.store','method'=>'POST','files'=>false])!!}
    {{-- {!!Form::open()!!} --}}
<div class="form-group" >
  {!!Form::label('event_name','Name: ')!!}
  {!!Form::text('event_name',null,['id'=> 'event_name', 'class'=> 'form-control', 'placeholder'=>'event_name aca'])!!}
</div>                
<div class="form-group" >
  {!!Form::label('event_desc','Description: ')!!}
  {!!Form::text('event_desc',null,['id'=> 'event_desc', 'class'=> 'form-control', 'placeholder'=>'event_desc aca'])!!}
</div>
<div class="form-group" >
  {!!Form::label('event_date','Date of the event? ')!!}
  {!!Form::date('event_date',null,['id'=> 'event_date', 'class'=> 'form-control', 'placeholder'=>'cantidad aca'])!!}
</div>
<div class="form-group" >
  {!!Form::label('event_type','Type: ')!!}
{!!Form::select('event_type', array('noTipe' => 'Select Type','Party' => 'Party', 'Work' => 'Work', 'Friendly' => 'Friendly', 'Other' => 'Other'), 'noTipe',array('class' => 'form-control'))!!}
</div>
<div class="form-group" >
  <div class="form-group">
<div class="form-group" >
  {!!Form::label('event_loca','Ubicacion del evento? ')!!}
  {!!Form::text('event_loca',null,['id'=> 'event_loca', 'class'=> 'form-control', 'placeholder'=>'event_loca aca'])!!}
</div>
 . 
   <!-- <input type="text" id="searchmap" class="form-control"> -->
          <div id="map-canvas"></div>
        
        <div class="form-group">
          <label for="">Lat</label>
          <input type="text" id="lat" name="lat" class="form-control input-sm">   
        </div>

        <div class="form-group">
          <label for="">Lng</label>
          <input type="text" id="lng" name="lng" class="form-control input-sm">
        </div>   
</div>
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
{!!Form::select('event_type', array('def' => 'Select Type','Party' => 'Party', 'Work' => 'Work', 'Friendly' => 'Friendly', 'Other' => 'Other'), 'def',array('class' => 'form-control'))!!}
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

<!--
<div class="form-group">
<h2>event type</h2>
            <li class="field">
                <div class="picker">
                    <select ng-model="event_type2">
                        <option value="#" disabled>what kind of event is?...</option>
                        <option>Party</option>
                        <option>Work</option>
                        <option>Friendly</option>
                    </select>
                </div>
            </li>
</div> -->

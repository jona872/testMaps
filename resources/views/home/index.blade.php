@extends('planear')

@section('content')

<h3>Home->allEvent(), seria una portada principal con todos los eventos(onda blog) --> PUBLICOS <-- </h3>
    
 

@foreach ($home as $u)
<div class="container main">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <h2><a href="/blog/year-of-making-stuff/">{{$u->event_name}}  </a> <small>Apr 17, 2015</small></h2>
                Description:<p>{{$u->event_desc}}</p>
                Event Type<p>{{$u->event_type}}</p>
                @if ($u->event_priv == 0)
                    <p>Evento Publico</p>
                @else
                    <p>Evento Privado</p>
                @endif

                <p class="post-meta">Created by <a>{{$u->us_name}}</a> on September 24, 2014</p>
                </div>
                {!!link_to_route('event.show', $title = 'Ver mas ->', $parameters = $u->id_event , $attributes = ['class'=>'btn btn-default'])!!}
            </div>
        </div>
    </div>

    </div>
@endforeach




@endsection

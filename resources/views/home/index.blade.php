@extends('planear')

@section('content')

<h3>Home->allEvent(), seria una portada principal con todos los eventos(onda blog) --> PUBLICOS <-- </h3>
    

@foreach ($home as $u)
<div class="container main" >
         <div class="row">
             <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                 <div class="post-preview">
                     <a href="#">
                         <h2 class="post-title">{{$u->event_name}} </h2>
                         <h3 class="post-subtitle">{{$u->event_desc}} </h3>
                     </a>
                     {{-- event tendria q tener owner, y que se complete con el nobre del us q lo creo
                     asi aca abajo llamo a {{$u->event_owner}} --}}
                     <p class="post-meta">Created by <a>{{$u->us_name}}</a> on September 24, 2014</p>
{!!link_to_route('event.show', $title = 'Ver mas ->', $parameters = $u->id , $attributes = ['class'=>'btn btn-default'])!!}
                 </div>
                 <hr>
            </div>
        </div>
    </div>

@endforeach

<div class="container main">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                <h2><a href="/blog/year-of-making-stuff/">{{$u->event_name}}  </a> <small>Apr 17, 2015</small></h2>
                <p>{{$u->event_desc}}</p>
                <p>{{$u->event_type}}</p>
                @if ($u->event_priv == 0)
                    <p>Evento Publico</p>
                @else
                    <p>Evento Privado</p>
                @endif
                <a>{{$u->event_priv}}</a>

                <p class="post-meta">Created by <a>{{$u->us_name}}</a> on September 24, 2014</p>
                </div>
            </div>
        </div>
    </div>



<ul class="pager"><li class="next"><a href="/blog/page/2/">Next →</a></li></ul>
</div>
    <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body"><h2><a href="/blog/year-of-making-stuff/"> -- </a> <small>Apr 17, 2015</small></h2><p>Well, the <em>rest</em> of the year, anyways. Better late than never, right?</p>

                    <p>Inspired by <a href="http://justinjackson.ca/2014-a-year-of-making-stuff/">Justin
                    Jackson</a> and his <a href="http://buildandlaunch.net/">Build
                    and Launch podcast</a>, I have decided to commit to
                    launching at least 4 new projects this year. It’s not nearly the quickening
                    pace of Justin...</p>
                    </div>
                </div>
            </div>
    </div>


@endsection

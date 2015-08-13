<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use Auth;
use Session;
use Redirect;
use App\User;
use View;

class EventController extends Controller
{

    public function index()
    {//busca todos los eventos del usuario logeado ( por id )
        $id = Auth::user()->id_user; 
        $event = DB::select('SELECT * FROM `event` WHERE `event_owner` = '.$id.' ;');

        return view('event.index',['event'=>$event]);

        // $event = Event::all();
        // return view('event.index',compact('event'));
    }

    public function create()
    {
        // //tener en cuenta x si lo quiero cargar en otra view
        // $type_list = array("Volvo", "BMW", "Toyota");
        // return View::make('event.create')->with('type_list', $type_list);
        //{!!Form::select('type_list', $type_list, null, array('class' => 'picker'))!!}

        return view('event.create');
    }

    public function store(Request $request)
    {
       // dd($request);
        $event = new Event;
        if ($request->event_priv == 'publico')
            $event->event_priv = 0;
        else
            $event->event_priv = 1;
        
        $event->event_name = $request->event_name;
        $event->event_desc = $request->event_desc;
        $event->event_owner = Auth::user()->id_user;
        $event->event_loca = $request->event_loca;
        $event->event_type = $request->event_type;
        $event->event_date = $request->event_date;
        $event->lat = $request->lat;
        $event->lng = $request->lng;

        $event->save();
        
        return redirect('/event')->with('message','Se agrego un nuevo event correctamente');
    }

    public function show($id)
    {   
        $event = Event::find($id);
        return view('event.show', ['event'=>$event]);
    }

    public function edit($id)
    {
        $event = Event::find($id);
        
        return view('event.edit',['event'=>$event]);
    }

    public function update(Request $request, $id)
    {
/*
        $event = Event::find($id);
        $event->fill($request->all());
        $event->save();
*/ 
        $event = Event::find($id);
                if ($request->event_priv == 'publico')
            $event->event_priv = 0;
        else
            $event->event_priv = 1;
          dd($event);
        Session::flash('message','event editado correctamente');
        return Redirect::to('/event');
    }

    public function destroy($id)
    {
        Event::destroy($id);
        Session::flash('message','event eliminado correctamente');
        return Redirect::to('event');
    }
}

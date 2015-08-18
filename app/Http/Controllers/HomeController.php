<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use DB;
use Mapper;

class HomeController extends Controller
{
    public function index()
    {
        //$home = Event::where('event_priv', 0)->get(); puedo agregar el created_at y esas weas 
    
    //$home = DB::select('SELECT * FROM users U, event E WHERE (E.event_priv = 0);');
    $home = DB::select('select 
        E.id_event, E.event_owner,E.event_name,E.event_desc,E.event_type,E.event_priv,U.id_user,U.us_name
        from users U, event E 
        where (E.event_priv = 0) and (U.id_user = E.event_owner)');
    //dd($home);
    //dd($events);
    
    if ($home==null)
        return view('welcome');
    else
    return view('home.index',['home'=>$home]);
       
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}

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
    $home = DB::select('SELECT `event`.`id`,`event`.`event_name`,`event`.`event_desc`,
        `event`.`event_date`,`event`.`event_type`,`event`.`event_loca`,
        `event`.`event_owner`, `event`.`event_priv`,`users`.`id`, `users`.`us_name` 
        FROM `event`, `users` WHERE (`event`.`event_priv` =0 );');
 
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

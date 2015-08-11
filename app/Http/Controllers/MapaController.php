<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sesion;
use App\Mapa;
use Session;
use Input;

class MapaController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mapa = Mapa::All();
        return view('mapa.index',compact('mapa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('mapa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // si no llegas a usar Input::get('lat') podes estar desde las 8 am hasta las
        // y me re cago en la puta.... 
        $mapa = new mapa;

        $mapa->title = $request->title;
        $mapa->lat = Input::get('lat');
        $mapa->lng = Input::get('lng'); 
        
        $mapa->save();

        return redirect('/mapa');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {   
        $mapa=Mapa::find($id);
        // echo $mapa->title;
        // echo $mapa->lat;
        // echo $mapa->lng;
        return view('mapa.show',compact('mapa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

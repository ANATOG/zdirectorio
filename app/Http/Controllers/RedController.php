<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Red;

class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar=$request->buscar;
        $criterio=$request->criterio;

        if($buscar=='')
        {
            $redes = Red::orderBy('id', 'desc')->paginate(10);   
        }
        else
        {
            $redes = Red::where($criterio, 'like', '%'.$buscar.'%')-> orderBy('id', 'desc')->paginate(10); 
        }

        return
        [
            'pagination' => [
                'total'         =>$redes->total(),
                'current_page'  => $redes->currentPage(),
                'per_page'      => $redes->perPage(),
                'last_page'     => $redes->lastPage(),
                'from'          => $redes->firstItem(),
                'to'            => $redes->lastItem(),
            ],
       
            'redes' => $redes
        ];
    }

    public function selectRed(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $redes= Red::where('condicion','=','1')
        ->select('id','nombre')
        ->orderBy('nombre', 'asc')
        ->get();

        return['redes'=>$redes];
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $red = new Red();
        $red->nombre = $request->nombre;
        $red->condicion ='1';
        $red->save();

    }
       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $redes = Red::findOrFail($request->id);
        $redes->nombre = $request->nombre;
        $redes->condicion ='1';
        $redes->save(); 
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $red = Red::findOrFail($request->id);
        $red->condicion ='0';
        $red->save(); 
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $red = Red::findOrFail($request->id);
        $red->condicion ='1';
        $red->save(); 
    }
}

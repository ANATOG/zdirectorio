<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tipo;

class TipoController extends Controller
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
            $tipos = Tipo::orderBy('id', 'desc')->paginate(10);   
        }
        else
        {
            $tipos = Tipo::where($criterio, 'like', '%'.$buscar.'%')-> orderBy('id', 'desc')->paginate(10); 
        }

        return
        [
            'pagination' => [
                'total'         =>$tipos->total(),
                'current_page'  => $tipos->currentPage(),
                'per_page'      => $tipos->perPage(),
                'last_page'     => $tipos->lastPage(),
                'from'          => $tipos->firstItem(),
                'to'            => $tipos->lastItem(),
            ],
       
            'tipos' => $tipos
        ];
    }

    public function selectTipo(Request $request)
    {
      //  if(!$request->ajax()) return redirect('/');
        $filtro =$request->filtro;

        $tipos= Tipo::where('condicion','=','1')
        ->where('nombre', 'like', '%'.$filtro.'%')
        ->select('id','nombre')
        ->orderBy('nombre', 'asc')
        ->get();

        return['tipos'=>$tipos];
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
        $tipo = new Tipo();
        $tipo->nombre = $request->nombre;
        $tipo->condicion ='1';
        $tipo->save();

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
        $tipos = Tipo::findOrFail($request->id);
        $tipos->nombre = $request->nombre;
        $tipos->condicion ='1';
        $tipos->save(); 
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $tipo = Tipo::findOrFail($request->id);
        $tipo->condicion ='0';
        $tipo->save(); 
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $tipo = Tipo::findOrFail($request->id);
        $tipo->condicion ='1';
        $tipo->save(); 
    }
}

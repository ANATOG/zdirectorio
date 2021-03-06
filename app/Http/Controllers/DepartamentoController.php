<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
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
            $departamentos = Departamento::orderBy('id', 'desc')->paginate(10);   
        }
        else
        {
            $departamentos = Departamento::where($criterio, 'like', '%'.$buscar.'%')-> orderBy('id', 'desc')->paginate(10); 
        }

        return
        [
            'pagination' => [
                'total'         =>$departamentos->total(),
                'current_page'  => $departamentos->currentPage(),
                'per_page'      => $departamentos->perPage(),
                'last_page'     => $departamentos->lastPage(),
                'from'          => $departamentos->firstItem(),
                'to'            => $departamentos->lastItem(),
            ],
       
            'departamentos' => $departamentos
        ];
    }

    public function selectDepartamento(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $departamentos= Departamento::where('condicion','=','1')
        ->select('id','nombre')
        ->orderBy('nombre', 'asc')
        ->get();

        return['departamentos'=>$departamentos];
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
        $departamento = new Departamento();
        $departamento->nombre = $request->nombre;
        $departamento->condicion ='1';
        $departamento->save();

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
        $departamento = Departamento::findOrFail($request->id);
        $departamento->nombre = $request->nombre;
        $departamento->condicion ='1';
        $departamento->save(); 
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $departamento = Departamento::findOrFail($request->id);
        $departamento->condicion ='0';
        $departamento->save(); 
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $departamento = Departamento::findOrFail($request->id);
        $departamento->condicion ='1';
        $departamento->save(); 
    }
}

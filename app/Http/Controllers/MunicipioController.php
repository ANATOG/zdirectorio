<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Municipio;


class MunicipioController extends Controller
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
            $municipios = Municipio::join('departamentos','municipios.idDepartamento','=','departamentos.id')
            ->select('municipios.id', 'municipios.idDepartamento', 'municipios.nombre', 'municipios.condicion', 'departamentos.nombre as departamento')
            ->orderBy('municipios.id', 'desc')->paginate(10);   
        }
        else
        {
            $municipios = Municipio::join('departamentos','municipios.idDepartamento','=','departamentos.id')
            ->select('municipios.id', 'municipios.idDepartamento', 'municipios.nombre', 'municipios.condicion', 'departamentos.nombre as departamento')
            ->where('municipios.'.$criterio, 'like', '%'.$buscar.'%')
            ->orderBy('municipios.id', 'desc')->paginate(10);  
        }

        return
        [
            'pagination' => [
                'total'         => $municipios->total(),
                'current_page'  => $municipios->currentPage(),
                'per_page'      => $municipios->perPage(),
                'last_page'     => $municipios->lastPage(),
                'from'          => $municipios->firstItem(),
                'to'            => $municipios->lastItem(),
            ],
       
            'municipios' => $municipios
        ];
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
        $municipio = new Municipio();
        $municipio->nombre = $request->nombre;
        $municipio->idDepartamento = $request->idDepartamento;
        $municipio->condicion ='1';
        $municipio->save();

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
        $municipio = Municipio::findOrFail($request->id);
        $municipio->nombre = $request->nombre;
        $municipio->idDepartamento = $request->idDepartamento;
        $municipio->condicion ='1';
        $municipio->save(); 
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $municipio = Municipio::findOrFail($request->id);
        $municipio->condicion ='0';
        $municipio->save(); 
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $municipio = Municipio::findOrFail($request->id);
        $municipio->condicion ='1';
        $municipio->save(); 
    }
 
    public function selectMunicipio(Request $request)
    {

        //if(!$request->ajax()) return redirect('/');
        $municipios= Municipio::where('condicion','=','1')
        ->where('idDepartamento','=',$request->id)
        ->select('id','nombre')
        ->orderBy('nombre', 'asc')
        ->get();

        return['municipios'=>$municipios];
    }
}

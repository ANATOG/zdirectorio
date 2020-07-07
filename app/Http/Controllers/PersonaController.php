<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Persona;

class PersonaController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->ajax()) return redirect('/');

        $buscar=$request->buscar;
        $criterio=$request->criterio;

        if($buscar=='')
        {
            $personas = Persona::join('categorias','personas.idCategoria','=','categorias.id')
            ->select('personas.id', 'personas.idCategoria', 'personas.nombres', 'personas.apellidos',
            'personas.titulo', 'personas.colegiado', 'personas.profesion', 'personas.biografia', 'personas.experiencia',
            'personas.preferencia','personas.condicion', 'categorias.nombre as categoria')
            ->orderBy('personas.id', 'desc')->paginate(10);      
        }
        else
        {
            $personas = Persona::join('categorias','personas.idCategoria','=','categorias.id')
            ->select('personas.id', 'personas.idCategoria', 'personas.nombres', 'personas.apellidos',
            'personas.titulo', 'personas.profesion', 'personas.biografia', 'personas.experiencia',
            'personas.preferencia', 'personas.colegiado','personas.condicion', 'categorias.nombre as categoria')
            ->where('personas.'.$criterio, 'like', '%'.$buscar.'%')
            ->orderBy('personas.id', 'desc')->paginate(10);           
            
        }

        return
        [
            'pagination' => [
                'total'         =>$personas->total(),
                'current_page'  => $personas->currentPage(),
                'per_page'      => $personas->perPage(),
                'last_page'     => $personas->lastPage(),
                'from'          => $personas->firstItem(),
                'to'            => $personas->lastItem(),
            ],
       
            'personas' => $personas
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
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->titulo = $request->titulo;
        $persona->biografia = $request->biografia;
        $persona->experiencia = $request->experiencia;
        $persona->idCategoria = $request->idCategoria;
        $persona->colegiado = $request->colegiado;
        $persona->condicion ='1';
        $persona->profesion = $request->profesion;
        $persona->preferencia = $request->preferencia;
        $persona->save();

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
        $persona = Persona::findOrFail($request->id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->titulo = $request->titulo;
        $persona->biografia = $request->biografia;
        $persona->experiencia = $request->experiencia;
        $persona->idCategoria = $request->idCategoria;
        $persona->colegiado = $request->colegiado;
        $persona->condicion ='1';
        $persona->profesion = $request->profesion;
        $persona->preferencia = $request->preferencia;
        $persona->save();
    }
    public function desactivar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $persona = Persona::findOrFail($request->id);
        $persona->condicion ='0';
        $persona->save(); 
    }
    public function activar(Request $request)
    {
        if(!$request->ajax()) return redirect('/');
        $persona = Persona::findOrFail($request->id);
        $persona->condicion ='1';
        $persona->save(); 
    }
}

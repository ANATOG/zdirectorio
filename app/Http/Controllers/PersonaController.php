<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Persona;
use App\Direccion;
use App\Social;
use App\Especialidad;
use App\Preservicio;

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

        try{
            DB::beginTransaction();

            ////////llenar datos de la tabla persona////////
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
            ///////////////////////////////////////////////

            /////////llenar la tabla direccion////////////
            $direccion= new Direccion();
            $direccion->linea1=$request->linea1;
            $direccion->linea2=$request->linea2;
            $direccion->idDepartamento=$request->idDepartamento;
            $direccion->idMunicipio=$request->idMunicipio;
            $direccion->idPersona = $persona->id;
            $direccion->condicion ='1';

            /////////llenar las tablas de muchos////////////

            //////////CONTACTOS////////////////////
            $contactos = $request->data1;//Array de contactos
            //Recorro todos los elementos
            foreach($contactos as $ep=>$cont)
            {
                $contacto = new Contacto();
                $contacto->idPersona = $persona->id;
                $contacto->idTipo = $cont['idTipo'];
                $contacto->contacto = $cont['contacto'];
                $contacto->detalle = $cont['detalle'];  
                $contacto->condicion ='1';        
                $contacto->save();
            }  
            ////////////////////////////////////////////////// 
            
            //////////Sociales////////////////////
            $sociales = $request->data2;//Array de redes sociales
            //Recorro todos los elementos
            foreach($redes as $ep=>$soc)
            {
                $social = new Social();
                $social->idPersona = $persona->id;
                $social->idRed = $soc['idRed'];
                $social->contacto = $soc['contacto'];
                $social->detalle = $soc['detalle'];  
                $social->condicion ='1';        
                $social->save();
            }  
            ////////////////////////////////////////////////// 

            //////////Especialidades////////////////////
            $especialidades = $request->data3;//Array de redes especialidades
            //Recorro todos los elementos
            foreach($especialidades as $ep=>$esp)
            {
                $especialidad = new Especialidad();
                $especialidad->idPersona = $persona->id;
                $especialidad->nombre = $esp['nombre'];
                $especialidad->detalle = $esp['detalle'];  
                $especialidad->condicion ='1';        
                $especialidad->save();
            }  
            ////////////////////////////////////////////////// 

            //////////preservicios////////////////////
            $preservicios = $request->data3;//Array de redes preservicios
            //Recorro todos los elementos
            foreach($preservicios as $ep=>$pre)
            {
                $preservicio = new Preservicio();
                $preservicio->idPersona = $persona->id;
                $preservicio->servicio = $pre['servicio'];
                $preservicio->detalle = $pre['detalle'];  
                $preservicio->condicion ='1';        
                $preservicio->save();
            }  
            //////////////////////////////////////////////////

            DB::commit();
        } catch (Exception $e){
            DB::rollBack();
        }

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





///////////////////////////////prueba para jalar todos los datos/////////////////////////
public function listadoTarjeta(Request $request)
    {
        //if(!$request->ajax()) return redirect('/');

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
       
            'gente' => $personas
        ];
    }

}

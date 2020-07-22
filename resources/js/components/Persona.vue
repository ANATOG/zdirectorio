 <template>
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Escritorio</a></li>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>Personas
                        <button type="button" class="btn btn-secondary" @click="abrirModal('persona','registrar')" >
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option select value="nombres">Nombres</option>
                                      <option value="apellidos">Apellidos</option>
                                      <option value="titulo">Titulo</option>
                                      <option value="profesion">Profesion</option>
                                      <option value="preferencia">Preferencia</option>
                                      <option value="categoria">Categoria</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarPersona(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarPersona(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>                                    
                                        <th>Titulo</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Profesion</th>
                                        <th>Colegiado</th>
                                        <th>Categoria</th>
                                        <th>Preferencia</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="persona in arrayPersona" :key="persona.id">
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm"  @click="abrirModal('persona','actualizar',persona)" >
                                            <i class="icon-eye"></i>
                                            </button> &nbsp;
                                            <button type="button" class="btn btn-warning btn-sm"  @click="abrirModal('persona','actualizar',persona)" >
                                            <i class="icon-pencil"></i>
                                            </button> &nbsp;
                                            <template v-if="persona.condicion">
                                                <button type="button" class="btn btn-danger btn-sm" @click="desactivarPersona(persona.id)">
                                                    <i class="icon-trash"></i>
                                                </button>
                                            </template>
                                            <template v-else>
                                                <button type="button" class="btn btn-success btn-sm" @click="activarPersona(persona.id)">
                                                    <i class="icon-check"></i>
                                                </button>
                                            </template>
                                        </td>
                                        <td v-text="persona.titulo"></td>
                                        <td v-text="persona.nombres"></td>
                                        <td v-text="persona.apellidos"></td>                                    
                                        <td v-text="persona.profesion"></td>
                                        <td v-text="persona.colegiado"></td>
                                        <td v-text="persona.categoria"></td>
                                        <td>
                                            <div v-if="persona.preferencia=='n'">
                                                <span class="badge badge-success">Normal</span>
                                            </div>
                                            <div v-else>
                                                <span class="badge badge-primary">Premium</span>
                                            </div>
                                            
                                        </td>
                                        <td>
                                            <div v-if="persona.condicion">
                                                <span class="badge badge-success">Activo</span>
                                            </div>
                                            <div v-else>
                                                <span class="badge badge-danger">Inactivo</span>
                                            </div>
                                            
                                        </td>
                                    </tr>           
                                
                                </tbody>
                            </table>
                        </div>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item" v-if="pagination.current_page > 1">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page - 1,buscar, criterio)">Ant</a>
                                </li>
                                <!-- aqui se usa la propiedad computada -->
                                <li class="page-item" v-for="page in pagesNumber" :key="page" :class="[page == isActived ? 'active' : '']">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(page, buscar, criterio)" v-text="page"></a>
                                </li>                                
                                <li class="page-item" v-if="pagination.current_page <pagination.last_page">
                                    <a class="page-link" href="#" @click.prevent="cambiarPagina(pagination.current_page + 1, buscar, criterio)">Sig</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>

            <!--Inicio del modal agregar/actualizar PASO 1. INFORMACION PERSONAL-->
            <div class="modal fade"  tabindex="-1" :class="{'mostrar' : modal}" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-primary modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" v-text="tituloModal"></h4>
                            <button type="button" class="close" @click="cerrarModal()" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <!-- Paso 1. Personal -->
                                <div v-if="step === 1">
                                    <h5>Paso 1. Información personal</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Preferencia*</label>
                                            <div class="col-md-12">
                                                <select class="form-control" v-model="preferencia">
                                                    <option disabled value="">Seleccione</option>
                                                    <option value="n" >Normal</option>
                                                    <option value="p" >Premium</option>                                            
                                                </select>
                                            </div>                               
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Categoria*</label>
                                            <div class="col-md-12">
                                                <select class="form-control" v-model="idCategoria">
                                                    <option value="0" disabled>Seleccione</option>
                                                    <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Titulo</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="titulo" class="form-control" placeholder="Titulo">                                        
                                            </div>                             
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Nombres*</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="nombres" class="form-control" placeholder="Nombre">                                        
                                            </div>                           
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Apellidos*</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="apellidos" class="form-control" placeholder="Apellidos">                                        
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Profesion</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="profesion" class="form-control" placeholder="Profesion">                                        
                                            </div>                          
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Colegiado</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="colegiado" class="form-control" placeholder="Colegiado">                                        
                                            </div>
                                        </div>
                                    </div>
                                    
                                   <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Biografia</label>
                                            <div class="col-md-12">
                                                <textarea v-model="biografia" class="md-textarea form-control" rows="3"></textarea>                                        
                                            </div>                                
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Experiencia</label>
                                            <div class="col-md-12">
                                                <textarea v-model="experiencia" class="md-textarea form-control" rows="3"></textarea>                                        
                                            </div>                                
                                        </div>
                                    </div>                                
                                    
                                    <div v-show="errorPersona" class="form-group row div-error">
                                        <div class="text-center text-error">
                                            <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error"></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" @click.prevent="paso1()">Siguente</button>
                                </div>
                                <!-- Fin Paso 1. -->

                                <!-- Paso 2. Dirección -->
                                <div v-if="step === 2">
                                    <h5>Paso 2. Dirección</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Departamento*</label>
                                            <div class="col-md-12">
                                                <select class="form-control" v-model="idDepartamento" @change="onChange()">
                                                    <option value="0" disabled>Seleccione</option>
                                                    <option v-for="departamento in arrayDepartamento" :key="departamento.id" :value="departamento.id" v-text="departamento.nombre"></option>                                           
                                                </select>
                                            </div>                               
                                        </div>  
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Municipio*</label>
                                            <div class="col-md-12">
                                                <select class="form-control" v-model="idMunicipio">
                                                    <option value="0" disabled>Seleccione</option>
                                                    <option v-for="municipio in arrayMunicipio" :key="municipio.id" :value="municipio.id" v-text="municipio.nombre"></option>                                           
                                                </select>
                                            </div>                               
                                        </div>                               
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Linea 1*</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="linea1" class="form-control" placeholder="Detalle de direccion">                                        
                                            </div>                           
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Linea 2</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="linea2" class="form-control" placeholder="Detalle de dirección (opcional)">                                        
                                            </div>
                                        </div>
                                    </div>

                                    <div v-show="errorPersona" class="form-group row div-error">
                                        <div class="text-center text-error">
                                            <div v-for="error in errorMostrarMsjPersona" :key="error" v-text="error"></div>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                    <button class="btn btn-primary" @click.prevent="paso2()">Siguiente</button>                                    
                                </div>
                                
                                <!-- Paso 3. Contacto-->
                                <div v-if="step === 3">
                                    <h5>Paso 3. Información de contacto</h5>
                                    <hr>
                                    <div class="form-group row border">
                                        <div class="form-group col-md-3">
                                            <label class="col-md-12 form-control-label" for="">Tipo de contacto*</label>
                                            <div class="col-md-12">
                                                <v-select
                                                    v-model: nombrecont
                                                    @search="selectTipo"
                                                    label="nombre"
                                                    :options="arrayTipo"
                                                    placeholder="Buscar..."
                                                    @input="getDatosTipo"
                                                >      
                                                </v-select>
                                            </div>                              
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Contacto*</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="contacto" class="form-control" placeholder="Ingrese la dirección/teléfono etc.">                                        
                                            </div>                           
                                        </div>
                                         <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Detalle</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="detallec" class="form-control" placeholder="Detalle de contacto (opcional)">                                        
                                            </div>
                                        </div> 
                                        <div class="form-group col-md-1">
                                            <button @click="agregarContacto()" class="btn btn-primary form-control btnagregar"><i class="icon-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-group row border">
                                        <div class="table-responsive col-md-12">
                                            <table class="table table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr style="background-color: #CEECF5">
                                                        <th>Opciones</th>
                                                        <th>Tipo</th>
                                                        <th>Contacto</th>
                                                        <th>Detalle</th>
                                                    </tr>
                                                </thead>
                                                <tbody v-if="arrayContacto.length">
                                                    <tr v-for="contacto in arrayContacto" :key="contacto.id" >
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm">
                                                                <i class="icon-close"></i>
                                                            </button>
                                                        </td>
                                                        <td v-text="contacto.nombre" >
                                                        </td>
                                                        <td>
                                                            <input v-model="contacto.contacto" type="text" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input v-model="contacto.detallec" type="text" class="form-control">
                                                        </td>
                                                    </tr>
                                                </tbody>

                                                <tbody v-else>
                                                    <tr>
                                                        <td colspan="4">
                                                            Aún no ha ingresado ningun contacto
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                    <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>
                                </div>

                                <!-- Paso 4. Redes Sociales -->
                                <div v-if="step === 4">
                                    <h5>Paso 4. Redes Sociales</h5>
                                    <hr>
                                    <div class="form-row">                                   
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Tipo de Red Social</label>
                                            <div class="col-md-12">
                                                <select class="form-control" v-model="idRed">
                                                    <option disabled value="">Seleccione</option>
                                                    <option value="n" >Normal</option>
                                                    <option value="p" >Premium</option>                                            
                                                </select>
                                            </div>                               
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Contacto</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="contactor" class="form-control" placeholder="Ingrese la dirección/teléfono etc.">                                        
                                            </div>                           
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="col-md-12 form-control-label" for="text-input">Detalle</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="detaller" class="form-control" placeholder="Detalle de contacto (opcional)">                                        
                                            </div>
                                        </div>                              
                                    </div>
                                    <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                    <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>
                                </div>

                                <!-- Paso 5. Especialidades-->
                                <div v-if="step === 5">
                                    <h5>Paso 5. Especialidades</h5>
                                    <hr>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Especialidad</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="nombre" class="form-control" placeholder="Ingrese la especialidad">                                        
                                            </div>                           
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Detalle</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="detallee" class="form-control" placeholder="Detalle de contacto (opcional)">                                        
                                            </div>
                                        </div>                              
                                    </div>
                                    <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                    <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>
                                </div>

                                <!-- Paso 6. Servicios-->
                                <div v-if="step === 6">
                                    <h5>Paso 6. Servicios</h5>
                                    <hr>
                                    <div class="form-row"> 
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Servicio</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="servicio" class="form-control" placeholder="Ingrese el servicio">                                        
                                            </div>                           
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-md-12 form-control-label" for="text-input">Detalle</label>
                                            <div class="col-md-12">
                                                <input type="text" v-model="detalles" class="form-control" placeholder="Detalle de contacto (opcional)">                                        
                                            </div>
                                        </div>                              
                                    </div>
                                    <button class="btn btn-warning" @click.prevent="prev()">Previo</button>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()" >Cerrar</button>
                            <button type="button" v-if="tipoAccion==1 && step==6"  class="btn btn-primary" @click="registrarPersona()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2 && step==6" class="btn btn-primary" @click="actualizarPersona()" >Actualizar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!--Fin del modal-->          



        </main>
</template>

<script>
    import vSelect from "vue-select"
    import 'vue-select/dist/vue-select.css';
    export default {
        data (){
            return {
                step:1,
                persona_id : 0,
                nombres : '',
                apellidos : '',
                titulo : '',
                profesion : '',
                biografia : '',
                colegiado: null,
                experiencia : '',
                preferencia : '',
                idCategoria : 0,

                arrayPersona: [],
                arrayContacto: [],
                arrayRed: [],
                arrayEspecialidad: [],
                arrayServicio: [],
                arrayTipo: [],

                idDepartamento : 0,
                idMunicipio : 0,
                linea1 : '',
                linea2 : '',
                idTipo : 0,
                contacto : '',
                detallec : '',
                idRed : 0,
                contactor : '',
                detaller : '',
                nombrecon:'',
                nombre : '',
                detallee : '',
                servicio : '',
                detalles : '',
                
                modal : 0,
                tituloModal : '',
                tipoAccion : 0, 
                errorPersona: 0,
                errorMostrarMsjPersona : [],
                pagination:{
                    'total' : 0,        
                    'current_page' : 0, 
                    'per_page' : 0,     
                    'last_page' : 0,    
                    'from'   : 0,       
                    'to'  : 0,           
                },
                offset:3,
                criterio: 'nombres',
                buscar: '',
                arrayCategoria: [],
                arrayDepartamento: [],
                arrayMunicipio: [],

                
            }
        },
        components:{
            vSelect
        },
        computed:{
            isActived: function(){
                return this.pagination.current_page;
            },
            //calcula los elementos de la paginacion
            pagesNumber: function(){
                if(!this.pagination.to){
                    return [];
                }
                var from =this.pagination.current_page - this.offset;
                if (from<1)
                {
                    from=1;
                }
                var to = from + (this.offset*2);
                if (to >= this.pagination.last_page)
                {
                    to=this.pagination.last_page;
                }
                var pagesArray=[];
                while(from<=to)
                {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        methods:{
             selectTipo(search,loading){
                let me=this;
                loading(true) 
                var url='/tipo/selectTipo?filtro='+search;
                axios.get(url).then(function (response) {
                    // handle success
                    let respuesta=response.data;
                    q:search;
                   me.arrayTipo = respuesta.tipos;
                   loading(false)
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                });
            },
            getDatosTipo(val1){
                let me = this;
                me.loading = true;
                me.idTipo = val1.id;
                me.nombrecon = val1.nombre;
            },
            agregarContacto(){
                let me=this;
                me.arrayContacto.push({
                    idTipo:me.idTipo,
                    contacto:me.contacto,
                    nombre:me.nombrecon,
                    detallec:me.detallec
                });
            },
            prev() {
            this.step--;
            },
            next() {
            this.step++;
            },
            submit() {
            alert('Submit to blah and show blah and etc.');      
            },
            onChange(value) {
                let me  = this;
                axios.post('/municipio/selectMunicipio',{                    
                    'id' : this.idDepartamento
                }).then(function (response) {
                    var respuesta=response.data;
                    me.arrayMunicipio = respuesta.municipios;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });   
            },
            listarPersona(page, buscar, criterio){
                let me=this;
                var url='/persona?page='+page + '&buscar='+buscar+'&criterio='+criterio;
                axios.get(url).then(function (response) {
                    // handle success
                    var respuesta=response.data;
                   me.arrayPersona = respuesta.personas.data;
                   me.pagination=respuesta.pagination;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },            
            selectCategoria(){
                let me=this;
                var url='/categoria/selectCategoria';
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayCategoria = respuesta.categorias;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            selectDepartamento(){
                let me=this;
                var url='/departamento/selectDepartamento';
                axios.get(url).then(function (response) {
                    var respuesta=response.data;
                    me.arrayDepartamento = respuesta.departamentos;
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
            },
            cambiarPagina(page, buscar, criterio) {
                let me  = this;
                //actualiza la pagina actual
                me.pagination.current_page = page;
                //enviar la peticion para visualizar la data de esa página 
                me.listarMunicipio(page, buscar, criterio);
            },
            registrarPersona(){
                
                if(this.validarPersona()){
                    return;
                }
                let me  = this;
                axios.post('/persona/registrar',{
                    'nombres': this.nombres,
                    'idCategoria': this.idCategoria,
                    'apellidos' : this.apellidos,
                    'titulo' : this.titulo,
                    'colegiado': this.colegiado,
                    'profesion' : this.profesion,
                    'biografia' : this.biografia,
                    'experiencia' : this.experiencia,
                    'preferencia' : this.preferencia
                }).then(function (response) {
                   me.cerrarModal();
                   me.listarPersona(1,'','nombres');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });               
            },
            paso1(){
                let me  = this;
                //me.next();
               if(this.validarPaso1()){
                    return;
                }  
                me.next();          
            },
             paso2(){
                let me  = this;
                //me.next();
               if(this.validarPaso2()){
                    return;
                }  
                me.next();          
            },
            actualizarPersona(){
                if(this.validarPersona()){
                    return;
                }
                let me  = this;
                axios.put('/persona/actualizar',{
                    'id': this.persona_id,
                    'nombres': this.nombres,
                    'idCategoria': this.idCategoria,
                    'apellidos' : this.apellidos,
                    'colegiado': this.colegiado,
                    'titulo' : this.titulo,
                    'profesion' : this.profesion,
                    'biografia' : this.biografia,
                    'experiencia' : this.experiencia,
                    'preferencia' : this.preferencia
                }).then(function (response) {
                   me.cerrarModal();
                   me.listarPersona(1,'','nombres');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });       
            },
            desactivarPersona(id){
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Está seguro de desactivar este registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me  = this;
                    axios.put('/persona/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPersona(1,'','nombres');
                         swalWithBootstrapButtons.fire(
                            'Desactivado!',
                            'El registro ha sido desactivado con éxito.',
                            'success'
                        )
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });  
                   
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                   
                }
                })
            },
            activarPersona(id){
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Está seguro de activar este registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    let me  = this;
                    axios.put('/persona/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarPersona(1,'', 'nombres');
                         swalWithBootstrapButtons.fire(
                            'Activado!',
                            'El registro ha sido activado con éxito.',
                            'success'
                        )
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });  
                   
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    
                }
                })
            },
            validarPaso1(){
                this.errorPersona=0;
                this.errorMostrarMsjPersona=[];

                if(!this.nombres)this.errorMostrarMsjPersona.push("El Nombre del Persona no puede estar vacio");
                if(!this.apellidos)this.errorMostrarMsjPersona.push("El Apellido del Persona no puede estar vacio");
                if(!this.idCategoria)this.errorMostrarMsjPersona.push("El campo categoría no puede estar vacio");
                if(!this.preferencia)this.errorMostrarMsjPersona.push("El campo preferencia no puede estar vacio");

                if(this.errorMostrarMsjPersona.length) this.errorPersona=1;
                return this.errorPersona;
                
            },
             validarPaso2(){
                this.errorPersona=0;
                this.errorMostrarMsjPersona=[];

                if(!this.idDepartamento)this.errorMostrarMsjPersona.push("El departamento no puede estar vacio");
                if(!this.idMunicipio)this.errorMostrarMsjPersona.push("El municipio no puede estar vacio");
                if(!this.linea1)this.errorMostrarMsjPersona.push("La línea 1 no puede estar vacio");

                if(this.errorMostrarMsjPersona.length) this.errorPersona=1;
                return this.errorPersona;
                
            },
            cerrarModal() {
                this.step=1,
                this.modal=0;
                this.tituloModal='';
                this.nombres='';
                this.apellidos = '',
                this.titulo = '',
                this.profesion = '',
                this.biografia = '',
                this.experiencia = '',
                this.colegiado = null,
                this.preferencia = '',
                this.errorPersona=0,
                this.idMunicipio=0,
                this.linea1='',
                this.linea2='',
                this.errorMostrarMsjPersona=[]
            },
            abrirModal(modelo, accion, data=[]){
                step:1;
                switch(modelo){
                    case "persona":
                    {
                        switch(accion)
                        {
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Persona';
                                this.nombres = '';
                                this.apellidos = '';
                                this.titulo = '';
                                this.profesion = '';
                                this.biografia = '';
                                this.experiencia = '';
                                this.preferencia = '';
                                this.colegiado=null;
                                this.idCategoria = 0;
                                this.idDepartamento = 0;
                                this.tipoAccion= 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);
                                this.modal=1;
                                this.tituloModal='Actualizar Persona';
                                this.tipoAccion=2;
                                this.nombres=data['nombres'];
                                this.persona_id=data['id'];
                                this.apellidos = data['apellidos'];
                                this.titulo = data['titulo'];
                                this.profesion = data['profesion'];
                                this.biografia = data['biografia'];
                                this.experiencia = data['experiencia'];
                                this.preferencia = data['preferencia'];
                                this.colegiado = data['colegiado'];
                                this.idCategoria = data['idCategoria'];
                            }
                        }
                    }
                }                
                this.selectCategoria();
                this.selectDepartamento();
            }
        },
        mounted() {
            this.listarPersona(1,this.buscar,this.criterio);
        }
    }
</script>
<style>
    .modal-content
    {
        width : 100% !important;
        position: absolute !important;
    }
    .mostrar
    {
        display: list-item !important;
        opacity: 1 !important;
        position: absolute !important;
        background-color: #3c29297a !important;
    }
    .div-error {
        display: flex;
        justify-content: center;
    }
    .text-error {
        color: red !important;
        font-weight: bold;
    } 
    @media (min-width: 600px){
        .btnagregar{
            margin-top: 2rem;
        }
    } 
</style>

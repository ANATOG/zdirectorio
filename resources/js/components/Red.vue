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
                        <i class="fa fa-align-justify"></i> Redes Sociales
                        <button type="button" class="btn btn-secondary" @click="abrirModal('red','registrar')" >
                            <i class="icon-plus"></i>&nbsp;Nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select class="form-control col-md-3" v-model="criterio">
                                      <option value="nombre">Nombre</option>
                                    </select>
                                    <input type="text" v-model="buscar" @keyup.enter="listarRed(1,buscar,criterio)" class="form-control" placeholder="Texto a buscar">
                                    <button type="submit" @click="listarRed(1,buscar,criterio)" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Opciones</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="red in arrayRed" :key="red.id">
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm"  @click="abrirModal('red','actualizar',red)" >
                                          <i class="icon-pencil"></i>
                                        </button> &nbsp;
                                        <template v-if="red.condicion">
                                            <button type="button" class="btn btn-danger btn-sm" @click="desactivarRed(red.id)">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </template>
                                        <template v-else>
                                            <button type="button" class="btn btn-success btn-sm" @click="activarRed(red.id)">
                                                <i class="icon-check"></i>
                                            </button>
                                        </template>
                                    </td>
                                    <td v-text="red.nombre"></td>
                                    <td>
                                        <div v-if="red.condicion">
                                            <span class="badge badge-success">Activo</span>
                                        </div>
                                        <div v-else>
                                            <span class="badge badge-danger">Inactivo</span>
                                        </div>
                                        
                                    </td>
                                </tr>           
                               
                            </tbody>
                        </table>
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
            <!--Inicio del modal agregar/actualizar-->
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
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                                    <div class="col-md-9">
                                        <input type="text" v-model="nombre" class="form-control" placeholder="Nombre">                                        
                                    </div>
                                </div>
                                <div v-show="errorRed" class="form-group row div-error">
                                    <div class="text-center text-error">
                                        <div v-for="error in errorMostrarMsjRed" :key="error" v-text="error">                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click="cerrarModal()" >Cerrar</button>
                            <button type="button" v-if="tipoAccion==1" class="btn btn-primary" @click="registrarRed()">Guardar</button>
                            <button type="button" v-if="tipoAccion==2" class="btn btn-primary" @click="actualizarRed()" >Actualizar</button>
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
    export default {
        data (){
            return {
                red_id : 0,
                nombre : '',
                arrayRed : [],
                modal : 0,
                tituloModal : '',
                tipoAccion : 0, 
                errorRed: 0,
                errorMostrarMsjRed : [],
                pagination:{
                    'total' : 0,        
                    'current_page' : 0, 
                    'per_page' : 0,     
                    'last_page' : 0,    
                    'from'   : 0,       
                    'to'  : 0,           
                },
                offset:3,
                criterio: 'nombre',
                buscar: ''
            }
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
        methods : {
            listarRed(page, buscar, criterio){
                let me=this;
                var url='/red?page='+page + '&buscar='+buscar+'&criterio='+criterio;
                axios.get(url).then(function (response) {
                    // handle success
                    var respuesta=response.data;
                   me.arrayRed = respuesta.redes.data;
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
            cambiarPagina(page, buscar, criterio) {
                let me  = this;
                //actualiza la pagina actual
                me.pagination.current_page = page;
                //enviar la peticion para visualizar la data de esa página 
                me.listarRed(page, buscar, criterio);
            },
            registrarRed(){
                
                if(this.validarRed()){
                    return;
                }
                let me  = this;
                axios.post('/red/registrar',{
                    'nombre': this.nombre
                }).then(function (response) {
                   me.cerrarModal();
                   me.listarRed(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });               
            },
            actualizarRed(){
                if(this.validarRed()){
                    return;
                }
                let me  = this;
                axios.put('/red/actualizar',{
                    'nombre': this.nombre,
                    'id': this.red_id
                }).then(function (response) {
                   me.cerrarModal();
                   me.listarRed(1,'','nombre');
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });       
            },
            desactivarRed(id){
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
                    axios.put('/red/desactivar',{
                        'id': id
                    }).then(function (response) {
                        me.listarRed(1,'','nombre');
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
            activarRed(id){
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
                    axios.put('/red/activar',{
                        'id': id
                    }).then(function (response) {
                        me.listarRed(1,'', 'nombre');
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
            validarRed(){
                this.errorRed=0;
                this.errorMostrarMsjRed=[];

                if(!this.nombre)this.errorMostrarMsjRed.push("El nombre de la Red Social no puede estar vacio");

                if(this.errorMostrarMsjRed.length) this.errorRed=1;
                return this.errorRed;
            },
            cerrarModal() {
                this.modal=0;
                this.tituloModal='';
                this.nombre='';
            },
            abrirModal(modelo, accion, data=[]){
                switch(modelo){
                    case "red":
                    {
                        switch(accion)
                        {
                            case 'registrar':
                            {
                                this.modal = 1;
                                this.tituloModal = 'Registrar Red Social';
                                this.nombre = '';
                                this.tipoAccion= 1;
                                break;
                            }
                            case 'actualizar':
                            {
                                //console.log(data);    
                                this.modal=1;
                                this.tituloModal='Actualizar Red Social';
                                this.tipoAccion=2;
                                this.nombre=data['nombre'];
                                this.red_id=data['id'];

                            }
                        }
                    }
                }
            }
        },
        mounted() {
            this.listarRed(1,this.buscar,this.criterio);
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
</style>

 <template>
    <main class="main">
            <!-- Breadcrumb -->
            <ol class="breadcrumb">
                <h4>Registro de persona</h4>
            </ol>
            <div class="container-fluid">
                <!-- Ejemplo de tabla Listado -->
                <div class="card">
                    <div class="card-header">
                       
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <!-- Paso 1 información personal -->
                            <div v-if="step === 1">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 1. Información personal</u></h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Preferencia</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="preferencia">
                                                <option disabled value="">Seleccione</option>
                                                <option value="n" >Normal</option>
                                                <option value="p" >Premium</option>                                            
                                            </select>
                                        </div>                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Categoria</label>
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
                                        <label class="col-md-12 form-control-label" for="text-input">Nombres</label>
                                        <div class="col-md-12">
                                            <input type="text" v-model="nombres" class="form-control" placeholder="Nombre">                                        
                                        </div>                           
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Apellidos</label>
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
                                <div class="form-row col-md-12">
                                    <button class="btn btn-primary" @click.prevent="next()">Siguente</button>
                                </div>
                                <br> 
                            </div>

                            <!-- Paso 2. Dirección -->
                            <div v-if="step === 2">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 2. Dirección</u></h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Departamento</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="idDepartamento">
                                                <option disabled value="">Seleccione</option>
                                                <option value="n" >Normal</option>
                                                <option value="p" >Premium</option>                                            
                                            </select>
                                        </div>                               
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Municipio</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="idMunicipio">
                                                <option value="0" disabled>Seleccione</option>
                                                <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                            </select>
                                        </div>
                                    </div>                               
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Linea 1</label>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div>
                                <br>  
                            </div>

                            <!-- Paso 3. Contacto-->
                            <div v-if="step === 3">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 3. Contactos</u></h3>
                                </div>
                                <div class="form-row">                                   
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Tipo de contacto</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="idTipo">
                                                <option disabled value="">Seleccione</option>
                                                <option value="n" >Normal</option>
                                                <option value="p" >Premium</option>                                            
                                            </select>
                                        </div>                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Contacto</label>
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
                                </div>
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div> 
                                <br> 
                            </div>

                            <!-- Paso 4. Redes Sociales -->
                            <div v-if="step === 4">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 4. Redes Sociales</u></h3>
                                </div>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div> 
                                <br>
                            </div>

                            <!-- Paso 5. Especialidades-->
                            <div v-if="step === 5">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 5. Especialidades</u></h3>
                                </div>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div> 
                                <br>
                            </div>

                            <!-- Paso 6. Servicios-->
                            <div v-if="step === 6">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 6. Servicios</u></h3>
                                </div>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="sumbit()">Guardar</button>                                    
                                </div>
                                <br> 
                            </div>
                        </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                        </div>
                    </div>
                    </div>








                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                            <!-- Paso 1 información personal -->
                            <div v-if="step === 1">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 1. Información personal</u></h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Preferencia</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="preferencia">
                                                <option disabled value="">Seleccione</option>
                                                <option value="n" >Normal</option>
                                                <option value="p" >Premium</option>                                            
                                            </select>
                                        </div>                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Categoria</label>
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
                                        <label class="col-md-12 form-control-label" for="text-input">Nombres</label>
                                        <div class="col-md-12">
                                            <input type="text" v-model="nombres" class="form-control" placeholder="Nombre">                                        
                                        </div>                           
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Apellidos</label>
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
                                <div class="form-row col-md-12">
                                    <button class="btn btn-primary" @click.prevent="next()">Siguente</button>
                                </div>
                                <br> 
                            </div>

                            <!-- Paso 2. Dirección -->
                            <div v-if="step === 2">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 2. Dirección</u></h3>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Departamento</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="idDepartamento">
                                                <option disabled value="">Seleccione</option>
                                                <option value="n" >Normal</option>
                                                <option value="p" >Premium</option>                                            
                                            </select>
                                        </div>                               
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Municipio</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="idMunicipio">
                                                <option value="0" disabled>Seleccione</option>
                                                <option v-for="categoria in arrayCategoria" :key="categoria.id" :value="categoria.id" v-text="categoria.nombre"></option>
                                            </select>
                                        </div>
                                    </div>                               
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="col-md-12 form-control-label" for="text-input">Linea 1</label>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div>
                                <br>  
                            </div>

                            <!-- Paso 3. Contacto-->
                            <div v-if="step === 3">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 3. Contactos</u></h3>
                                </div>
                                <div class="form-row">                                   
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Tipo de contacto</label>
                                        <div class="col-md-12">
                                            <select class="form-control" v-model="idTipo">
                                                <option disabled value="">Seleccione</option>
                                                <option value="n" >Normal</option>
                                                <option value="p" >Premium</option>                                            
                                            </select>
                                        </div>                               
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="col-md-12 form-control-label" for="text-input">Contacto</label>
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
                                </div>
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div> 
                                <br> 
                            </div>

                            <!-- Paso 4. Redes Sociales -->
                            <div v-if="step === 4">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 4. Redes Sociales</u></h3>
                                </div>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div> 
                                <br>
                            </div>

                            <!-- Paso 5. Especialidades-->
                            <div v-if="step === 5">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 5. Especialidades</u></h3>
                                </div>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="next()">Siguiente</button>                                    
                                </div> 
                                <br>
                            </div>

                            <!-- Paso 6. Servicios-->
                            <div v-if="step === 6">
                                <div class="form-row col-md-12">
                                    <h3><u>Paso 6. Servicios</u></h3>
                                </div>
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
                                <div class="form-row col-md-12">
                                        <button class="btn btn-warning" @click.prevent="prev()">Previo</button>                                    
                                        <button class="btn btn-primary" @click.prevent="sumbit()">Guardar</button>                                    
                                </div>
                                <br> 
                            </div>
                        </form>
                </div>
            </div>
    </main>
</template>

<script>
    export default {
         data() {
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
                nombre : '',
                detallee : '',
                servicio : '',
                detalles : ''                 
            }
        },
        methods:{
            prev() {
            this.step--;
            },
            next() {
            this.step++;
            },
            submit() {
            alert('Submit to blah and show blah and etc.');      
            }
               
                     
            
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

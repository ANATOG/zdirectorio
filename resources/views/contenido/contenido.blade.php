    @extends('principal')
    @section('contenido')
        <template v-if="menu==0">
        <h1>Contenido</h1>       
        </template>

        <template v-if="menu==1">
            <h1>Personas</h1>                
        </template>

        <template v-if="menu==2">
            <h1>Empresas</h1>            
        </template>

        <template v-if="menu==3">
        <categoria></categoria>         
        </template>

        <template v-if="menu==4">
        <h1>Configuracion</h1>          
        </template>
        
    @endsection
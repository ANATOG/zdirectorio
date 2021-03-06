    @extends('principal')
    @section('contenido')
        <template v-if="menu==0">
        <h1>Contenido</h1>       
        </template>

        <template v-if="menu==1">
            <persona></persona>                
        </template>

        <template v-if="menu==2">
        <tarjeta></tarjeta>             
        </template>

        <template v-if="menu==3">
        <categoria></categoria>         
        </template>

        <template v-if="menu==4">
        <departamento></departamento>         
        </template>

        <template v-if="menu==5">
        <municipio></municipio>         
        </template>

        <template v-if="menu==6">
        <red></red>         
        </template>

        <template v-if="menu==7">
        <tipo></tipo>         
        </template>

        <template v-if="menu==8">
        <h1>Configuracion</h1>          
        </template>

        
    @endsection
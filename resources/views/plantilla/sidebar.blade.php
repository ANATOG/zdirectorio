<div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li @click="menu=0" class="nav-item">
                        <a class="nav-link active" href="main.html"><i class="icon-home"></i>Escritorio</a>
                    </li>
                      
                    <!--<li class="nav-item nav-dropdown">
                        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i>Mantenimientos</a>
                        <ul class="nav-dropdown-items">-->
                            <li  @click="menu=3" class="nav-item">
                            <a class="nav-link" href="#"><i class="icon-list"></i>Categorias</a>
                            </li> 
                            <li  @click="menu=4" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-globe"></i>Departamentos</a>
                            </li> 
                            <li  @click="menu=5" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-map"></i>Municipios</a>
                            </li>
                            <li  @click="menu=6" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-social-facebook"></i>Redes</a>
                            </li>
                            <li  @click="menu=7" class="nav-item">
                                <a class="nav-link" href="#"><i class="icon-list"></i>Tipo</a>
                            </li>
                       <!-- </ul>
                    </li> -->   
                    <li  @click="menu=1" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Personas</a>
                    </li>
                    <li  @click="menu=2" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-organization"></i>Empresas</a>
                    </li>
                   
                    <li  @click="menu=8" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-settings"></i>Configuración</a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>
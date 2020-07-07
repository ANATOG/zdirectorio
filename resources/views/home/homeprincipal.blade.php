<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="css/plantilla.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <title>Directorio</title>
  </head>
  <body>
    <main class="container-main">

        <div id="contenedor_carga">
          <div id="carga"></div>
        </div>

             
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
              <img src="/img/logodirectorio.png"  class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="#">Profesiones</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#">Empresas</a>
                </li>
                <form class="form-inline my-2 my-lg-0 ">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search">
                  <button class="btn btn-outline-success my-2 my-sm-12" type="submit">Buscar</button>
                </form>
              </ul>
            </div>
           </nav>
        
      
      <!--Slider con buscador-->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="/img/fondo.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/img/fondo.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="/img/fondo.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>
      </div>
      <br>
      <br>
  <!-- fin del Slider -->
  <!--Tarjetas-->
   <section class="container"> 
    <div class="container text-center">
      <div class="row">    
          
          <article class="card  "  style="width: 20rem;">
                  <svg  class="fondocard" >     
                  </svg>
                  
                  <div class="fotografiaredonda" > 
                      <img src="https://www.incp.org.co/wp-content/uploads/2018/09/Director-DIAN-500x445.jpg"  data-toggle="modal" data-target=".bd-example-modal-xl" class="roundfoto" alt="fotografía">                       
                      
                  </div> 

                  
                
                  <div class="card-body"> 
                  <div>  
                      <h5 class="card-title">Edson Esteban </h5>
                      <p class="card-text">Ingeniero en Sistemas</p>
                  </div> 
                 
                  <div class=" row justify-content-center justify-content-md-start "> 
                      <div class="dropdown">
                          <a class="btn btn-default btn-circle btn-xl  dropdown"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="fas fa-share-alt" id="icolor"></span>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="#"> <span class="fab fa-facebook-f" id="icolor" ></span></a>
                              <a class="dropdown-item" href="#"><span class="fab fa-twitter" id="icolor" ></span></a>
                              <a class="dropdown-item" href="#"><span class="fab fa-linkedin-in" id="icolor" ></span></a>
                          </div>
                      
                      </div>


                      <div class="btn btn-default btn-circle btn-xl">
                          <a href="#"  role="button" >
                              <span class="fas fa-map-marker-alt" id="icolor">
                              </span>
                          </a>
                      </div>
                      <div class="btn btn-default btn-circle btn-xl">
                          <a  href="#"  role="button" >
                              <span class="fas fa-phone-volume" id="icolor">
                              </span>
                          </a>
                      </div>
                      <div class="btn btn-default btn-circle btn-xl">
                          <a href="#"  role="button" >
                              <span class="fab fa-whatsapp" id="icolor">
                              </span>
                          </a>
                      </div>
                  </div>
                
          </article> 

      </div>    
    </div>
  </section>  
 <!-- Extra large modal -->
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Empresa Profesional</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <main    class="container">
            <div>   
                <svg  class="fondoatras" >     
                </svg> 
            </div>
    <div class="row"> 
            <div class="fotografiaredondap " > 
                <img src="https://www.incp.org.co/wp-content/uploads/2018/09/Director-DIAN-500x445.jpg"  class="roundfotop" alt="fotografía">                       
            </div> 
            
            <div class="infop"> 
                <div class="nombreP">  
                    <h3>Edson Esteban </h3>
                </div> 
                <div class="tituloP">
                    <p>Ingeniero en Sistemas</p>
                </div>

                <div class=" row justify-content-center justify-content-md-start iconos"> 
                    <div class="dropdown">
                        <a class="btn btn-default btn-circlep btn-xlp  dropdown"  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-share-alt" id="icolorp"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#"> <span class="fab fa-facebook-f" id="icolorp" ></span></a>
                            <a class="dropdown-item" href="#"><span class="fab fa-twitter" id="icolorp" ></span></a>
                            <a class="dropdown-item" href="#"><span class="fab fa-linkedin-in" id="icolorp" ></span></a>
                        </div>
                    
                    </div>


                    <div class="btn btn-default btn-circlep btn-xlp">
                        <a href="#"  role="button" >
                            <span class="fas fa-map-marker-alt" id="icolorp">
                            </span>
                        </a>
                    </div>
                    <div class="btn btn-default btn-circlep btn-xlp">
                        <a  href="#"  role="button" >
                            <span class="fas fa-phone-volume" id="icolorp">
                            </span>
                        </a>
                    </div>
                    <div class="btn btn-default btn-circlep btn-xlp">
                        <a href="#"  role="button" >
                            <span class="fab fa-whatsapp" id="icolorp">
                            </span>
                        </a>
                    </div>
                </div> 
            </div>
    </div>
    <br>
    <br>
    <div class="container informacionp">
        
        <div class="card text-center">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Experiencia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Biografía</a>
                  </li>
              </ul>
            </div>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            
            </div>
          </div>
    </div>
    <br>
    <br>
    <div class="container contactop">
        <div id="map-container-google-1" class="z-depth-1-half map-container" >
            <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
            Contacto
            </div>
        <div class="card-body">
            <blockquote class="blockquote mb-0">
                
                <a>
                    <h3><span class="far fa-clock "></span> Horario de atencion</h3>  
                    <p>8:00am a 6:pm</p>   
                </a>

                <a>
                    <h3><span class="fas fa-envelope"></span> Correo Electronico</h3>  
                    <a href="mailto:edsoncipriano810@gmail.com"> edsoncipriano810@gmail.com</a>    
                </a>
                
                <a>
                    <h3><span class="fas fa-phone"></span> Teléfonos</h3> 
                    <a href="tel:7765-0501"> 7765-0501</a> 
                </a>

                <a>
                    <h3><span  class="fas fa-globe-americas"></span> Sitio Web</h3> 
                    <a href="https://www.zetamarketingconsultores.com/">https://www.zetamarketingconsultores.com/ </a>    
                </a>
                <a>
                    <h3><span class="fas fa-share-alt"></span> Redes Sociales</h3> 
                                   <!-- Facebook -->
                                   <a class="fb-ic" href="https://www.facebook.com/OtorrinOnline.gt/?fref=ts" target="_blank">
                                       <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                                   </a>
                                   <!-- Twitter -->
                                   <a class="tw-ic">
                                       <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                                   </a>
                                   <!-- Google +-->
                                   <a class="gplus-ic">
                                       <i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                                   </a>
                                   <!--Linkedin -->
                                   <a class="li-ic">
                                       <i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                                   </a>
                                   <!--Instagram-->
                                   <a class="ins-ic">
                                       <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-1x"> </i>
                                   </a>
                                   <!--Pinterest-->
                                   <a class="pin-ic">
                                        <i class="fab fa-pinterest fa-lg white-text fa-1x"> </i>
                                   </a>   
                </a>
            </blockquote>
        </div>
        </div>
    </div>  
</main>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a href="https://zetamarketingconsultores.com"> zetamarketingconsultores</a>
        </div>
        <!-- Copyright -->

        </footer>
        <!-- Footer -->
    </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Send message</button>
        </div>
        </div>
    </div>
    </div>
<!-- fin de la tarjeta -->


<!--footer -->
<footer class="footer">
  <div class="container text-white">
  <br>
  <div class="row">
    <div class="col-md-4 col-lg-2">
      <h4>Redes</h4>
      <a href="https://www.facebook.com/ZETAMARKETING.GT"><i class="fab fa-facebook"></i> </a>Zeta Marketing Consultores
      <h4>Nuestro Sitio</h4>  
       
      <p><i class="fas fa-poll-h"></i><a href="https://www.zetamarketingconsultores.com/">Zeta Marketing Consultores</a></p>
    
    </div>
    <div class="col-md-4 col-lg-4">
      <h4 id="contacto">Contacto</h4>
      <p></p>
      <p>Direcci&oacute;n: CABA - Huehuetenango Guatemala<br>
      Tel&eacute;fonos:<br>
      eMail: </p>
    </div>
    <div class="col-md-4 col-lg-2 text-white" >
     </div>
  </div>
  </div>
  </footer>
  </main>

    <!-- Optional JavaScript -->
    <script>
      window.onload = function(){
        var contenedor = document.getElementById("contenedor_carga");
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity ='0';
      }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/plantilla.js"></script>
    

    </body>
</html>
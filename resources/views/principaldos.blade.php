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
    <div id="app">
        <main class="container-main">

            <div id="contenedor_carga">
                <div id="carga"></div>
            </div>


            @include('home.navbar')


            <!--Slider con buscador-->
            <div id="carouselExampleIndicators  col-sm-4 col-md-12 col-lg-12" class="carousel slide" data-ride="carousel">
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

            @yield('tarjeta')






            <!--footer -->
            <footer class="footer">
                <div class="container">
                    <br>
                    <br>

                    <div class="row text-center">
                        <div class="col-sm-4 col-md-4 col-lg-4 text-white ">
                            <a class="navbar-brand" href="#"><img src="/img/logodirectorio.png" class="" alt="logo"></a>
                                   
                        </div>
                        <br>
                        <div class="col-sm-4 col-md-4 col-lg-4 text-white">
                            
                            <p><a href="https://www.zetamarketingconsultores.com/" target="_blank">Creado por ZetaMarketingConsultores </a></p>
                            <p>Todos los derechos reservados ©</p>   
                            

                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <a href="https://www.facebook.com/ZETAMARKETING.GT" target="_blank"><i class="fab fa-facebook fa-3x  "></i></a> 
                            <a href="https://www.instagram.com/zetamarketingconsultores/"target="_blank"><i class="fab fa-instagram fa-3x  "></i></a>
                        </div>
                    </div>
                </div>
            </footer>

        
        </main>
    </div>
    <!-- Optional JavaScript -->
    <script>
        window.onload = function () {
            var contenedor = document.getElementById("contenedor_carga");
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/app.js"></script>


</body>

</html>
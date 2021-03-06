<?php 
   require_once 'clases/Funciones.php';
  $fun = new Funciones();    
?>
<!DOCTYPE html>
<html lang="es">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PubliMatch - Avisos publicitarios</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>




    <script type="text/javascript">


    function isMobile() {
          try{ 
              document.createEvent("TouchEvent"); 
              document.getElementById("menuMob").style.display = "block";
              document.getElementById("menuMobFoo").style.display = "block";

          }
          catch(e){ 
              document.getElementById("menuDesk").style.display = "block";
          }
      }


        $(document).ajaxStart(function() {
          $("#formbuscar").hide();
          $("#loading").show();
             }).ajaxStop(function() {
          $("#loading").hide();
          $("#formbuscar").show();
          });  

  $(document).ready(function() {
          $("#formbuscar").submit(function() {    
            $.ajax({
              type: "POST",
              url: 'vista/vistaBuscar.php',
              data:$("#formbuscar").serialize(),
              success: function (result) { 
              
              document.getElementById("container").innerHTML = result;
              document.getElementById("volver").style.display = "inline";
              window.scroll(0, 0);
                
              },
              error: function(){
                      alert('Verifique los datos')      
              }
            });
            return false;
          });
        });    




     function modal(id) {
    
    document.getElementById("portafolio_titulo").innerHTML = "";
    document.getElementById("portafolio").innerHTML = "";
     $.ajax({
      url: 'controles/controlPortafolio.php',
      type: 'POST',
      data: {"id":id},
      success:function(result){
         
              document.getElementById("portafolio").innerHTML = result;
               switch(id){
                          case 1:
                            document.getElementById("portafolio_titulo").innerHTML = "EcoTurismo";
                          break;
                          case 2:
                            document.getElementById("portafolio_titulo").innerHTML = "Tiendas y Restaurantes";
                          break;
                          case 3:
                            document.getElementById("portafolio_titulo").innerHTML = "Deportes";
                          break;
                          case 4:
                            document.getElementById("portafolio_titulo").innerHTML = "Hoteleria";
                          break;
                          case 5:
                            document.getElementById("portafolio_titulo").innerHTML = "Servicios";
                          break;
                          case 6:
                            document.getElementById("portafolio_titulo").innerHTML = "Delivery";
                          break;
                          window.scroll(0, 0);


               }
                
              },
              error: function(){
                      alert('Verifique los datos')      
              }
  })
    

}
    </script>

  </head>

  <body id="page-top" onload="isMobile()">

<div id="menuMob" name="menuMob" style="display: none;">
<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <a class="navbar-brand js-scroll-trigger" href="index.php">PubliMatch</a>
      </div>
    </nav>
</div>

<div id="menuDesk" name="menuDesk" style="display: none;">
  <nav class="navbar navbar-expand-sm bg-secondary fixed-top text-uppercase" id="mainNav">
    <a class="navbar-brand js-scroll-trigger" href="index.php" id="link-home" name="link-home">
    <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Publimatch
  </a>
          <ul class="navbar-nav ml-auto" >
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php" id="link-home-mob" name="link-home-mob"><i class="fa fa-home" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#categorias" id="link-com-mob" name="link-com-mob"><i class="fa fa-th-large" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#categorias" id="link-com" name="link-com"> Categorias</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#conocenos" id="link-con-mob" name="link-con-mob"><i class="fa fa-users" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#conocenos" id="link-con" name="link-con">Nosotros</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto" id="link-anu-mob" name="link-anu-mob"><i class="fa fa-space-shuttle" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto" id="link-anu" name="link-anu">Anunciate!</a>
            </li>
                                      <?php 
                                        $re1 = $fun->busca_promo(0);   
                                         if (!empty($re1)) {
                                           echo '<li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="vista/vistaPromociones.php?id=1" id="link-promo-mob" name="link-promo-mob"><i class="fa fa-bell" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="vista/vistaPromociones.php?id=1" id="link-promo" name="link-promo">Promos!</a>
            </li>';
                                          }
                                        ?>       



                
          </ul>
  </nav>

</div>


  <div id="loading" style="display: none;">
    <center><img src="img/load.gif"></center>
  </div>
<form id="formbuscar" onsubmit="return false;"  >
    <!-- Header -->
    <header class="masthead bg-primary text-white text-center" id="mainCont">
      <div class="container" id="container">
        
        <h1 class="text-uppercase mb-0">Encuentra lo que necesites!</h1>

        <hr class="star-light">
            <div class="row">
              
            
                <div class="col-lg-4">
                  <select name="comuna" id="comuna" class="form-control" required>
                    <option value="" selected disabled>Seleccione la Comuna</option>
                                       <?php 
                                        $re = $fun->cargar_comunas(1);   
                                        foreach($re as $row)      
                                            {
                                              ?>
                                               <option value="<?php echo $row['id_comuna'] ?>"><?php echo $row['nom_comuna'] ?></option>
                                                  
                                              <?php
                                            }    
                                        ?>       
                  </select>
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="anuncio" id="anuncio" maxlength="50" placeholder="¿Que buscas? Ej. sushi, piscina">
                </div>
                <div class="col-lg-3">
                  <input class="btn btn-dark" type="submit" name="buscar" id="buscar" value="Buscar">
                </div>
</form>
              
            </div>

            <h2 class="font-weight-light mb-0">Busca - Contacta - Evalua</h2>
            
      </div>
      <a href="index.php" class="btn btn-primary btn-lg" style="display: none" id="volver" name="volver">Volver</a><br>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="categorias">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Categorias</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portafolio-modal" onclick="modal(1)">
            <h5 align="center">EcoTurismo</h5>
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/ecoturismo.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portafolio-modal" onclick="modal(2)">
            <h5 align="center">Tiendas y Restaurantes</h5>
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/restaurantes.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portafolio-modal" onclick="modal(3)">
            <h5 align="center">Deportes</h5>
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/deportes.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portafolio-modal" onclick="modal(4)">
            <h5 align="center">Hoteleria</h5>
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/hoteleria.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portafolio-modal" onclick="modal(5)">
            <h5 align="center">Servicios</h5>
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/servicios.png" alt="">
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a class="portfolio-item d-block mx-auto" href="#portafolio-modal" onclick="modal(6)">
            <h5 align="center">Delivery</h5>
              <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
                <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                  <i class="fas fa-search-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/delivery.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="conocenos">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Equipo PubliMatch</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Esta plataforma esta desarrollada por y para la comunidad del Valle de Aconcagua. Nuestro equipo multidiciplinario esta atento para resolver todas tus dudas de como anuciarte y como relizar una busqueda optima</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">No esperes mas y se parte de PubliMatch</p>
          </div>
        </div>
        
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Anunciate con nosotros!</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Nombre</label>
                  <input class="form-control" id="name" type="text" placeholder="Nombre" required="required" data-validation-required-message="Por favor, ingresa tu nombre.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email</label>
                  <input class="form-control" id="email" type="email" placeholder="Email" required="required" data-validation-required-message="Por favor, ingresa tu Email.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefono</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Telefono" required="required" data-validation-required-message="Por favor ingresa tu número de telefono.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Mensaje</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Mensaje" required="required" data-validation-required-message="Por favor, ingresa tu mensaje."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!--         Footer  -->
    <div class="footer2 text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h5 class="text-uppercase mb-4">Dirección</h5>
            <p class="lead mb-0">Calle La Unión # 474
              <br>San Esteban, Los Andes</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h5 class="text-uppercase mb-4">Visitanos</h5>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-linkedin-in"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn btn-outline-light btn-social text-center rounded-circle" href="#">
                  <i class="fab fa-fw fa-dribbble"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h5 class="text-uppercase mb-4">PubliMatch</h5>
            <p class="lead mb-0">Esta plataforma digital esta a cargo de 
              <a href="http://www.andescode.cl" target="_blank">Andescode</a>.</p>
          </div>
        </div>
      </div>
      <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Copyright &copy; PubliMatch 2019</small>
      </div>
    </div>
    </div>

    
    <div id="menuMobFoo" name="menuMobFoo" style="display: none;">
    <footer class="footer text-center">
    <nav class="navbar navbar-expand-sm bg-secondary  text-uppercase text-center" id="mainNav">
    
          <ul class="navbar-nav m-auto " >
            <li class="nav-item mx-0 mx-0">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#categorias" id="link-con-mob" name="link-con-mob"><i class="fa fa-th-large" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#categorias" id="link-con" name="link-con">Categorias</a>
            </li>
            <li class="nav-item mx-0 mx-0">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#conocenos" id="link-con-mob" name="link-con-mob"><i class="fa fa-users" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#conocenos" id="link-con" name="link-con">Nosotros</a>
            </li>
            <li class="nav-item mx-0 mx-0">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto" id="link-anu-mob" name="link-anu-mob"><i class="fa fa-space-shuttle" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contacto" id="link-anu" name="link-anu">Anunciate!</a>
            </li>
                                      <?php 
                                        $re1 = $fun->busca_promo(0);   
                                         if (!empty($re1)) {
                                           echo '<li class="nav-item mx-0 mx-0">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="vista/vistaPromociones.php?id=1" id="link-promo-mob" name="link-promo-mob"><i class="fa fa-bell" aria-hidden="true"></i></a><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="vista/vistaPromociones.php?id=1" id="link-promo" name="link-promo">Promos!</a>
            </li>';
                                          }
                                        ?>       



                
          </ul>

  </nav>
</footer>
</div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) 
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>-->



    <!-- Portfolio Modals -->

    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal mfp-hide" id="portafolio-modal">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0" id="portafolio_titulo" name="portafolio_titulo"></h2>
              <hr class="star-dark mb-5">
              <div id="portafolio" name="portafolio"></div>
              <a class="btn btn-primary btn-lg rounded-pill portfolio-modal-dismiss" href="#">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>

</html>

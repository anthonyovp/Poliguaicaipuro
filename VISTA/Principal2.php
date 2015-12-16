<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="./img/logo.png">

    <title>Poliguaicaipuro</title>

    <!-- Bootstrap CSS -->    
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="./css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="./css/elegant-icons-style.css" rel="stylesheet" />
    <link href="./css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="./assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="./assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="./assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="./css/owl.carousel.css" type="text/css">
  <link href="./css/jquery-jvectormap-1.2.2.css" rel="stylesheet">

    <!-- Custom styles -->
  <link rel="stylesheet" href="./css/fullcalendar.css">
  <link href="./css/widgets.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    <link href="./css/style-responsive.css" rel="stylesheet" />
  <link href="./css/xcharts.min.css" rel=" stylesheet"> 
  <link href="./css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
             <a href="./VISTA/Principal.php" class="logo"><img src="./img/logo.png" alt=""/ width="9%"> Poli <span class="lite">Guaicaipuro</span>&nbsp;&nbsp;<img src="./img/logoalcaldia.jpg" alt="" width="17%" class="hidden-xs"/></a>

            <!--logo end-->

            
           <button type="button" class="btn btn-primary nav navbar-right"  data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-user "></i><br>&nbsp;&nbsp;Iniciar Sesión</button>

            
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="./VISTA/Principal.php">                           
                            <i class="icon_documents_alt"></i>
                            <span>¿Quienes Somos?</span>
                      </a>
                  </li>
                 <li class="sub-menu">
                     
                            <li><a class="" href="./VISTA/Mision.php"><i class="glyphicon glyphicon-thumbs-up"></i>Nuestra Misión</a></li>                          
                            <li><a class="" href="./VISTA/Vision.php"><i class="glyphicon glyphicon-eye-open"></i>Nuestra Visión</a></li>
                            <li><a class="" href="./VISTA/Organigrama.php"><i class="glyphicon glyphicon-list"></i>Organigrama</a></li>
                            <li><a class="" href="./VISTA/Ubicacion.php"><i class="glyphicon glyphicon-road"></i>Ubicación</a></li>
                            <li><a class="" href="./VISTA/Contactos.php"><i class="glyphicon glyphicon-earphone"></i>Contactos</a></li>
                            <li><a class="" href="./img/Manual.pdf" target="_blank"><i class="glyphicon glyphicon-question-sign"></i>Ayuda</a></li>
                   
                  </li>
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
        <div class="row">
        <div class="col-lg-12">
          
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i>Inicio</li>
                          
          </ol>
        </div>
      </div>
              
            
           <div class="row">
        <div class="col-lg-9 col-md-12">
          
          <section id="miSlide" class="carousel slide">
                    <ol class="carousel-indicators hidden-xs hidden-sm">
                        <li data-target="#miSlide" data-slide-to="0" class="active"></li>
                        <li data-target="#miSlide" data-slide-to="1"></li>
                        <li data-target="#miSlide" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner ">
                        <div class="item active"><img src="./img/imagen1.jpg" class="adaptar"></div>
                        <div class="item"><img src="./img/imagen2.jpg" class="adaptar"></div>
                        <div class="item"><img src="./img/imagen3.jpg" class="adaptar"></div>
                    </div>
                    <a href="#miSlide" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a>

                <a href="#miSlide" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span></a>
                </section>
                <br>
                
                    
        </div>
             
             <div class="col-md-3">
            <div class="portlets">
                      <!--Project Activity start-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <center><h2><strong>App Patrullaje Inteligente</strong></h2></center>
                           
                 
                        </div>
                        <div class="panel-body text-justify">
                         <div class="col-md-12">
                         
                            <video src="./img/Patrullaje Inteligente.mp4" title="App Patrullaje Inteligente" controls class="img-responsive"></video>
                          </div>
                    </div> 
                </div>
             <div class="portlets">
                      <!--Project Activity start-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <center><h2><strong>Enlaces de Interés</strong></h2></center>
                           
                 
                        </div>
                        <div class="panel-body text-justify">
                         <div class="col-md-12">
                            
                            <a href="https://twitter.com/policiaguaicaip" target="_blank"><img src="./img/twitter.jpg" class="img-responsive img-rounded"></a>
                          </div>
                          <div class="col-md-12">
                            <br>
                            <a href="http://www.miranda.gov.ve/" target="_blank"><img src="./img/gobernacionn.jpg" class="img-responsive img-rounded"></a>
                          </div>
                          <div class="col-md-12">
                            <br>
                            <a href="http://www.miranda.gov.ve/" target="_blank"><img src="./img/alcaldia.jpg" class="img-responsive img-rounded"></a>
                          </div>
                          

                        </div>
                    </div> 
                </div>
                
                

  

          
        </div>

 
<!-- Modal -->


                   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <center><h4 class="modal-title" id="myModalLabel">Iniciar Sesi&oacute;n</h4></center>
                          </div>
                          <div class="modal-body">
                                          <form  action="./CONTROLADOR/Controlador_Usuario.php" method="POST">        
                                          <div class="login-wrap">
                                              
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="icon_profile"></i></span> 
                                                <input type="text" class="form-control" name="correo" placeholder="Usuario" autofocus> 
                                                <span class="input-group-addon"> <a class="" href="#modal2">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                                              </div>
                                              <div class="input-group">
                                                  <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                                                  <input type="password" class="form-control" name="clave" placeholder="Contraseña">
                                                  <span class="input-group-addon"> <a class="" href="#modal3">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                                              </div>
                                              <label class="checkbox">
                                                  <a class="" href="#modal1">&nbsp;<i class="glyphicon glyphicon-question-sign"></i>Ayuda</a>
                                                  <span class="pull-right"> <a href="#"> Olvidó su Contraseña?</a></span>
                                              </label>
                                              <button class="btn btn-primary btn-lg btn-block" name="entrar" type="submit">Entrar</button>
                                            
                                          </div>
                                        </form>
                          </div>
                          
                        </div>
                      </div>
                    </div> 
                </div>
                </div>
            </div> 

      </section>


    <!-- Comienzo Modales para manual de usuario-->
   <div id="modal1" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <center><h4>Ayuda</h4></center>
        
        <p>Para Iniciar Sesión ingresa tu Usuario y Contraseña en los campos respectivos y pulsa entrar,
        tal como se explica en la siguiente imagen: </p>
        <center><img src="./img/Ayudainiciar.jpg" class="img img-responsive"></center>
    </div>
  </div>
    
  <div id="modal2" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar tu nombre de usuario (tu correo).</p>

    </div>
  </div>

  <div id="modal3" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar tu contraseña.</p>

    </div>
  </div>
  <!-- Final Modales para manual de usuario-->
    

    

    <!-- javascripts -->
    <script src="./js/jquery.js"></script>
  <script src="./js/jquery-ui-1.10.4.min.js"></script>
    <script src="./js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="./js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="./js/jquery.scrollTo.min.js"></script>
    <script src="./js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="./assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="./js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="./assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="./js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="./js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
  <script src="./assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="./js/calendar-custom.js"></script>
  <script src="./js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="./js/jquery.customSelect.min.js" ></script>
  <script src="./assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="./js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="./js/sparkline-chart.js"></script>
    <script src="./js/easy-pie-chart.js"></script>
  <script src="./js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="./js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="./js/jquery-jvectormap-ve-mill-en.js"></script>
  <script src="./js/xcharts.min.js"></script>
  <script src="./js/jquery.autosize.min.js"></script>
  <script src="./js/jquery.placeholder.min.js"></script>
  <script src="./js/gdp-data.js"></script>  
  <script src="./js/morris.min.js"></script>
  <script src="./js/sparklines.js"></script>  
  <script src="./js/charts.js"></script>
  <script src="./js/jquery.slimscroll.min.js"></script>
    <script src="./js/main.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
    
         
        
$(function(){
  $('#map').vectorMap({map: 've_mill_en',
    series: {
      regions: [{
        values: gdpData,
        scale: ['#C8EEFF', '#0071A4'],
        normalizeFunction: 'polynomial'
      }]
    },
    onRegionTipShow: function(e, el, code){
      el.html(el.html()+' (GDP - '+gdpData[code]+')');
    }
  });
});



    /* ---------- Map ---------- */
  $(function(){
  $('#map').vectorMap({map: 've_mill_en',



      series: {
        regions: [{
          values: cData,
          scale: ['#000', '#000'],
          normalizeFunction: 'polynomial'
        }]
      },
    backgroundColor: '#eef3f7',
      onLabelShow: function(e, el, code){
        el.html(el.html()+' (GDP - '+gdpData[code]+')');
      }
    

      

    });



  });



  </script>
<script>window.jQuery || document.write('<script src="./js/jquery-1.11.2.min.js"><\/script>')</script>
<script src="./js/bootstrap.js"></script>
  </body>
</html>

 
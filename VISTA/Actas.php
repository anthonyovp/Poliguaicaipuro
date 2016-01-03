<!DOCTYPE html>

<?php 
session_start();
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="../img/logo.png">
     
    <title>Poliguaicaipuro</title>

    <!-- Bootstrap CSS -->    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="../assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="../assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
  <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
  <link rel="stylesheet" href="../css/fullcalendar.css">
  <link href="../css/widgets.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
  <link href="../css/xcharts.min.css" rel=" stylesheet"> 
  <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
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
            <a href="Usuario.php" class="logo"><img src="../img/logo.png" alt=""/ width="9%"> Poli <span class="lite">Guaicaipuro</span>&nbsp;&nbsp;<img src="../img/logoalcaldia.jpg" alt="" width="17%" class="hidden-xs"/></a>

            <!--logo end-->

           
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- alert notification start-->
                    <li id = "documentos">
                      <a href="Documentos.php">
                        <i class="glyphicon glyphicon-file icon-top"></i>
                      </a>
                    </li>
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="glyphicon glyphicon-envelope icon-top"></i>
                            <span class="badge bg-important">4</span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">Usted Tiene 4 Notas Activas</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    Cargar Actas de Robos.
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>  
                                    Entregar Actas a R.H.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span> 
                                    Llamar al Jefe de Tránsito.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                    Solicitar Actas de Aprensión.
                                    <span class="small italic pull-right"> Ayer</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="#">Todas las Notificaciones...</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                              <?php
                              
                              echo'
                                <img alt="" src="'.$_SESSION["ruta"].'" width="40px" height="40px">
                            </span>
                            <span class="username">
                ';
                echo $_SESSION["nombre_usuario"]." ".$_SESSION["apellido_usuario"];
                ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.html"><i class="icon_profile"></i> Mi Perfil</a>
                            </li>
                            
                            <li>
                                <a href="../CONTROLADOR/Controlador_Usuario.php?cerrar=true"><i class="icon_key_alt"></i> Cerrar Sesi&oacute;n</a>
                            </li>
                            
                        
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      
        <?php
        include_once("../MODELO/clsDatos.php");
        $obj=new clsDatos();

        

        if(!$obj->autenticado()){
 
            echo "<script language='javascript'> alert('Debe Iniciar Sesión!'); window.history.go(-1);</script>";
        }
        $tipoU = $obj->Autenticado();


        echo'
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">   
              ';


              if($tipoU=="Administrador1"||$tipoU=="SuperUsuario"){
                  echo'             
                  <li class="active">
                      <a class="" href="Usuario.php">                           
                            <i class="icon_documents_alt"></i>
                            <span>Actas Policiales</span>
                      </a>
                  </li>
          <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>Manejar Actas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                            <li><a class="" href="Actas.php">Actas</a></li>                          
                            <li><a class="" href="Funcionario.php">Funcionarios</a></li>
                            <li><a class="" href="form_validation.html">Récords Disciplinarios</a></li>
                            <li><a class="" href="Procedimientos.php">Procedimientos</a></li>

                      </ul>
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">                          
                          <i class="glyphicon glyphicon-signal"></i>
                          <span>Estad&iacute;sticas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="GraficasActas.php">Estad&iacute;sticas por Fechas</a></li>
                          <li><a class="" href="grids.html">Estad&iacute;sticas por Sector</a></li>
                      </ul>
                  </li>
                  ';


              }
              if($tipoU=="Administrador2"||$tipoU=="SuperUsuario"){
                  echo'

                  <li class = "active">                     
                      <a class="" href="Usuario.php">
                          <i class="icon_piechart"></i>
                          <span>Reseñas Policiales</span>
                          
                      </a>
                                         
                  </li>
                 
                  <li class="sub-menu">
                      <a href="Resena.php" class="">
                          <i class="icon_table"></i>
                           <span>Manejar Reseñas</span>
                          
                      </a>
                      
                  </li>       
                  <li class="sub-menu">
                      <a href="javascript:;" class="">                          
                          <i class="glyphicon glyphicon-signal"></i>
                          <span>Estad&iacute;sticas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">Estad&iacute;sticas por Mes</a></li>
                          <li><a class="" href="buttons.html">Estad&iacute;sticas por Año</a></li>
                          <li><a class="" href="grids.html">Estad&iacute;sticas por lugar</a></li>
                      </ul>
                  </li>
                  ';

              }
               if($tipoU=="Administrador1"||$tipoU=="SuperUsuario"||$tipoU=="Administrador3"){
                   echo'

                  <li class = "active">
                      <a class="" href="Usuario.php" >
                          <i class="icon_document_alt"></i>
                          <span>Multas de Tr&aacute;nsito</span>
                      </a>
                  </li>
                             
                  <li class="sub-menu">
                      <a href="Multas.php" class="disabled" >
                          <i class="icon_table"></i>
                           <span>Controlar Multas</span>
                          
                      </a>
                      
                  </li>
                  
                   <li class="sub-menu">
                      <a href="javascript:;" class="" >                          
                          <i class="glyphicon glyphicon-signal"></i>
                          <span>Estad&iacute;sticas</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="Estadisticas MultaM.html">Estad&iacute;sticas por Mes</a></li>
                          <li><a class="" href="buttons.html">Estad&iacute;sticas por Año</a></li>
                          <li><a class="" href="grids.html">Estad&iacute;sticas por lugar</a></li>
                      </ul>
                  </li>
                  ';

               }
               if($tipoU=="SuperUsuario"){
             echo'
                  
                  <li class = "active">                     
                      <a class="" href="Usuario.php">
                          <i class="icon_piechart"></i>
                          <span>Usuarios</span>
                          
                      </a>
                                         
                  </li>
                 
                  <li class="sub-menu">
                      <a href="Usuario2.php" class="">
                          <i class="icon_desktop"></i>
                           <span>Manejar Usuarios</span>
                          
                      </a>
                      
                  </li>   
                 
                  <li class="sub-menu">
                      <a href="Resena.php" class="">
                          <i class="icon_table"></i>
                           <span>Manejar Bitácora</span>
                          
                      </a>
                      
                  </li>        
                  
              </ul>
                 </div>
      </aside>

              ';
            }
              ?>
              </section>
              <!-- sidebar menu end-->
       
      <!--sidebar end-->
      
      <!--main content start-->


      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
        <div class="row">
        <div class="col-lg-12">
          <p class="text-right"><a class="" href="#modalp">&nbsp;<i class="glyphicon glyphicon-question-sign"></i>Ayuda</a> </p>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="Usuario.php">Inicio</a></li>  &nbsp;&nbsp;&nbsp;<i></i>&nbsp;Actas
                          
          </ol>
        </div>
      </div>
      

 <!-- Comienzo Modales para manual de usuario-->
  <div id="modalp" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <center><h4>Ayuda</h4></center>
        
        <br>
        <p><a class="" href="#modal3">&nbsp;¿Cómo Registrar a un Funcionario?</a></p> 
        <p><a class="" href="#modal6">&nbsp;¿Cómo Buscar los Datos de un Funcionario?</a></p> 
        <p><a class="" href="#modal8">&nbsp;¿Cómo Modificar los Datos de un Funcionario?</a></p> 
    </div>
  </div>

      
  <div id="modal3" class="modalmask">
    <div class="modalbox movedown">
        
        <a href="#close" title="Close" class="close">X</a>
        <center><h4>Registrar Funcionarios</h4></center>
       
        <p>
          Ubica en la parte superior-derecha el botón azul que dice agregar y haz clic, tal como se explica en la siguiente imagen:
        </p>
        <center><img src="../img/Ayudafuncionario3.jpg" class="img img-responsive"></center>
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modalp">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal4">&nbsp;Siguiente</a> </p>
          </div>
        </div>
        
    </div>
  </div>

  <div id="modal4" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <br>
        <p>A continuación se desplegará una nueva ventana, la cual consiste en un formulario en el cual debes rellenar cuidadosamente los datos del funcionario a registrar, y luego presionar la tecla guardar tal como se indica en la siguiente imagen:


        </p>
        <center><img src="../img/Ayudafuncionario4.jpg" class="img img-responsive"></center>
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modal3">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal5">&nbsp;Siguiente</a> </p>
          </div>
        </div>
        
    </div>
  </div>

  <div id="modal5" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <br>
        <p>Si el registro ha sido exitoso el Sistema arrojará una alerta diciendo que el proceso ha sido realizado correctamente, tal como se indica en la siguiente imagen:



        </p>
        <center><img src="../img/Ayudafuncionario5.jpg" class="img img-responsive"></center><br>
        <p>Haz clic en aceptar y listo…
        </p>
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modal4">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           
          </div>
        </div>
        
    </div>
  </div>
  
  <div id="modal6" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <center><h4>Consultar Funcionarios</h4></center>
        <p>Ubica en la parte superior-izquierda el campo de texto que dice Buscar y teclea la cédula o el primer nombre del funcionario a consultar, 
          notarás que el Sistema filtrará los datos que coincidan con lo que  teclees en el campo de texto.

        </p>
        <center><img src="../img/Ayudafuncionario6.jpg" class="img img-responsive"></center><br>
        
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modalp">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal7">&nbsp;Siguiente</a> </p>
          </div>
        </div>
        
    </div>
  </div>


  <div id="modal7" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <br>
        <p>Observarás como los Datos del Funcionario se mostrarán en la tabla de abajo…




        </p>
        <center><img src="../img/Ayudafuncionario7.jpg" class="img img-responsive"></center><br>
       
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modal6">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           
          </div>
        </div>
        
    </div>
  </div>

  <div id="modal8" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <center><h4>Modificar Funcionarios</h4></center>
        <p>Ubica en la parte superior-izquierda el campo de texto que dice Buscar y teclea la cédula o el primer nombre del funcionario a modificar, 
          notarás que el Sistema filtrará los datos que coincidan con lo que  teclees en el campo de texto.

        </p>
        <center><img src="../img/Ayudafuncionario6.jpg" class="img img-responsive"></center><br>
        
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modalp">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal9">&nbsp;Siguiente</a> </p>
          </div>
        </div>
        
    </div>
  </div>

  <div id="modal9" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <br>
        <p>Observarás como los Datos del Funcionario se mostrarán en la tabla de abajo,
         haz clic en el botón de color naranja con icono de lápiz, tal como se indica en la siguiente imagen:


        </p>
        <center><img src="../img/Ayudafuncionario8.jpg" class="img img-responsive"></center><br>
       
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modal8">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal10">&nbsp;Siguiente</a> </p>
          </div>
        </div>
        
    </div>
  </div>

  <div id="modal10" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <br>
        <p>Ahora puedes cambiar los datos que desees, una vez que los hayas cambiado haz clic en el botón verde y se guardarán los cambios, de lo contrario si deseas cancelar haz clic en el botón rojo.





        </p>
        <center><img src="../img/Ayudafuncionario7.jpg" class="img img-responsive"></center><br>
       
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modal9">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           
          </div>
        </div>
        
    </div>
  </div>

  <div id="modal11" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar la cédula o el nombre del funcionario a buscar y/o modificar.</p>

    </div>
  </div>

  <div id="modal12" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar la cédula del funcionario que deseas registrar. Este campo es obligatorio.</p>

    </div>
  </div>

   <div id="modal13" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar el primer nombre del funcionario que deseas registrar. Este campo es obligatorio.</p>

    </div>
  </div>

  <div id="modal14" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar el segundo nombre del funcionario que deseas registrar. Este campo es opcional.</p>

    </div>
  </div>

  <div id="modal15" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar el primer apellido del funcionario que deseas registrar. Este campo es obligatorio.</p>

    </div>
  </div>

  <div id="modal16" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar el segundo apellido del funcionario que deseas registrar. Este campo es opcional.</p>

    </div>
  </div>

  <div id="modal17" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>

        <br>
        <p>En este campo debes ingresar la credencial del funcionario que deseas registrar. Este campo es obligatorio.</p>

    </div>
  </div>
  <!-- Final Modales para manual de usuario-->
      
      <!-- Form validations -->              
              <div class="row">
                  <div class="col-lg-12">
                      
                  </div>
              </div>

      <div class="row">
                
        <div class="col-lg-12 col-md-12">  
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-flag-o red"></i><strong>Actas</strong></h2>
              <div class="panel-actions">
                <button type="button" class="btn btn-primary"  onclick="location.href='Registrar Actas.php';" > Agregar&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                
              </div>

            </div>
            <div  class="panel-body ">
              <div class="table-responsive">
                <form class="navbar-form" >
                       <div class="form-group ">
                        <div class="input-group">
                                                  
                          <input class="form-control" placeholder="Buscar" type="search" id = "buscar">
                          <span class="input-group-addon"> <a class="" href="#modal11">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                        </div>
                        <span id = "cargando">&nbsp;</span>
                        
                      </div>
                            
                </form>
                <div   class = "">

                      <table class="table  table-hover" width="100%" id = "tabla">

                        <br>
                          <thead>
                            <tr class="success">
                              
                              <th>N&deg;</th>
                              <th>C&oacute;digo</th>
                              <th>Fecha</th>
                              <th>Hora</th>
                              <th>Tipo</th>
                              <th>Procedimiento</th>
                              <th>Funcionarios</th>                   
                              <th>Sector</th>
                              <th>Acci&oacute;n</th>
             

                            </tr>
                          </thead>
                          <tr>
                            <td class = 'verdeoscuroimg' > Ejem.N&deg; </td> 
                            <td class = 'verdeoscuroimg' > Ejem.C&oacute;digo </td> 
                            <td class = 'verdeoscuroimg' > Ejem.Fecha </td>    
                            <td class = 'verdeoscuroimg' > Ejem.Hora </td>
                            <td class = 'verdeoscuroimg' > Ejem.Tipo </td>              
                            <td class = 'verdeoscuroimg' > Ejem.Procedimiento </td>                          
                            <td class = 'verdeoscuroimg' > Ejem.Funcionarios </td>                            
                            <td class = 'verdeoscuroimg' > Ejem.Sector </td>
                            <td class = 'verdeoscuroimg' > Ejem.Acci&oacute;n </td>
                            
                            
                          </tr>


                        
                      </table> 

                      <br> 

                      <center id = "divtabla"  >
                        
                      </center> 
                          
                </div>

              
              </div>
            </div>
  
          </div>  

        </div><!--/col-->
      </div>
            
                            
                  
    <!-- Modal -->


                    
                

    

    <!-- javascripts -->
    <script src="../js/jquery.js"></script>
  <script src="../js/jquery-ui-1.10.4.min.js"></script>
    <script src="../js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="../js/jquery.scrollTo.min.js"></script>
    <script src="../js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="../assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="../js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="../assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="../js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="../js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
  <script src="../assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="../js/calendar-custom.js"></script>
  <script src="../js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="../js/jquery.customSelect.min.js" ></script>
  <script src="../assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="../js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="../js/sparkline-chart.js"></script>
    <script src="../js/easy-pie-chart.js"></script>
  <script src="../js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="../js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="../js/jquery-jvectormap-ve-mill-en.js"></script>
  <script src="../js/xcharts.min.js"></script>
  <script src="../js/jquery.autosize.min.js"></script>
  <script src="../js/jquery.placeholder.min.js"></script>
  <script src="../js/gdp-data.js"></script>  
  <script src="../js/morris.min.js"></script>
  <script src="../js/sparklines.js"></script>  
  <script src="../js/charts.js"></script>
  <script src="../js/jquery.slimscroll.min.js"></script>
  <script src="../js/main.js"></script>
  
  <script>
    
      
      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      $(document).ready(function() {
           
         $("#buscar").focus();


         $("#buscar").keyup(function(){
          //$("#buscar").css("border-color", "#245580");
          

          var dato = $("#buscar").val();

          $("#cargando").html("<h6><img id = 'imgcargando' src='../img/cargando2.gif' alt='cargando' width='20%'>&nbsp;&nbsp;<strong> Cargando...</strong><h6>");

          if(dato.length > 0){
             //console.log(dato);
            $.ajax({
              url:"../CONTROLADOR/Controlador_Acta.php",
              method: "GET",              
              data:{"dato":dato},
              error: function( jqXHR,  textStatus,  errorThrown) {
                  alert('Error Ajax Procedimientos');
                  alert(textStatus);
                  console.log(textStatus);
              },
              success: function(resultado){
                 //$("#tabla").empty();

                
                 $("#tabla tr").remove();
                 var cabecera = "<thead>";
                    cabecera += "  <tr class=success>";              
                    cabecera += "    <th>N&deg;</th>";
                    cabecera += "    <th>C&oacute;digo</th>";
                    cabecera += "    <th>Fecha</th>";
                    cabecera += "    <th>Hora</th>";
                    cabecera += "    <th>Tipo</th>";
                    cabecera += "    <th>Sector</th>";
                    cabecera += "    <th>Funcionarios</th>";                   
                    cabecera += "    <th>Procedimiento</th>";
                    cabecera += "    <th>Acci&oacute;n</th>";
                    cabecera += "  </tr>";
                    cabecera += "</thead>";
                  $("#tabla").prepend(cabecera);  

                $.each(resultado,function(index){  
                                        
               var nuevaFila="<tr id = '"+index+"'>";
               nuevaFila+="<td > &nbsp;&nbsp;&nbsp;&nbsp;"+(index+1)+"</td>";      
               nuevaFila+="<td > "+resultado[index].numero_act+" </td>";              
               nuevaFila+="<td > "+resultado[index].fecha_act+" </td>";  
               nuevaFila+="<td > "+resultado[index].hora_act+" </td>";                          
               nuevaFila+="<td > "+resultado[index].tipo_act+" </td>";
               nuevaFila+="<td > "+resultado[index].sector_act+" </td>";                             
               nuevaFila+="<td > "+resultado[index].cantidad_per+" </td>"; 
               nuevaFila+="<td > "+resultado[index].nombre_pro+" </td>";  
                        
               nuevaFila+="<td> "+"<button type = 'submit' class = 'btn btn-info vermas' id = '"+index+"'>Ver <span class='glyphicon glyphicon-plus blancoimg'></span></button>"+" </td>";
              nuevaFila+="</tr>";
              

            $("#tabla").append(nuevaFila);
                 
                });

                              
                    
                    if(resultado.length <= 0 ){
                      $("#cargando").html("<span class ='glyphicon glyphicon-remove rojoimg'></span>");
                                           
                    }else{

                       $("#cargando").html("<span class ='glyphicon glyphicon-ok verdeoscuroimg'></span>");
                        
                    }

                    
              $(".vermas").on( "click", function() {
            
                var indice = $(this).attr("id");          
                var vermas = " <thead>";
                    vermas += " <tr class='success'>";                                    
                    vermas += "  <th>N&deg;</th>";
                    vermas += "  <th colspan = '1'>C&oacute;digo  Proc.</th>";
                    vermas += "  <th>Fecha</th>";
                    vermas += "  <th>Hora</th>";
                    vermas += "  <th>Tipo</th>";
                    vermas += "  <th>Unidad</th>";
                    vermas += "  <th>Sector</th>";
                    vermas += "  <th>Dependencia</th>";

                    vermas += "</tr>";
                    vermas += " </thead>";
                    vermas += "<tr id = 'acta' class = 'visible'>";
                    vermas += "  <td>"+resultado[indice].numero_act+"</td>";
                    vermas += "  <td id = 'procedimiento' colspan = '1'>"+resultado[indice].cod_pro+"</td>";
                    vermas += "  <td>"+resultado[indice].fecha_act+"</td>";
                    vermas += "  <td>"+resultado[indice].hora_act+"</td>";
                    vermas += "  <td>"+resultado[indice].tipo_act+"</td>";
                    vermas += "  <td>"+resultado[indice].unidad_act+"</td>";
                    vermas += "  <td>"+resultado[indice].sector_act+"</td>";
                    vermas += "  <td>"+resultado[indice].dependencia_act+"</td>";
                    vermas += "</tr>";
                    vermas += "<tr class=' oculto'>";
                    vermas += "  <td><input id = 'num_"+resultado[indice].codigo_act+"' size = '8' minlength='1'   type='text' value = '"+resultado[indice].numero_act+"'  required /></td>";
                    vermas += "  <td colspan = '1'><input id = 'pro_"+resultado[indice].codigo_act+"' size = '8' minlength='1'   type='text' value = '"+resultado[indice].cod_pro+"'  required /></td>";
                    vermas += "  <td><input id = 'fec_"+resultado[indice].codigo_act+"' size = '12' minlength='6' type='text' value = '"+resultado[indice].fecha_act+"' required /></td>";
                    vermas += "  <td><input id = 'hor_"+resultado[indice].codigo_act+"' size = '10' minlength='6' type='text' value = '"+resultado[indice].hora_act+"' required /></td>";
                    vermas += "  <td><input id = 'tip_"+resultado[indice].codigo_act+"' size = '14' minlength='1' type='text' value = '"+resultado[indice].tipo_act+"' required /></td>";
                    vermas += "  <td><input id = 'uni_"+resultado[indice].codigo_act+"' size = '12' minlength='1' type='text' value = '"+resultado[indice].unidad_act+"' required /></td>";
                    vermas += "  <td><input id = 'sec_"+resultado[indice].codigo_act+"' size = '18' minlength='1' type='text' value = '"+resultado[indice].sector_act+"' required /></td>";
                    vermas += "  <td><input id = 'dep_"+resultado[indice].codigo_act+"' size = '12' minlength='1' type='text' value = '"+resultado[indice].dependencia_act+"' required /></td>";
                    vermas += "</tr>";

                    
                    vermas += "<thead>";
                    vermas += "<tr class='success'>";
                    vermas += "  <th colspan = '8' class = 'textcenter' >Comentario</th>";
                    vermas += "</tr>"
                    vermas += "</thead>";

                    vermas += "<tr id = 'comentario' class = 'visible '>"; 
                    vermas += "  <td colspan = '8' class = 'textcenter' >"+resultado[indice].comentario_act+"</td>";
                    vermas += "</tr>";
                    vermas += "<tr class=' oculto'>";
                    vermas += "  <td colspan = '8'><input id = 'com_"+resultado[indice].codigo_act+"' size = '160' minlength='0' type='text' value = '"+resultado[indice].comentario_act+"' required /></td>";
                    vermas += "</tr>";

                    var i = 0;
                    for( i = 0 ; i < resultado[indice].cantidad_per ; i++){
                      vermas += "<thead>";
                      vermas += "<tr class='success'>";
                      vermas += "  <th colspan = '2'>Cédula</th>";
                      vermas += "  <th colspan = '1'>Primer Nombre</th>" ;
                      vermas += "  <th >Segundo Nombre</th>" ;                
                      vermas += "  <th >Primer Apellido</th>";                
                      vermas += "  <th >Segundo Apellido</th>";
                      vermas += "  <th class = 'credencial' colspan = '2' >Credencial</th>";
                      vermas += "  <th class = 'oculto' >Acci&oacute;n</th>";
                      vermas += "</tr>"
                      vermas += "</thead>";

                      vermas += "<tr id = 'persona' >";
                      vermas += "  <td colspan = '2'>"+resultado[indice]["cedula_per"][i]+"</td>";
                      vermas += "  <td colspan = '1'>"+resultado[indice]["nombre1_per"][i]+"</td>" ;  
                      vermas += "  <td>"+resultado[indice]["nombre2_per"][i]+"</td>" ;                  
                      vermas += "  <td colspan = '1'>"+resultado[indice]["apellido1_per"][i]+"</td>";                
                      vermas += "  <td>"+resultado[indice]["apellido2_per"][i]+"</td>";
                      vermas += "  <td class = 'credencial' colspan = '2'>"+resultado[indice]["credencial_fun"][i]+"</td>";
                      vermas += "  <td class = 'oculto'><button  type = 'submit' class = 'btn btn-danger elimfun'> <span class ='glyphicon glyphicon-remove blancoimg'></span></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <button type = 'submit' class = 'btn btn-success agrefun' > <span class='glyphicon glyphicon-plus blancoimg'></span></button></td>";
                      vermas += "</tr>";

                     
                     

                    }
                    
                    vermas += "</tr>";
                              

                   
                   var btneditar = "<button id = '"+resultado[indice].codigo_act+"' type = 'submit' class = 'btn btn-success aceptaredi editando transparente' >Guardar <span class='glyphicon glyphicon-ok blancoimg'></span></button>&nbsp;&nbsp;&nbsp;"+"<button  id = 'btncancelaredi' type = 'submit' class = 'btn btn-danger  editando'>Cancelar <span class ='glyphicon glyphicon-remove blancoimg'></span></button>";                  
                   var btnvermas = "<button id = '"+resultado[indice].codigo_act+"' type = 'submit' class = 'btn btn-warning  editar' >Editar<span class='glyphicon glyphicon-pencil blancoimg'></span></button>";     
                   
                   $("#tabla tr").remove();
                   $("#tabla").append(vermas);
                   $("#divtabla").append(btnvermas,btneditar);
                   $(".editando").hide();


                

                   $("#buscar").keyup(function(){

                    $(".editar,.editando").remove();
                   });


                   $(".editar").on( "click", function() {

                      
                      $(".credencial").attr('colspan',0);
                      $("#procedimiento").attr('colspan',0);
                      $(".visible").hide("slow",function(){
                           $(".oculto").show("fast");
                          
                      
                      });

                      $(".editar").hide("slow",function(){
                        $(".editando").show();
                      });


                    });

                   //cancelar editar
                      $("#btncancelaredi").on( "click", function() {
                      
                        $(".oculto").hide("slow",function(){
                             $(".visible").show("fast");
                            
                        
                        });
                                             
                        $(".editando").hide("slow",function(){
                          $(".editar").show();
                        });

                        $(".editar").on( "click", function() {

                             $(".visible").hide("slow",function(){
                               $(".oculto").show("fast");
                              
                          
                            });

                              $(".editar").hide("slow",function(){
                                $(".editando").show();

                             });
                          });
                      });

                    
                     
                      //alert("hola");
                     //aceptar editar
                     $(".aceptaredi").on( "click", function() {

                      
                      var cod = $(this).attr("id"); 

                      var num = document.getElementById('num_'+cod).value;
                      var fec = document.getElementById('fec_'+cod).value;
                      var hor = document.getElementById('hor_'+cod).value;
                      var tip = document.getElementById('tip_'+cod).value;
                      var uni = document.getElementById('uni_'+cod).value;
                      var sec = document.getElementById('sec_'+cod).value;
                      var dep = document.getElementById('dep_'+cod).value;
                      var com = document.getElementById('com_'+cod).value;

                      var pro = document.getElementById('pro_'+cod).value;
                      

                      var act = "";      
                      
                      act += "  <td>"+num+"</td>";
                      act += "  <td colspan = '1'>"+pro+"</td>";
                      act += "  <td>"+fec+"</td>";
                      act += "  <td>"+hor+"</td>";
                      act += "  <td>"+tip+"</td>";
                      act += "  <td>"+uni+"</td>";
                      act += "  <td>"+sec+"</td>";
                      act += "  <td>"+dep+"</td>" ;
                     

                      var comen = "";
              
                      comen += "  <td colspan = '8' >"+com+"</td>";
                      
                      
                      

                      
                      $.post("../CONTROLADOR/Controlador_Acta.php",{cod:cod,num: num, fec: fec, hor:hor, tip: tip, uni: uni, sec: sec, dep: dep, com: com, pro: pro},function(){

                        $(".editando").hide("slow",function(){
                            $(".editar").show();
                          });

                        $(".oculto").hide("slow",function(){

                          $("#acta").html(act);
                          $("#comentario").html(comen);

                           
                          
                           $(".visible").show("fast");

                          
                          
                      
                            $(".editar").on( "click", function() {
                            
                              $(".visible").hide("slow",function(){
                               $(".oculto").show("fast");
                              
                          
                              });

                                $(".editar").hide("slow",function(){
                                  $(".editando").show();

                               });
                            });
                          });

                      });


                      });

                        



           }); 
                     

                  

                  
                    
                      
              }
              
            });

          }else{

            //$('#tabla').children( 'tr:not(:first)' ).remove();
            $('tr:not(:first)').remove();
            var primeraFila = "<tr>";
            primeraFila +="<td class = 'verdeoscuroimg'> N&deg; </td>";
            primeraFila +="<td class = 'verdeoscuroimg'> Ejem.C&oacute;digo </td>";
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.fecha </td>";      
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.C&eacute;dula </td>";              
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Nombre1 </td>";                                       
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Apellido1 </td>";                            
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.placa </td>";
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Ver + </td>";
            primeraFila += "</tr>";
            $("#tabla").append(primeraFila);
            $("#cargando").html("");
          }
         
        });

                
      });


      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
    
    /* ---------- Map ---------- */
  $(function(){
    $('#map').vectorMap({
      map: 've_mill_en',
      series: {
        regions: [{
          values: gdpData,
          scale: ['#000', '#000'],
          normalizeFunction: 'polynomial'
        }]
      },
   backgroundColor: '#8D8D8D',
      onLabelShow: function(e, el, code){
        el.html(el.html()+' (GDP - '+gdpData[code]+')');
      }
    });
  });



  



  </script>

  </body>
</html>

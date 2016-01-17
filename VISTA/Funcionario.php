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
                                <a href="Perfil.php"><i class="icon_profile"></i> Mi Perfil</a>
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
                            <li><a class="" href="Meritos Demeritos.php">Récords Disciplinarios</a></li>
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
                          <li><a class="" href="GraficasActas.php">Estad&iacute;sticas por Años</a></li>
                          <li><a class="" href="GraficasActasSector.php">Estad&iacute;sticas por Sectores</a></li>
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
                      <a href="Bitacora.php" class="">
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
              <!-- sidebar menu end-->
       </section>
      <!--sidebar end-->
      
       <!--main content start-->
      <section id="main-content">

          <section class="wrapper"> 

              <!--overview start-->
        <div class="row">
        <div class="col-lg-12">
          <p class="text-right"><a class="" href="#modalp">&nbsp;<i class="glyphicon glyphicon-question-sign"></i>Ayuda</a> </p>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="Usuario.php">Inicio</a></li>  &nbsp;&nbsp;&nbsp;<i></i>&nbsp;Funcionarios
                          
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

       <!-- Comienzo Modales para manual de usuario
   <div id="modal1" class="modalmask">
    <div class="modalbox movedown">
        
        
        <p>Para Registrar un Funcionario dirígete al menú vertical ubicado en la parte izquierda de la pantalla y haz clic en  Gestionar Acta, tal como se explica en la siguiente imagen:
        </p>
        <center><img src="../img/Ayudafuncionario1.jpg" class="img img-responsive"></center>
        <br>
         <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modalp">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal2">&nbsp;Siguiente</a> </p>
          </div>
        </div>
    </div>
  </div>
    
  <div id="modal2" class="modalmask">
    <div class="modalbox movedown">
        <a href="#close" title="Close" class="close">X</a>
        <br>
        <p>A continuación se desplegará el menú, ubica la opción Funcionarios y haz clic, tal como se explica en la siguiente imagen:
        </p>
        <center><img src="../img/Ayudafuncionario2.jpg" class="img img-responsive"></center>
        <br>
        <div class="row">
          <div class="col-lg-6">
            <p class="text-left"><a class="" href="#modal1">&nbsp;Anterior</a> </p>
            
          </div>
          <div class="col-lg-6">
            
           <p class="text-right"><a class="" href="#modal3">&nbsp;Siguiente</a> </p>
          </div>
        </div>
        
    </div>
  </div>
-->
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
        <p>Ubica en la parte superior-izquierda el campo de texto que dice Buscar y teclea la cédula o el primer nombre del funcionario a consultar. 
          El Sistema filtrará los datos que coincidan con lo que  teclees en el campo de texto.

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
              <h2><i class="fa fa-flag-o red"></i><strong>Funcionarios</strong></h2>
              <div class="panel-actions">
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal"> Agregar&nbsp;&nbsp;<span class="glyphicon glyphicon-plus"></span></button>
                
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
                <div  class = "">

                      <table class="table  table-hover" width="100%" id = "tabla">

                        <br>
                          <thead>
                            <tr class="success">
                              
                              <th>N&deg;</th>
                              <th>Cédula</th>
                              <th>Primer Nombre</th>
                              <th>Segundo Nombre</th>                   
                              <th>Primer Apellido</th>
                              <th>Segundo Apellido</th>
                              <th>Credencial</th>
                              <th>Status</th>
                              <th>Acci&oacute;n<th>
                              
                           

                            </tr>
                          </thead>
                          <tr>
                            <td class = 'verdeoscuroimg'> Ejem.N&deg; </td>      
                            <td class = 'verdeoscuroimg' > Ejem.C&eacute;dula </td>              
                            <td class = 'verdeoscuroimg' > Ejem.Nombre1 </td>                          
                            <td class = 'verdeoscuroimg' > Ejem.Nombre2 </td>
                            <td class = 'verdeoscuroimg' > Ejem.Apellido1 </td>                            
                            <td class = 'verdeoscuroimg' > Ejem.Apellido2 </td>
                            <td class = 'verdeoscuroimg' > Ejem.Credencial </td>
                            <td class = 'verdeoscuroimg' > Ejem.Status </td>
                            <td class = 'verdeoscuroimg' > Ejem.Acci&oacute;n </td>
                          </tr>   

                      </table>       
                </div>

              
              </div>
            </div>
  
          </div>  

        </div><!--/col-->
      </div>
            
    
  
   <!-- Modal -->


                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                      <div class="modal-dialog modal-registro">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <center><h4 class="modal-title" id="myModalLabel">Registro de Funcionario</h4></center>
                          </div>
                          <div class="modal-body">
                                            
                                          
                         
                          <div class="panel-body">
                              <div class="form">
                                  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="../CONTROLADOR/Controlador_Funcionario.php" onSubmit="return validar(this)">
                                      <div class="form-group ">
                                          <label for="cedula" class="control-label col-lg-3">Cédula <span class="required">*</span></label>
                                            <div class="col-lg-9">
                                               <div class="input-group">
                                                  
                                                  <input class="form-control" id="cedula" name="cedula" min="1000000" max="999999999" autofocus type="number" onblur="javascript:validar();" required />
                                                  <span class="input-group-addon"> <a class="" href="#modal12">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                                              </div>
                                              
                                          </div>
                                          <div class="alert col-lg-12 " id="txtcedula" ></div>
                                      </div>


                                      <div class="form-group ">
                                          <label for="nombre1" class="control-label col-lg-3">Primer Nombre <span class="required">*</span></label>
                                          <div class="col-lg-9">
                                            <div class="input-group">
                                                  
                                                  <input class="form-control " id="nombre1" type="text" name="nombre1" minlength="1" maxlength="50" onblur="javascript:validar();" required />
                                                  <span class="input-group-addon"> <a class="" href="#modal13">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                                              </div>
                                              
                                          </div>
                                          <div class="alert col-lg-12 " id="txtnombre1" ></div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="nombre2" class="control-label col-lg-3">Segundo Nombre <span ></span></label>
                                          <div class="col-lg-9">
                                            <div class="input-group">
                                                  
                                                  <input class="form-control " id="nombre2" type="text" name="nombre2" minlength="1" maxlength="50" onblur="javascript:validar();" required />
                                                  <span class="input-group-addon"> <a class="" href="#modal14">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                                              </div>
                                              
                                          </div>
                                          <div class="alert col-lg-12 " id="txtnombre2" ></div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="apellido1" class="control-label col-lg-3">Primer Apellido <span class="required">*</span></label>
                                          <div class="col-lg-9">
                                            <div class="input-group">
                                                  
                                                  <input class="form-control " id="apellido1" type="text" name="apellido1" minlength="1" maxlength="50" onblur="javascript:validar();" required />
                                                  <span class="input-group-addon"> <a class="" href="#modal15">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                                              </div>
                                              
                                          </div>
                                          <div class="alert col-lg-12 " id="txtapellido1" ></div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="apellido2" class="control-label col-lg-3">Segundo Apellido <span ></span></label>
                                          <div class="col-lg-9">
                                            <div class="input-group">
                                                  
                                                  <input class="form-control " id="apellido2" type="text" name="apellido2" minlength="1" maxlength="50" onblur="javascript:validar();" required />
                                                  <span class="input-group-addon"> <a class="" href="#modal16">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                                              </div>
                                              
                                          </div>
                                          <div class="alert col-lg-12 " id="txtapellido2" ></div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="credencial" class="control-label col-lg-3">Credencial <span class="required">*</span></label>
                                          <div class="col-lg-9">
                                            <div class="input-group">
                                                  
                                                  <input class="form-control " id="credencial" type="text" name="credencial" minlength="1" maxlength="50" onblur="javascript:validar();" required />
                                                  <span class="input-group-addon"> <a class="" href="#modal17">&nbsp;<i class="glyphicon glyphicon-question-sign"></i></a></span>
                        
                                              </div>
                                              
                                          </div>
                                          <div class="alert col-lg-12 " id="txtcredencial" ></div>
                                      </div>
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-3 col-lg-9">
                                              <input class="btn btn-primary" type="submit" value="Guardar" name="Guardar">
                                              
                                          </div>
                                      </div>
                                  </form>
                              </div>

                          </div>
                   
                                       
                          </div>
                          
                        </div>
                      </div>
                    </div> 
                </div>
                </div>
            </div> 

    

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
  


  <script type="text/javascript">

      function validaremail(correo){
          var tester= /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-]+)\.)+([a-zA-Z0-9]{2,4})+$/;
          return tester.test(correo);
          
      }

      function validarclave(clave){
          var tester= /^([a-zA-Z0-9*.,-_+´]{4,20})+$/;
          return tester.test(clave);
          
      }

      function validarsololetras(atributo){
          var tester= /^([a-zA-Z0´])+$/;
          return tester.test(atributo);
      }

      function validarsolonumeros(atributo){
          var tester= /^([0-9])+$/;
          return tester.test(atributo);
      }

      




      function validar(){
          var cedula=document.getElementById('cedula').value;
          var nombre1=document.getElementById('nombre1').value;
          var nombre2=document.getElementById('nombre2').value;
          var apellido1=document.getElementById('apellido1').value;
          var apellido2=document.getElementById('apellido2').value;
          var credencial=document.getElementById('credencial').value;
         
         
          if(cedula==""){
            $('#txtcedula').html('Este Campo es Obligatorio. Por favor ingrese la Cédula del Funcionario').slideDown(500);
            $('#cedula').focus();
            return false;
          }
          else{
            $('#txtcedula').html('').slideUp(300);

          }


          if(nombre1==""){
            $('#txtnombre1').html('Este Campo es Obligatorio. Por favor ingrese el primer Nombre del Funcionario').slideDown(500);
            $('#nombre1').focus();
            return false;
          }
          else{
            $('#txtnombre1').html('').slideUp(300);

          }
          
          if(validarsololetras(nombre1)==false){
            $('#txtnombre1').html('El Nombre no puede contener dígitos').slideDown(500);
            $('#nombre1').focus();
            return false;
          }
          else{
            $('#txtnombre1').html('').slideUp(300);

          }

          if(nombre2!=""){
            if(validarsololetras(nombre2)==false){
            $('#txtnombre2').html('El Nombre no puede contener dígitos').slideDown(500);
            $('#nombre2').focus();
            return false;
          }
          else{
            $('#txtnombre2').html('').slideUp(300);

          }
          }
          

          if(apellido1==""){
            $('#txtapellido1').html('Este Campo es Obligatorio. Por favor ingrese el primer Apellido del Funcionario').slideDown(500);
            $('#apellido1').focus();
            return false;
          }
          else{
            $('#txtapellido1').html('').slideUp(300);

          }

          if(validarsololetras(apellido2)==false){
            $('#txtapellido2').html('El Apellido no puede contener dígitos').slideDown(500);
            $('#apellido2').focus();
            return false;
          }
          else{
            $('#txtapellido2').html('').slideUp(300);

          }


          if(credencial==""){
            $('#txtcredencial').html('Este Campo es Obligatorio. Por favor ingrese la Credencial del Funcionario').slideDown(500);
            $('#credencial').focus();
            
            return false;
          }
          else{
            $('#txtcredencial').html('').slideUp(300);
            

          }

          
      }

      
    </script>



  <script>
    
     

      //consulta y carousel
      $(document).ready(function() {
           
         $("#buscar").focus();


         $("#buscar").keyup(function(){
          //$("#buscar").css("border-color", "#245580");
          

          var dato = $("#buscar").val();

          $("#cargando").html("<h6><img id = 'imgcargando' src='../img/cargando2.gif' alt='cargando' width='20%'>&nbsp;&nbsp;<strong> Cargando...</strong><h6>");

          if(dato.length > 0){
             //console.log(dato);
            $.ajax({
              url:"../CONTROLADOR/Controlador_ConsultarF.php",
              method: "GET",              
              data:{"dato":dato},
              error: function( jqXHR,  textStatus,  errorThrown) {
                  //alert('Error Ajax Procedimientos');
                  alert(textStatus);
                  console.log(textStatus);
              },
              success: function(resultado){
                 //$("#tabla").empty();

                
                 $("#tabla tr td").remove();
                $.each(resultado,function(index){  
                                        
               var nuevaFila= "<tr id='cambiar"+resultado[index].codigo_per+"'>";
               nuevaFila+="<td > &nbsp;&nbsp;&nbsp;&nbsp;"+(index+1)+"</td>";      
               nuevaFila+="<td id = 'ci_td_"+resultado[index].codigo_per+"' > "+resultado[index].cedula_per+" </td>";              
               nuevaFila+="<td id = 'nom1_td_"+resultado[index].codigo_per+"'> "+resultado[index].nombre1_per+" </td>";                            
               nuevaFila+="<td id = 'nom2_td_"+resultado[index].codigo_per+"'> "+resultado[index].nombre2_per+" </td>";
               nuevaFila+="<td id = 'ape1_td_"+resultado[index].codigo_per+"'> "+resultado[index].apellido1_per+" </td>";                            
               nuevaFila+="<td id = 'ape2_td_"+resultado[index].codigo_per+"'> "+resultado[index].apellido2_per+" </td>";   
               nuevaFila+="<td id = 'ape2_td_"+resultado[index].codigo_per+"'> "+resultado[index].credencial_fun+" </td>";  
               nuevaFila+="<td id = 'sta_td_"+resultado[index].codigo_per+"'> "+resultado[index].status_fun+" </td>";         
               nuevaFila+="<td> "+"<button type = 'submit' class = 'btn btn-warning editar' ><span class='glyphicon glyphicon-pencil blancoimg'></span></button>"+" </td>";
              nuevaFila+="</tr>";
              
              nuevaFila+="<tr id='cambio"+resultado[index].codigo_per+"'  class = 'oculto' >";
              nuevaFila+="<td  id = '"+(index+1)+"' > &nbsp;&nbsp;&nbsp;&nbsp;"+(index+1)+"</td>";
              nuevaFila+="<td><input id = 'ci_"+resultado[index].codigo_per+"' style='width: 8em;' min='1000000' max='999999999'  type='number' value = '"+resultado[index].cedula_per+"'   required /> </td>";
              nuevaFila+="<td><input id = 'nom1_"+resultado[index].codigo_per+"' size = '18' minlength='1' maxlength='50' type='text' value = '"+resultado[index].nombre1_per+"' required /> </td>"; 
              nuevaFila+="<td><input id = 'nom2_"+resultado[index].codigo_per+"' size = '18' minlength='1' maxlength='50' type='text' value = '"+resultado[index].nombre2_per+"' required /> </td>"; 
              nuevaFila+="<td><input id = 'ape1_"+resultado[index].codigo_per+"' size = '18' minlength='1' maxlength='50' type='text' value = '"+resultado[index].apellido1_per+"' required /> </td>"; 
              nuevaFila+="<td><input id = 'ape2_"+resultado[index].codigo_per+"' size = '18' minlength='1' maxlength='50' type='text' value = '"+resultado[index].apellido2_per+"' required /> </td>";
              nuevaFila+="<td><input id = 'cre_"+resultado[index].codigo_per+"' size = '12' minlength='1' maxlength='50'  type='text' value = '"+resultado[index].credencial_fun+"' required /> </td>";
               nuevaFila+="<td><input id = 'sta_"+resultado[index].codigo_per+"' size = '12' minlength='1' maxlength='10'  type='text' value = '"+resultado[index].status_fun+"' required /> </td>";
              nuevaFila+="<td> "+"<button id = '"+resultado[index].codigo_per+"' type = 'submit' class = 'btn btn-success aceptaredi' > <span class='glyphicon glyphicon-ok blancoimg'></span></button>"+"<button  type = 'button' class = 'btn btn-danger cancelaredi'> <span class ='glyphicon glyphicon-remove blancoimg'></span></button>"+"</td>";
              nuevaFila+="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";      
              nuevaFila+="</tr>";
              

            $("#tabla").append(nuevaFila);
                 
                });

                              
                    
                    if(resultado.length <= 0 ){
                      $("#cargando").html("<span class ='glyphicon glyphicon-remove rojoimg'></span>");
                                           
                    }else{

                       $("#cargando").html("<span class ='glyphicon glyphicon-ok verdeoscuroimg'></span>");
                        
                    }

                    $(".editar").on( "click", function() {
                      
                      $(this).closest("tr").hide("slow",function(){
                           $(this).closest("tr").next("tr").show("fast");
                          
                      
                      });
                    });

                     $(".cancelaredi").on( "click", function() {
                      
                      $(this).closest("tr").hide("slow",function(){
                           $(this).closest("tr").prev("tr").show("fast");
                          
                      
                      });
                    });

                    $(".aceptaredi").on( "click", function() {
                      
                      
                      var elemento = $(this);
                      var codigo = $(this).attr("id");
                      var index = $(this).closest("tr").children('td:first').attr("id"); 
                      var ci = document.getElementById('ci_'+codigo).value;              
                      var nom1 = document.getElementById('nom1_'+codigo).value;
                      var nom2 = document.getElementById('nom2_'+codigo).value;
                      var ape1 = document.getElementById('ape1_'+codigo).value;
                      var ape2 = document.getElementById('ape2_'+codigo).value;
                      var cre = document.getElementById('cre_'+codigo).value;
                      var sta = document.getElementById('sta_'+codigo).value;

                      var trd = "";
                      trd+="<td > &nbsp;&nbsp;&nbsp;&nbsp;"+index+"</td>";      
                      trd+="<td id = 'ci_td_"+codigo+"' > "+ci+" </td>";              
                      trd+="<td id = 'nom1_td_"+codigo+"'> "+nom1+" </td>";                            
                      trd+="<td id = 'nom2_td_"+codigo+"'> "+nom2+" </td>";
                      trd+="<td id = 'ape1_td_"+codigo+"'> "+ape1+" </td>";                            
                      trd+="<td id = 'ape2_td_"+codigo+"'> "+ape2+" </td>";
                      trd+="<td id = 'cre_td_"+codigo+"'> "+cre+" </td>";
                      trd+="<td id = 'sta_td_"+codigo+"'> "+sta+" </td>";
                      trd+="<td> "+"<button type = 'submit' class = 'btn btn-warning editar' ><span class='glyphicon glyphicon-pencil blancoimg'></span></button>"+" </td>";
                      
                      
                      $.post("../CONTROLADOR/Controlador_Funcionario.php",{codigo: codigo, ci: ci, nom1: nom1, nom2: nom2, ape1: ape1, ape2: ape2, cre: cre , sta: sta},function(){

                        elemento.closest("tr").hide("slow",function(){
                          $(this).closest("tr").prev("tr").html(trd);
                           $(this).closest("tr").prev("tr").show("fast");
                          
                      
                            $(".editar").on( "click", function() {
                            
                            $(this).closest("tr").hide("slow",function(){
                                 $(this).closest("tr").next("tr").show("fast");
                                
                            
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
            primeraFila +="<td class = 'verdeoscuroimg'> Ejem.N&deg; </td>";      
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.C&eacute;dula </td>";              
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Nombre1 </td>";                            
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Nombre2 </td>";
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Apellido1 </td>";                            
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Apellido2 </td>";
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Credencial </td>";
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Status </td>";
            primeraFila+="<td class = 'verdeoscuroimg' > Ejem.Acci&oacute;n </td>";
            primeraFila += "</tr>";
            $("#tabla").append(primeraFila);
            $("#cargando").html("");
          }
         
        });


            $("#cancelar").click(function () {
              
                          
              $("#myModal").modal('hide');
               $("#feedback_form")[0].reset();
            });  
          
         
          
      });

   



  



  </script>

  </body>
</html>

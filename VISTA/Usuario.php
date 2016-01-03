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
                                    Llamar al Jefe de Tr&aacute;nsito.
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
              <!-- sidebar menu end-->
       </section>
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
          
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2><i class="fa fa-map-marker red"></i><strong>Venezuela</strong></h2>
              <div class="panel-actions">
                <a href="Usuario.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="Usuario.php#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="Usuario.php#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>  
            </div>
            <div class="panel-body-map">
              <div id="map" style="height:380px;"></div>  
            </div>
  
          </div>
        </div>
              <div class="col-md-3">
              <!-- List starts -->
        <ul class="today-datas">
                <!-- List #1 -->
        <li>
                   <!-- Graph -->
                  <div><span id="todayspark1" class="spark"></span></div>
                  <!-- Text -->
                  <div class="datas-text">11,500 Visitantes / Día</div>
                </li>
                <li>
                  <div><span id="todayspark2" class="spark"></span></div>
                  <div class="datas-text">15,000 Páginas vistas</div>
                </li>
                <li>
                  <div><span id="todayspark3" class="spark"></span></div>
                  <div class="datas-text">30.55% Porcentaje de Rebote</div>
                </li>
                <li>
                  <div><span id="todayspark4" class="spark"></span></div>
                  <div class="datas-text">Bs 5000,00 Ingresos / Día</div>
                </li> 
                <li>
                  <div><span id="todayspark5" class="spark"></span></div>
                  <div class="datas-text">12,000000 Visitantes cada Mes</div>
                </li>                                                                                                              
              </ul>
              </div>
              
       
           </div>  
            
      
      <!-- Today status end -->
      
              
        
      <div class="row">
                
        <div class="col-lg-9 col-md-12">  
          <div class="panel panel-default">
            <div class="panel-heading">
             <h2><i class="fa fa-flag-o red"></i><strong>Actas Registradas</strong></h2>
              <div class="panel-actions">
                <a href="Usuario.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                <a href="Usuario.php#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                <a href="Usuario.php#" class="btn-close"><i class="fa fa-times"></i></a>
              </div>
            </div>
            <div class="panel-body">
              <table class="table bootstrap-datatable countries">
                <thead>
                  <tr>
                    <th></th>
                    <th>N&uacute;mero</th>
                                        <th>Procedimiento</th>
                    <th>Cantidad</th>                   
                    <th>Porcentaje</th>
                  </tr>
                </thead>   
                <tbody>
                                    <tr>
                      <td>&nbsp;</td>
                    <td>#001</td>
                    <td>Robo</td>
                    <td>5</td>
                    <td>
                      <div class="progress thin">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
                        </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100" style="width: 27%">
                          </div>
                      </div>
                      <span class="sr-only">73%</span>    
                    </td>
                  </tr>
                      <td>&nbsp;</td>
                    <td>#002</td>
                    <td>Detenc&oacute;n</td>
                    <td>3</td>
                    <td>
                      <div class="progress thin">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                        </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100" style="width: 43%">
                        </div>
                      </div>
                      <span class="sr-only">57%</span>    
                    </td>
                  </tr>
                      <td>&nbsp;</td>
                    <td>#003</td>
                    <td>Acta Informativa</td>
                    <td>1</td>
                    <td>
                      <div class="progress thin">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%">
                        </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100" style="width: 7%">
                          </div>
                      </div>
                      <span class="sr-only">93%</span>    
                    </td>
                  </tr>
                      <td>&nbsp;</td>
                    <td>#003</td>
                    <td>Persecuci&oacute;n</td>
                    <td>2</td>
                    <td>
                      <div class="progress thin">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                          </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                          </div>
                      </div>
                      <span class="sr-only">20%</span>    
                    </td>
                  </tr>
                      <td>&nbsp;</td>
                    <td>#004</td>
                    <td>Allanamiento</td>
                    <td>3</td>
                    <td>
                      <div class="progress thin">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                          </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                          </div>
                      </div>
                      <span class="sr-only">30%</span>    
                    </td>
                  </tr>
                  <tr>   
                                        </td>&nbsp;<td>
                    <td>#005</td>
                    <td>Vigilancia</td>
                    <td>5</td>
                    <td>
                      <div class="progress thin">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                          </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                          </div>
                      </div>
                      <span class="sr-only">50%</span>    
                    </td>
                  </tr>
                  <tr>   
                                        </td>&nbsp;<td>
                    <td>#006</td>
                    <td>Recorrido</td>
                    <td>4</td>
                    <td>
                      <div class="progress thin">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                          </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                          </div>
                      </div>
                      <span class="sr-only">40%</span>    
                    </td>
                  </tr>
                  <tr>
                                        </td>&nbsp;<td>
                    <td>#007</td>
                    <td>Patrullaje</td>
                    <td>6</td>
                    <td>
                      <div class="progress thin">
                          <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                          </div>
                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                          </div>
                      </div>
                      <span class="sr-only">60%</span>    
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
  
          </div>  

        </div><!--/col-->
        <div class="col-md-3">
          
          <div class="social-box facebook">
            <i class="fa fa-facebook"></i>
           <ul>
              <li>
                <strong>256</strong>
                <span>Amigos</span>
              </li>
              <li>
                <strong>359</strong>
                <span>Grupos</span>
              </li>
            </ul>
          </div><!--/social-box-->
        </div>
        <div class="col-md-3">
          
          <div class="social-box google-plus">
            <i class="fa fa-google-plus"></i>
            <ul>
              <li>
                <strong>962</strong>
                <span>Seguidores</span>
              </li>
              <li>
                <strong>256</strong>
                <span>Círculos</span>
              </li>
            </ul>
          </div><!--/social-box-->      
          
        </div><!--/col-->
        <div class="col-md-3">
          
          <div class="social-box twitter">
            <i class="fa fa-twitter"></i>
            <ul>
              <li>
                <strong>1562</strong>
                <span>Seguidores</span>
              </li>
              <li>
                <strong>2562</strong>
                <span>Tweets</span>
              </li>
            </ul>
          </div><!--/social-box-->      
          
        </div><!--/col-->
        
              </div>

                    
                   
                <!-- statics end -->
              
            
        

              <!-- project team & activity start -->
          <div class="row">
            <div class="col-md-4 portlets">
              <!-- Widget -->
              <div class="panel panel-default">
        <div class="panel-heading">
                  <div class="pull-left">Mensajes</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  <!-- Widget content -->
                  <div class="padd sscroll">
                    
                     <ul class="chats">

                      <!-- Chat by us. Use the class "by-me". -->
                      <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="../img/chat-avatar2.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta">Pedro Pérez<span class="pull-right">Hace 3 horas</span></div>
                          Detenidos 3 sujetos involucrados en robo de vehículo.
                          <div class="clearfix"></div>
                        </div>
                      </li> 

                      <!-- Chat by other. Use the class "by-other". -->
                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="../img/avatar-mini3.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">Hace 3 horas <span class="pull-right">Isbel Moreno</span></div>
                          10 Casos de robos en el mes de Junio.
                          <div class="clearfix"></div>
                        </div>
                      </li>   

                      <li class="by-me">
                        <div class="avatar pull-left">
                          <img src="../img/chat-avatar2.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <div class="chat-meta">Pedro Pérez <span class="pull-right">Hace 4 horas</span></div>
                          Detención de un sujeto por falta a la autoridad.
                          <div class="clearfix"></div>
                        </div>
                      </li>  

                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="../img/avatar-mini3.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta">Hace 3 horas <span class="pull-right">Isbel Moreno</span></div>
                          Pedro Pérez ganador de la orden del día.
                          <div class="clearfix"></div>
                        </div>
                      </li>                                                                                  
                        <li class="by-me">
                        <div class="avatar pull-left">
                          <img src="../img/chat-avatar2.jpg" alt=""/>
                        </div>

                        <div class="chat-content">
                          <div class="chat-meta">Pedro Pérez <span class="pull-right">Hace 4 horas</span></div>
                          Seguimiento en evento de ventas de electrodomésticos en el Municipio Libertador.
                          <div class="clearfix"></div>
                        </div>
                      </li>  
                    </ul>

                  </div>
                  <!-- Widget footer -->
                  <div class="widget-foot">
                      
                      <form class="form-inline">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Escribe tu mensaje aquÃ­ ...">
            </div>
                        <button type="submit" class="btn btn-info">Enviar</button>
                      </form>


                  </div>
                </div>


              </div> 
            </div>

                <div class="col-lg-8 portlets">
                      <!--Project Activity start-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h2><strong>Calendario</strong></h2>
                            <div class="panel-actions">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>  
                 
                        </div><br><br><br>
                        <div class="panel-body">
                          <!-- Widget content -->
                          
                            <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                            <div id="calendar"></div>
                          
                        </div>
                    </div> 
                </div>
        </div><br>
    
    

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

      


  </script>

  </body>
</html>

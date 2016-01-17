<?php


    header('Content-Type: text/html; charset=UTF-8');
    
    include_once("../MODELO/clsUsuario.php");
  include_once("../MODELO/clsBitacora.php");
    /*--------------------------------------------*/
session_start();
    
 $lobjBitacora=new clsBitacora();
      /*--------------------------------------------*/
      
     

      if(isset($_POST['Guardar'])){
        
        $correo = $_POST['correo']; 
        $nombre= $_POST['nombre']; 
        $apellido= $_POST['apellido']; 
        $clave = $_POST['clave']; 
        $tipo = $_POST['tipo_usuario']; 
        $carpeta = "../img/Usuarios/";
        opendir($carpeta);
        $destino = $_FILES['files']['name'];
        $ruta = $carpeta.$destino;
        
        $procesar=1;

      }
      
     else if(isset($_GET["dato"])){
              $dato = $_GET["dato"];
              $procesar=2;
            }


          else if(isset($_POST["entrar"])){
            $correo = $_POST['correo']; 
            $clave = $_POST['clave']; 
            $procesar=3;
          }

          else if(isset($_GET["cerrar"])){
               $procesar=4;
          }

          else if(isset($_POST["Editar"])){

              $nombre = $_POST["nom"];
              $apellido = $_POST["ape"];
              $correo = $_POST["ema"];
              $email = $_SESSION['email_usuario'];

              $carpeta = "../img/Usuarios/";
              opendir($carpeta);
              $ruta = $_SESSION['ruta'];
              copy($_FILES['files']['tmp_name'],$ruta);

              $procesar=6;
          }

      

          else if(isset($_POST["EditarC"])){
            $clave = $_POST["ncon"];
            $correo = $_SESSION['email_usuario'];
            $procesar = 7;
          }

          else{

              $dato = "1";
              $procesar=2;
          }
      
      
      switch($procesar) {
        case 1:
           $lobjUsuario=new clsUsuario();

           $lobjUsuario->incluir($nombre,$apellido,$correo,$clave,$tipo,$ruta);

           
              date_default_timezone_set("America/Caracas");
              $descripcion1="Se registró al Usuario ".$nombre." ".$apellido.", con el correo: ".$correo.", asignándole el rol de ".$tipo.".";
              $fecha1=date("Y/n/j");
              $hora1=date("h:i:s");
              $cod_usu1=$_SESSION["codigo_usuario"];
              $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);


            
            //Fin Bitácora
         
           break;
        case 2:
        
            
           $lobjUsuario=new clsUsuario();
          
             $lobjUsuario->set_tipo($dato);
              $data =$lobjUsuario->consultarUsuario();
            
            
            //$resultado = str_replace ( $dato, "hola", $data); 
            header("Content-Type:Application/json");
            echo json_encode($data);
            //usleep(850000);
             break;
             case 3:
             $lobjUsuario=new clsUsuario();
            $datos= $lobjUsuario->iniciarsesion($correo,$clave);

            if($datos[0]==""){
              echo '<script>alert("Usuario sin Acceso...")</script>';
              echo "<script language='javascript'>window.location.href='../VISTA/Principal.php';</script>";
            }
            else{

              $_SESSION["email_usuario"] = $datos[3]; 
              $_SESSION["codigo_usuario"] = $datos[0];
              $_SESSION["tipo_usuario"] = $datos[5];
              $_SESSION["nombre_usuario"] = $datos[1]; 
              $_SESSION["apellido_usuario"] = $datos[2];
              $_SESSION["clave"] = $datos[4];
              $_SESSION["ruta"] = $datos[6];
              //Bitácora
             
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se ingresó al Sistema. El Usuario inició Sesión";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
              echo "<script language='javascript'>window.location.href='../VISTA/Usuario.php';</script>";


            }


             break;

             case 4:
             $cod_usu1=$_SESSION["codigo_usuario"];
              $_SESSION["codigo_usuario"] = ""; 
              $_SESSION["email_usuario"] = ""; 
              $_SESSION["tipo_usuario"] = "";
              $_SESSION["nombre_usuario"] = ""; 
              $_SESSION["apellido_usuario"] = "";
               $_SESSION["clave"] = "";
              $_SESSION["ruta"] = "";
              //Bitácora
              
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se salió del Sistema. El Usuario cerró Sesión";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
              echo "<script language='javascript'>window.location.href='../VISTA/Principal.php';</script>";

             break;

             case 6:

             $lobjUsuario=new clsUsuario();
             //Consulta para traer datos anteriores para usar en Bitácora
             $codigo=$_SESSION['codigo_usuario'];
          $datos= $lobjUsuario->traerdatos($codigo);
         
          $nombre1a=$datos[1];
         
          $apellido1a=$datos[2];
          $emaila=$datos[3];
          //fin de consulta


             $resultado = $lobjUsuario->modificar($nombre,$apellido,$correo,$email);

             if($resultado){

                $_SESSION['email_usuario'] = $correo;
                $_SESSION["nombre_usuario"] = $nombre; 
                $_SESSION["apellido_usuario"] = $apellido;


                //Bitácora
             
           date_default_timezone_set("America/Caracas");
           $descripcion1="Se modificaron los datos del Usuario. Datos Anteriores -> Nombre: ".$nombre1a.",  Apellido: ".$apellido1a.", Email: ".$emaila.". 
           Nuevos Datos -> Nombre: ".$nombre.",  Apellido: ".$apellido.", Email: ".$correo.".";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            $cod_usu1=$_SESSION["codigo_usuario"];
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
                

             }

           
             break;


             case 7:

             $lobjUsuario=new clsUsuario();

             $resultado = $lobjUsuario->modificarClaveA($correo,$clave);

             if($resultado){

                $_SESSION["clave"] = $clave;

                //Bitácora
              
           date_default_timezone_set("America/Caracas");
            $cod_usu1=$_SESSION["codigo_usuario"];
           $descripcion1="Cambio de Contraseña. El Usuario cambió su Clave.";
           $fecha1=date("Y/n/j");
            $hora1=date("h:i:s");
            
            $lobjBitacora->incluir($fecha1,$hora1,$descripcion1,$cod_usu1);
            //Fin Bitácora
               
                return 1;

             }else return 0;

                   
             break;

      }

     
      



?>


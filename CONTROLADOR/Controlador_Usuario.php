<?php


    header('Content-Type: text/html; charset=UTF-8');
    
    include_once("../MODELO/clsUsuario.php");
  
    /*--------------------------------------------*/
session_start();
    

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
              $_SESSION["tipo_usuario"] = $datos[5];
              $_SESSION["nombre_usuario"] = $datos[1]; 
              $_SESSION["apellido_usuario"] = $datos[2];
              $_SESSION["clave"] = $datos[4];
              $_SESSION["ruta"] = $datos[6];
              
              echo "<script language='javascript'>window.location.href='../VISTA/Usuario.php';</script>";


            }


             break;

             case 4:

              $_SESSION["email_usuario"] = ""; 
              $_SESSION["tipo_usuario"] = "";
              $_SESSION["nombre_usuario"] = ""; 
              $_SESSION["apellido_usuario"] = "";
               $_SESSION["clave"] = "";
              $_SESSION["ruta"] = "";
              
              echo "<script language='javascript'>window.location.href='../VISTA/Principal.php';</script>";

             break;

             case 6:

             $lobjUsuario=new clsUsuario();

             $resultado = $lobjUsuario->modificar($nombre,$apellido,$correo,$email);

             if($resultado){

                $_SESSION['email_usuario'] = $correo;
                $_SESSION["nombre_usuario"] = $nombre; 
                $_SESSION["apellido_usuario"] = $apellido;
                

             }

           
             break;


             case 7:

             $lobjUsuario=new clsUsuario();

             $resultado = $lobjUsuario->modificarClaveA($correo,$clave);

             if($resultado){

                $_SESSION["clave"] = $clave;
               
                return 1;

             }else return 0;

                   
             break;

      }

     
      



?>


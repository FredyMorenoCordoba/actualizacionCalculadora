<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] == 1){
        header('Location: MasterPage/mod_index.php');
    }
    if($_SESSION['rol'] == 2){
        header('Location: MasterPage/mod_auxiliar.php');
    }
    if($_SESSION['rol'] == 3){
        header('Location: MasterPage/mod_focogestor.php');
    }
    if($_SESSION['rol'] == 4){
        header('Location: MasterPage/mod_lector.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Inicio de Sesión | Pilas PIMA</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="js/fontawesome5.0.7.js"></script>
    <link rel="stylesheet" href="style/style-login.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand">
                    <img src="images/LogotipoPPM2.png" class="d-inline-block align-center logo_nav" alt="logo"></a>
            </div>
        </nav>
    </header>
    <main class="container m-auto">
        <section>
            <div class="col-12">
                <div class="container col-sm-8 my-3">
                    <div class="row">
                        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade col-md-7" data-ride="carousel" data-interval="10000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <p class="d-block w-100 justify-content-center">Espacio Informativo 1. -- Espacio Informativo 1.</p>
                                </div>
                                <div class="carousel-item">
                                    <p class="d-block w-100 justify-content-center">Espacio Informativo 2. -- Espacio Informativo 2.</p>
                                </div>
                                <div class="carousel-item">
                                    <p class="d-block w-100 justify-content-center">Espacio Informativo 3. -- Espacio Informativo 3.</p>
                                </div>
                            </div>
                        </div>
                        <div class="form col-md-5">
                            <form action="index.php" method="post">
                                <br>
                                <?php
                              
                                session_start();
                                require 'verificar.php';
                                
                                $usuarios=new DevuelveU();
                                
                                $array_usuarios=$usuarios->GetUsuarios();
                                if(isset($_POST['btnIngresar'])){
                                    if(empty($array_usuarios)){
                                        echo"<font color='red'><center>Usuario o Contraseña incorrectos.</center></font>";
                                    }
                                }
                                foreach ($array_usuarios as $elemento){
                                $cantidad=count($array_usuarios);
                                if($cantidad == 1){
                                    
                                    $_SESSION['user']=$elemento['doc'];
                                    $_SESSION['name']=$elemento['nombres'];
                                    $_SESSION['apellido']=$elemento['p_apellido'];
                                    $_SESSION['rol']=$elemento['id_rol'];
                                    $_SESSION['idUsuario']=$elemento['id_usuario'];
                                    
                                    if($elemento['estado']==0){
                                         echo"<font color='red'><center>El Usuario con el que intenta ingresar se encuentra Inactivo.</center></font>";
                                    }else{
                                      $rol = $elemento['id_rol'];
                                      if($rol == 1){
                                        header('Location: MasterPage/mod_index.php');
                                      }
                                      if($rol == 2){
                                        header('Location: MasterPage/mod_auxiliar.php');
                                      }
                                        if($rol == 4){
                                        header('Location: MasterPage/mod_lector.php');
                                      }
                                        if($rol == 3){
                                        $array_foco=$usuarios->GetFocogestor();
                                        foreach($array_foco as $item){
                                        $cant_foco=count($array_foco);
                                            if($cant_foco==1){
                                                $_SESSION['pila'] = $item['id_pila'];
                                            }
                                        }
                                        //cree otra validacion para cuando no se asignó aun una pila al focogestor.
                                        if(!isset($_SESSION['pila'])){
                                            echo"<font color='red'><center>Aun no se le asignó una pila por favor comuniquese con el área encargada.</center></font>";
                                            session_destroy();
                                        }else{
                                            header('Location: MasterPage/mod_focogestor.php');
                                        }
                                        }
                                    }
                                    }
                                }
                                ?>
                                <h3>Inicio de Sesión</h3>
                                <br />
                                <div class="form-group">
                                    <i class="fas fa-user"></i>
                                    <label for="user">Usuario</label>
                                    <input type="text" class="form-control" placeholder="Número de Identificación" id="txtUser" name="user">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-lock" aria-hidden="true"></i>
                                    <label for="pass">Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Ingrese su contraseña" id="txtPass" name="pass" pattern="[A-Za-z0-9]{8,25}" title="Ingrese solo Letras y Números. Tamaño mínimo: 8 - Máximo: 25">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Ingresar" id="btnIngresar" name="btnIngresar" class="btn btn-primary boton col-md-12">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="container-fluid">
        <div class="row">
            <div class="color1 col-12"></div>
            <div class="col-sm-12 col-md-6 pr-0">
                <p class="text-sm-center text-md-right pr-0">&copy; <?php echo date('Y'); ?>. Todos los derechos reservados</p>
            </div>
            <div class="col-md-6 d-none d-md-block">
               <!-- <img src="./images/Logotipo-ISA.png" alt="logo-ISA.png" class="text-md-left mr-2">-->
                <img src="./images/Logotipo-PCS.png" class="logoPCS" alt="logo-presencia.png" class="text-md-left">
            </div>
            <div class="color2 col-12"></div>
        </div>
    </footer>
    <script src="js/jQuery1.9.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch([
            "./images/IMG_8405.jpg",
            "./images/IMG_8250.jpg",
        ], {
            duration: 6000,
            transition: 'fade_in_out',
            fade: 1000,
            transitionDuration: 'slow',
            animateFirst: true,
            scale: 'cover',
            animateFirst: true
        });
        
        if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>

</html>
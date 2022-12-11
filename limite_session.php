<?php
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 300;//5min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if($vida_session > $inactivo)
        {
            //Removemos sesión.
            session_unset();
            //Destruimos sesión.
            session_destroy();              
            //Redirigimos pagina.
            echo'<script type="text/javascript">alert("Su sesion ha expirado por inactividad'; 
            echo', vuelva a iniciar sesión para continuar");window.location.href="../index.php";</script>';
            //header('Location: ../index.php');

            exit();
        }
} else {
    //Activamos sesion tiempo.
    $_SESSION['tiempo'] = time();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Informativo | Pilas COWA</title>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="js/fontawesome5.0.7.js"></script>
    <link rel="stylesheet" href="style/style-login.css">
</head>

<body class="info">
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <div class="col-6 col-md-6">
                    <div class="d-flex justify-content-start">
                        <a class="navbar-brand">
                            <img src="images/LogotipoPPM2.png" class="d-inline-block align-center logo_nav" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="d-flex justify-content-end">
                        <a href="index.php">
                            <input type="button" value="Iniciar sesión" class="btn btn-primary boton">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="container-fluid m-auto">
        <section class="mt-4 mb-3">
            <div class="col-12">
                <div class="container col-md-12">
                    <div class="row d-flex justify-content-center">
                        <div class="form col-md-9">
                            <br>
                            <form class="container">
                                <div class="form-row">
                                    <h5 class="col-md-12 table-dark text-center">Información de las Pilas</h5>
                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col-md-4 text-center">
                                        <?php
                                        session_start();
                                        require 'verificar.php';
                                        $consulta_pila1 = new DevuelveU();
                                        $sql = ("SELECT id_pila, nombre, estado FROM pilas WHERE codigo = 1");
                                        $pila1 = $consulta_pila1->consultar_pilas($sql);
                                        foreach ($pila1 as $item) {
                                            $id_pila1 = $item['id_pila'];
                                            $nombre_pila1 = $item['nombre'];
                                            $estado = $item['estado'];
                                        }
                                        $movimiento1 = new DevuelveU();
                                        $sql2 = ("SELECT cupo_disponible, cantidad_pila FROM movimientos_pila WHERE id_pila = $id_pila1");
                                        $array_movimiento1 = $movimiento1->consultar_pilas($sql2);
                                        foreach ($array_movimiento1 as $item1) {
                                            $cupo_disponible1 = $item1['cupo_disponible'];
                                            $cantidad_pila1 = $item1['cantidad_pila'];
                                        }
                                        $porcentaje1 = (100 * $cupo_disponible1) / $cantidad_pila1;
                                        //*******************************************************************************************//
                                        $consulta_familia1 = new DevuelveU();
                                        $sql3 = ("SELECT COUNT(n.id_pila) as 'numero_familias' FROM pilas p INNER JOIN nucleo n ON n.id_pila = p.id_pila WHERE p.codigo = 1");
                                        $array_familia_p1 = $consulta_familia1->consultar_pilas($sql3);
                                        foreach ($array_familia_p1 as $item2) {
                                            $numero_familia1 = $item2['numero_familias'];
                                        }
                                        //*******************************************************************************************//
                                        $capacidad_pila1 = $porcentaje1;
                                        if ($capacidad_pila1 >= 80) {
                                            echo "<i id=\"pilas_full\" class=\"fas fa-database fa-5x\"></i>";
                                        } elseif ($capacidad_pila1 < 80 && $capacidad_pila1 > 50) {
                                            echo "<i id=\"pilas_medium\" class=\"fas fa-database fa-5x\"></i>";
                                        } else {
                                            echo "<i id=\"pilas_low\" class=\"fas fa-database fa-5x\"></i>";
                                        }
                                        ?></a>
                                        <p class="mt-1 mb-0"><b><?php echo $nombre_pila1; ?></b></p>
                                        <p class="mb-0"><b>Estado Actual:</b>&nbsp;<?= $capacidad_pila1; ?>%</p>
                                        <p class="mb-0"><b>N° Familias Asignadas:</b>&nbsp;<?php echo $numero_familia1; ?></p>
                                        <p><b>Estado Pila:</b>&nbsp;<?php if ($estado == 1) {
                                                                        echo "<b style='color: #5DADE2;'>Activa</b>";
                                                                    } else {
                                                                        echo "<b style='color: #eb5e39;'>Inactiva</b>";
                                                                    }; ?></p>
                                    </div>
                                    <div class="form-group col-md-4 text-center">
                                        <?php
                                        $consulta_pila2 = new DevuelveU();
                                        $sql = ("SELECT id_pila, nombre, estado FROM pilas WHERE codigo = 2");
                                        $pila2 = $consulta_pila2->consultar_pilas($sql);
                                        foreach ($pila2 as $item) {
                                            $id_pila2 = $item['id_pila'];
                                            $nombre_pila2 = $item['nombre'];
                                            $estado = $item['estado'];
                                        }
                                        $movimiento2 = new DevuelveU();
                                        $sql2 = ("SELECT cupo_disponible, cantidad_pila FROM movimientos_pila WHERE id_pila = $id_pila2");
                                        $array_movimiento2 = $movimiento2->consultar_pilas($sql2);
                                        foreach ($array_movimiento2 as $item1) {
                                            $cupo_disponible2 = $item1['cupo_disponible'];
                                            $cantidad_pila2 = $item1['cantidad_pila'];
                                        }
                                        $porcentaje2 = (100 * $cupo_disponible2) / $cantidad_pila2;
                                        //*******************************************************************************************//
                                        $consulta_familia2 = new DevuelveU();
                                        $sql3 = ("SELECT COUNT(n.id_pila) as 'numero_familias' FROM pilas p INNER JOIN nucleo n ON n.id_pila = p.id_pila WHERE p.codigo = 2");
                                        $array_familia_p2 = $consulta_familia2->consultar_pilas($sql3);
                                        foreach ($array_familia_p2 as $item2) {
                                            $numero_familia2 = $item2['numero_familias'];
                                        }
                                        //*******************************************************************************************//
                                        $capacidad_pila2 = $porcentaje2;
                                        if ($capacidad_pila2 >= 80) {
                                            echo "<i id=\"pilas_full\" class=\"fas fa-database fa-5x\"></i>";
                                        } elseif ($capacidad_pila2 < 80 && $capacidad_pila2 > 50) {
                                            echo "<i id=\"pilas_medium\" class=\"fas fa-database fa-5x\"></i>";
                                        } else {
                                            echo "<i id=\"pilas_low\" class=\"fas fa-database fa-5x\"></i>";
                                        }
                                        ?></a>
                                        <p class="mt-1 mb-0"><b><?php echo $nombre_pila2; ?></b></p>
                                        <p class="mb-0"><b>Estado Actual:</b>&nbsp;<?= $capacidad_pila2; ?>%</p>
                                        <p class="mb-0"><b>N° Familias Asignadas:</b>&nbsp;<?php echo $numero_familia2; ?></p>
                                        <p><b>Estado Pila:</b>&nbsp;<?php if ($estado == 1) {
                                                                        echo "<b style='color: #5DADE2;'>Activa</b>";
                                                                    } else {
                                                                        echo "<b style='color: #eb5e39;'>Inactiva</b>";
                                                                    }; ?></p>
                                    </div>
                                    <div class="form-group col-md-4 text-center">
                                        <?php
                                        $consulta_pila3 = new DevuelveU();
                                        $sql = ("SELECT id_pila, nombre, estado FROM pilas WHERE codigo = 3");
                                        $pila3 = $consulta_pila3->consultar_pilas($sql);
                                        foreach ($pila3 as $item) {
                                            $id_pila3 = $item['id_pila'];
                                            $nombre_pila3 = $item['nombre'];
                                            $estado = $item['estado'];
                                        }
                                        $movimiento3 = new DevuelveU();
                                        $sql2 = ("SELECT cupo_disponible, cantidad_pila FROM movimientos_pila WHERE id_pila = $id_pila3");
                                        $array_movimiento3 = $movimiento3->consultar_pilas($sql2);
                                        foreach ($array_movimiento3 as $item1) {
                                            $cupo_disponible3 = $item1['cupo_disponible'];
                                            $cantidad_pila3 = $item1['cantidad_pila'];
                                        }
                                        $porcentaje3 = (100 * $cupo_disponible3) / $cantidad_pila3;
                                        //*******************************************************************************************//
                                        $consulta_familia3 = new DevuelveU();
                                        $sql3 = ("SELECT COUNT(n.id_pila) as 'numero_familias' FROM pilas p INNER JOIN nucleo n ON n.id_pila = p.id_pila WHERE p.codigo = 3");
                                        $array_familia_p3 = $consulta_familia3->consultar_pilas($sql3);
                                        foreach ($array_familia_p3 as $item2) {
                                            $numero_familia3 = $item2['numero_familias'];
                                        }
                                        //*******************************************************************************************//
                                        $capacidad_pila3 = $porcentaje3;
                                        if ($capacidad_pila3 >= 80) {
                                            echo "<i id=\"pilas_full\" class=\"fas fa-database fa-5x\"></i>";
                                        } elseif ($capacidad_pila3 < 80 && $capacidad_pila3 > 50) {
                                            echo "<i id=\"pilas_medium\" class=\"fas fa-database fa-5x\"></i>";
                                        } else {
                                            echo "<i id=\"pilas_low\" class=\"fas fa-database fa-5x\"></i>";
                                        }
                                        ?>
                                        </a>
                                        <p class="mt-1 mb-0"><b><?php echo $nombre_pila3; ?></b></p>
                                        <p class="mb-0"><b>Estado Actual:</b>&nbsp;<?= $capacidad_pila3; ?>%</p>
                                        <p class="mb-0"><b>N° Familias Asignadas:</b>&nbsp;<?php echo $numero_familia3; ?></p>
                                        <p><b>Estado Pila:</b>&nbsp;<?php if ($estado == 1) {
                                                                        echo "<b style='color: #5DADE2;'>Activa</b>";
                                                                    } else {
                                                                        echo "<b style='color: #eb5e39;'>Inactiva</b>";
                                                                    }; ?></p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4 text-center">
                                        <?php
                                        $consulta_pila4 = new DevuelveU();
                                        $sql = ("SELECT id_pila, nombre, estado FROM pilas WHERE codigo = 4");
                                        $pila4 = $consulta_pila4->consultar_pilas($sql);
                                        foreach ($pila4 as $item) {
                                            $id_pila4 = $item['id_pila'];
                                            $nombre_pila4 = $item['nombre'];
                                            $estado = $item['estado'];
                                        }
                                        $movimiento4 = new DevuelveU();
                                        $sql2 = ("SELECT cupo_disponible, cantidad_pila FROM movimientos_pila WHERE id_pila = $id_pila4");
                                        $array_movimiento4 = $movimiento4->consultar_pilas($sql2);
                                        foreach ($array_movimiento4 as $item1) {
                                            $cupo_disponible4 = $item1['cupo_disponible'];
                                            $cantidad_pila4 = $item1['cantidad_pila'];
                                        }
                                        $porcentaje4 = (100 * $cupo_disponible4) / $cantidad_pila4;
                                        //*******************************************************************************************//
                                        $consulta_familia4 = new DevuelveU();
                                        $sql3 = ("SELECT COUNT(n.id_pila) as 'numero_familias' FROM pilas p INNER JOIN nucleo n ON n.id_pila = p.id_pila WHERE p.codigo = 4");
                                        $array_familia_p4 = $consulta_familia4->consultar_pilas($sql3);
                                        foreach ($array_familia_p4 as $item2) {
                                            $numero_familia4 = $item2['numero_familias'];
                                        }
                                        //*******************************************************************************************//
                                        $capacidad_pila4 = $porcentaje4;
                                        if ($capacidad_pila4 >= 80) {
                                            echo "<i id=\"pilas_full\" class=\"fas fa-database fa-5x\"></i>";
                                        } elseif ($capacidad_pila4 < 80 && $capacidad_pila4 > 50) {
                                            echo "<i id=\"pilas_medium\" class=\"fas fa-database fa-5x\"></i>";
                                        } else {
                                            echo "<i id=\"pilas_low\" class=\"fas fa-database fa-5x\"></i>";
                                        }
                                        ?>
                                        </a>
                                        <p class="mt-1 mb-0"><b><?php echo $nombre_pila4; ?></b></p>
                                        <p class="mb-0"><b>Estado Actual:</b>&nbsp;<?= $capacidad_pila4; ?>%</p>
                                        <p class="mb-0"><b>N° Familias Asignadas:</b>&nbsp;<?php echo $numero_familia4; ?></p>
                                        <p><b>Estado Pila:</b>&nbsp;<?php if ($estado == 1) {
                                                                        echo "<b style='color: #5DADE2;'>Activa</b>";
                                                                    } else {
                                                                        echo "<b style='color: #eb5e39;'>Inactiva</b>";
                                                                    }; ?></p>
                                    </div>
                                    <div class="form-group col-md-4 text-center">
                                        <?php
                                        $consulta_pila5 = new DevuelveU();
                                        $sql = ("SELECT id_pila, nombre, estado FROM pilas WHERE codigo = 5");
                                        $pila5 = $consulta_pila5->consultar_pilas($sql);
                                        foreach ($pila5 as $item) {
                                            $id_pila5 = $item['id_pila'];
                                            $nombre_pila5 = $item['nombre'];
                                        }
                                        $movimiento5 = new DevuelveU();
                                        $sql2 = ("SELECT cupo_disponible, cantidad_pila FROM movimientos_pila WHERE id_pila = $id_pila5");
                                        $array_movimiento5 = $movimiento5->consultar_pilas($sql2);
                                        foreach ($array_movimiento5 as $item1) {
                                            $cupo_disponible5 = $item1['cupo_disponible'];
                                            $cantidad_pila5 = $item1['cantidad_pila'];
                                            $estado = $item['estado'];
                                        }
                                        $porcentaje5 = (100 * $cupo_disponible5) / $cantidad_pila5;
                                        //*******************************************************************************************//
                                        $consulta_familia5 = new DevuelveU();
                                        $sql3 = ("SELECT COUNT(n.id_pila) as 'numero_familias' FROM pilas p INNER JOIN nucleo n ON n.id_pila = p.id_pila WHERE p.codigo = 5");
                                        $array_familia_p5 = $consulta_familia5->consultar_pilas($sql3);
                                        foreach ($array_familia_p5 as $item2) {
                                            $numero_familia5 = $item2['numero_familias'];
                                        }
                                        //*******************************************************************************************//
                                        $capacidad_pila5 = $porcentaje5;
                                        if ($capacidad_pila5 >= 80) {
                                            echo "<i id=\"pilas_full\" class=\"fas fa-database fa-5x\"></i>";
                                        } elseif ($capacidad_pila5 < 80 && $capacidad_pila5 > 50) {
                                            echo "<i id=\"pilas_medium\" class=\"fas fa-database fa-5x\"></i>";
                                        } else {
                                            echo "<i id=\"pilas_low\" class=\"fas fa-database fa-5x\"></i>";
                                        }
                                        ?>
                                        </a>
                                        <p class="mt-1 mb-0"><b><?php echo $nombre_pila5; ?></b></p>
                                        <p class="mb-0"><b>Estado Actual:</b>&nbsp;<?= $capacidad_pila5; ?>%</p>
                                        <p class="mb-0"><b>N° Familias Asignadas:</b>&nbsp;<?php echo $numero_familia5; ?></p>
                                        <p><b>Estado Pila:</b>&nbsp;<?php if ($estado == 1) {
                                                                        echo "<b style='color: #5DADE2;'>Activa</b>";
                                                                    } else {
                                                                        echo "<b style='color: #eb5e39;'>Inactiva</b>";
                                                                    }; ?></p>
                                    </div>
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
                <p class="text-sm-center text-md-right pr-0">&copy; <?= date('Y');?>. Todos los derechos reservados</p>
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
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>
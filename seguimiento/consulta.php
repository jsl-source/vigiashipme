<?php
 require "controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="../assets/img/favicon.JPG" />
    <title>Consulta | Guía</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>
<body>
    <div class="container">
        <div class="card papel" style="margin-top: 80px;">
            <div class="card-header" style="font-size: 35px;">
                Guía número: <?php  echo $registro['NRO_GUIA']?>
            </div>
            <div class="card-body" style="height: 110%;">
                <div class="container">
                            <div id="loader"></div>
                                <div class="c1">
                                    <div class="row exe align-items-start justify-content-center text-center mt-2 mb-5">
                                        <div class="col-12 col-lg-4">
                                            <article style="color:#bababb; font-size:12pt;" >Nombre</article>
                                            <article class="datos" ><?php echo $registro['NOMBRE']?></article>
                                            <article style="color:#bababb;font-size:12pt;">Referencia</article>
                                            <article class="datos"><?php echo $registro['ORDEN']?></article>
                                            <article style="color:#bababb;font-size:12pt;">Dirección</article>
                                            <article class="datos"><?php echo $registro['DIRECCION']?></article>
                                            <article style="color:#bababb;font-size:12pt;">Piezas</article>
                                            <article class="datos"><?php echo $registro['NRO_CAJA']?></article>
                                        </div>
                                        <div class="col-6 mt-5 mt-lg-0 col-lg-4">
                                                <article style="color:#bababb;font-size:12pt;">Estado</article>
                                                <article class="datos"><?php echo $registro['ESTADO_RUTA']?></article>
                                        </div>
                                        <div class="col-6 mt-5 mt-lg-0 col-lg-4">
                                                <article style="color:#bababb;font-size:12pt;">Novedades</article>
                                                <article class="datos"><?php echo $registro['TMS_NOVEDADID']?></article>
                                                <!-- <img src="assets/img/modal/Novedad.svg" style="width: 30%; padding-top: 10px;" alt=""> -->
                                        </div>
                                    </div>
                                    <div class="row d-flex align-items-center justify-content-between text-center mt-5">
                                        <div class="col-12 col-lg-3">
                                            <img class="img-fluid pb-5" src="../assets/img/modal/Preparando_Envio.svg" alt="">
                                            <article style="color:#bababb">Preparando envío</article>
                                            <article id="nombre4" style="font-size: 9pt;"><?php echo $registro['FECHA_CARGA']?></article>
                                            <hr class="divider light my-4" id="divheader" />
                                        </div>
                                        <div class="col-12 col-lg-3 ">
                                            <img class="img-fluid pb-5" src="../assets/img/modal/Listo_para_envio.svg" alt="">
                                            <article style="color:#bababb">Listo para envío</article>
                                            <article id="nombre6" style="font-size: 9pt;"><?php echo $registro['FECHA_ASIGNA_RUTA']?></article>
                                            <hr class="divider light my-4" id="divheader" />
                                        </div>
                                        <div class="col-12 col-lg-3 ">
                                            <img class="img-fluid pb-5" src="../assets/img/modal/En_Reparto.svg" alt="">
                                            <article style="color:#bababb">En reparto</article>
                                            <article id="nombre8" style="font-size: 9pt;"><?php echo $registro['FECHA_ASIGNA_NODE']?></article>
                                            <hr class="divider light my-4" id="divheader" />
                                        </div>
                                        <div class="col-12 col-lg-3 ">
                                            <img class="img-fluid pb-4" src="../assets/img/modal/Entregado.svg" alt="">
                                            <article style="color:#bababb">Entregado</article>
                                            <article id="nombre10" style="font-size: 9pt;"><?php echo $registro['FECHA_ESTADO']?></article>
                                            <hr class="divider light my-4" id="divheader" />
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                <div class="card-footer text-muted" style="height: 80px">  
            </div> 
        </div>

    </div>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

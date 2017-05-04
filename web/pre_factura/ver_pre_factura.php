<!doctype html>

<?php
session_start();
include('../assets/php/db.php');
include('../assets/php/selects.php');
include('../assets/php/functions.php');
include('../assets/php/functions_array_prefacturas.php');
if ($_SESSION["login_done"] == true){
?>


<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <!--LIBRERIAS-->
    <!--LIBRERIA - GLOBAL-->
    <?php include('../assets/librerias/librerias_globales_pre_factura.html'); ?>

    <!--LIBRERIAS - BUSCADOR-->
    <?php include('../assets/librerias/librerias_pre_factura.html'); ?>
    <script type="text/javascript" src="../assets/js/functions.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <!--MENU Y LOGO-->
            <?php
            include('../assets/html/logo/logo_pre_factura.html');
            include('../assets/html/menu/menu_pre_factura.html');
            ?>
            <!--CAMBIAR COLOR DE LA ENTRADA DE MENU ACTIVA-->
            <script>$(function () {
                    document.getElementById("menu_pre_factura").className = "active";
                });</script>
            <style>
                @media (max-width: 600px) {
                    #menu_pre_factura {
                        background-color: #ef9448;
                        margin-left: 12%;
                        border-top-left-radius: 50px;
                        border-top-right-radius: 50px;
                        border-bottom-right-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    #menu_pre_factura1 {
                        /*margin-left: 12%;*/
                    }
                }
            </style>
        </div>
    </div>

    <div class="main-panel">
        <!--DATOS DE LA PREFACTURA-->
        <?php
        $nif_empresa = $_POST['select_box_nif_empresa'];
        $pre_factura = $_POST['select_box_pre_factura_cliente'];
        $pre_facrura_array = explode('-', $pre_factura);
        $id_pre_factura = $pre_facrura_array[0];
        ?>
        <nav class="navbar navbar-default navbar-fixed">
            <form method="POST" id="send_servicios" action="../pre_factura/seleccion_pre_factura.php">
                <input type="hidden" id="id_string" name="id_string" value="">
                <input style="display:none" type="submit" value="submit" id="buttonId"/>
            </form>
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--TITULO DE LA PÁGINA-->
                    <a class="navbar-brand">Ver pre-factura: <?php echo $pre_factura; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('../assets/html/menu/user_logout_pre_factura.html'); ?>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div>
                            <!--CABECERA PRE-FACTURA-->
                            <?php
                            $suma_precio_total = 0;
                            $cabecera_pre_factura = get_datos_cliente($nif_empresa);
                            // output data of each row
                            $row = $cabecera_pre_factura->fetch_assoc();

                            ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nº pre-factura</label>
                                        <input type="text" name="num_pre_factura"
                                               class="form-control" disabled
                                               value="<?php echo $pre_facrura_array[0] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre"
                                               class="form-control" disabled
                                               value="<?php echo $row['nombre_completo'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>NIF</label>
                                        <input type="text" name="NIF"
                                               class="form-control" disabled
                                               value="<?php echo $row['NIF_EMPRESA'] ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Dirección facturación</label>
                                        <input type="text" name="NIF"
                                               class="form-control" disabled
                                               value="<?php echo $row['calle_facturacion'] . " " . $row['numero_facturacion'] . ", " . $row['codigo_postal_facturacion'] . " " . $row['ciudad_facturacion'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="header">
                                        <h4 class="title"> Artículos </h4>
                                    </div>
                                    <div class="row">
                                        <table id="ver_pre_factura_articulos"
                                               class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Artículo</th>
                                                <th>Número de serie</th>
                                                <th>Precio</th>
                                                <th>Unidades</th>
                                                <th>Margen</th>
                                                <th style=" width: 150px ;">Precio total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $data = get_ver_pre_factura_articulos($id_pre_factura);

                                            if ($data->num_rows > 0) {
                                                $val=0;
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    $val++;
                                                    $nombre_articulo = get_nombre_articulo($row['ID_articulo']);
                                                    $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                    ?>
                                                    <tr content="<?php echo $row['ID_TRONCO_PRE_FACTURA_ARTICULO']?>" id="<?php echo $val?>">
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="nombre_articulo"><?php echo $nombre_articulo ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="numero_de_serie"><?php echo $row['numero_de_serie'] ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#" name="<?php echo $row['precio']?>"
                                                                                                class="precio precio_val_<?php echo $val?>"><?php echo $row['precio'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#" name="<?php echo $row['cantidad']?>"
                                                                                                class="cantidad precio cantidad_val_<?php echo $val?>"><?php echo $row['cantidad'] ?></a></label>
                                                        </td>
                                                        <?php
                                                        $margenes = get_margenes();
                                                        $margen_name=1;
                                                        ?>
                                                        <td>
                                                            <select name="select_box_margenes"
                                                                    class="form-control select_margen" value="test" required>
                                                                <option value="" disabled selected>Margen
                                                                    actual = <?php echo $row['margen'] ?>
                                                                </option>
                                                                <?php
                                                                if ($margenes->num_rows > 0) {

                                                                    // output data of each row
                                                                    while ($row_margenes = $margenes->fetch_assoc()) {
                                                                        ?>
                                                                        <option
                                                                             value="<?php echo $row_margenes['m_margen'] ?>"><?php echo $row_margenes['m_margen']; ?></option>
                                                                        <?php

                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>

                                                        <td><label style="margin-top: 11px;">
                                                                <a href="#" name="<?php echo $row['precio_total'] ?>" class="precio_total_<?php echo $val?> suma_precio">
                                                                    <?php echo $row['precio_total'] ?>
                                                                </a>
                                                            </label>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                echo "No hay nada pre-facturado";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="header">
                                        <h4 class="title"> Servicios </h4>
                                    </div>
                                    <div class="row">
                                        <table id="ver_pre_factura_servicios"
                                               class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Pack</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>Unidades</th>
                                                <th style=" width: 150px ;">Precio total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $data = get_ver_pre_factura_servicios($id_pre_factura);

                                            if ($data->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    $nombre_pack = get_nombre_servicio($row['ID_servicio']);
                                                    $descripcion_servicio = get_descripcion_servicio($row['ID_servicio']);
                                                    $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                    ?>
                                                    <tr>
                                                        <td><label style="margin-top: 11px;"><a
                                                                    href="#"><?php echo $nombre_pack ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a
                                                                    href="#"><?php echo $descripcion_servicio ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a
                                                                    href="#"><?php echo $row['precio'] ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a
                                                                    href="#"><?php echo $row['cantidad'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a
                                                                    href="#"><?php echo $row['precio_total'] ?></a></label>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                echo "No hay nada pre-facturado";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="header">
                                        <h4 class="title"> Minutaje </h4>
                                    </div>
                                    <div class="row">
                                        <table id="ver_pre_factura_minutajes"
                                               class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Servicio</th>
                                                <th>Precio/h del servicio</th>
                                                <th>Fecha</th>
                                                <th>Horas</th>
                                                <th style=" width: 150px ;">Precio total</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $data = get_ver_pre_factura_minutajes($id_pre_factura);

                                            if ($data->num_rows > 0) {
                                                $i = 0;
                                                // output data of each row
                                                while ($row = $data->fetch_assoc()) {
                                                    $nombre_servicio = get_nombre_servicio($row['ID_servicio']);
                                                    $suma_precio_total = $suma_precio_total + $row['precio_total'];

                                                    ?>
                                                    <tr>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="nombre_servicio"><?php echo $nombre_servicio ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="precio_h_servicio"><?php echo $row['precio_servicio'] ?> </a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="fecha"><?php echo $row['fecha'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="horas"><?php echo $row['horas'] ?></a></label>
                                                        </td>
                                                        <td><label style="margin-top: 11px;"><a href="#"
                                                                                                class="precio_total"><?php echo $row['precio_total'] ?></a></label>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                echo "No hay nada pre-facturado";
                                            }
                                            ?>


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-9">
                                            <div class="form-group">
                                                <label>Precio sin IVA</label>
                                                <input name="precio_sin_iva"
                                                       class="form-control precio_sin_iva" disabled
                                                       value="<?php echo $suma_precio_total ?>">
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-6">
                                            <div class="form-group">
                                                <label>IVA</label>
                                                <?php $data = select_all_iva(); ?>
                                                <select name="select_box_iva" class="form-control select_iva" required>
                                                    <option value="100"  disabled selected>Seleccionar IVA
                                                    </option>
                                                    <?php
                                                    if ($data->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $data->fetch_assoc()) {
                                                            ?>
                                                            <option
                                                                value="<?php echo $row['IVA'] ?>"><?php echo "$row[IVA]"; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <label>Precio con IVA</label>
                                                <input name="precio_con_iva"
                                                       class="form-control precio_con_iva_value" disabled
                                                       value="<?php echo $suma_precio_total ?>" required>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
    $( document ).ready(function() {




        $('.select_iva').on('change', function () {
            var iva = ( this.value );
            var precio_sin_iva = $('.precio_sin_iva').val();
            precio_sin_iva = precio_sin_iva;
            var iva_aplicado = ((iva / 100) * precio_sin_iva);
            iva_aplicado = iva_aplicado.toFixed(1);

            var float_iva_aplicado = (parseFloat(iva_aplicado));
            var float_pecio_sin_iva = (parseFloat(precio_sin_iva));
            var precio_con_iva = float_iva_aplicado + float_pecio_sin_iva;

            $('.precio_con_iva_value').val(precio_con_iva);
        })

        $('.select_margen').on('change', function () {
            var margen = ( this.value );
            var relacion = $(this).closest('tr').attr('id');
            var id_tronco_pre_factura_articulo =$(this).closest('tr').attr('content');
            var classe_precio= "precio_val_"+relacion;
            var classe_cantidad= "cantidad_val_"+relacion;
            var classe_precio_total= "precio_total_"+relacion;
            var val_precio = $('.'+classe_precio).attr('name');
            var val_cantidad = $('.'+classe_cantidad).attr('name');
            var val_precio_anterior = $('.'+classe_precio_total).attr('name');
            var precio_con_margen = margen*(val_precio * val_cantidad);
            $('.'+classe_precio_total).attr('name', precio_con_margen);
            $('.'+classe_precio_total).text(precio_con_margen);
            var diferencia_de_precio = precio_con_margen - val_precio_anterior;
            var precio_sin_iva = $('.precio_sin_iva').val();
            var precio_total_pre_factura_sin_iva = (parseFloat(precio_sin_iva)+(parseFloat(diferencia_de_precio)));
            $('.precio_sin_iva').val(precio_total_pre_factura_sin_iva);
            /*ACTUALIZAMOS EL PRECIO CON IVA*/
            var iva = $( ".select_iva option:selected" ).val();
            iva=parseFloat(iva)/100;
            var precio_total_pre_factura_con_iva = ((parseFloat(precio_sin_iva)+(parseFloat(diferencia_de_precio)))*iva);
            $('.precio_con_iva_value').val(precio_total_pre_factura_con_iva);


            $.ajax({
                type: 'post',
                url: '../assets/php/update_table/aplicar_margen.php',
                data: {
                    id_tronco_pre_factura_articulo: id_tronco_pre_factura_articulo,
                    precio_con_margen: precio_con_margen,
                    margen: margen,
                }
            });
        })
    });

</script>
</body>

</html>

<?php
} else {
    echo "false";
    header("location:../index.php");
}

?>
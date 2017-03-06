    <!doctype html>

<?php
session_start();
include('../assets/php/db.php');
include('../assets/php/selects.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!--LIBRERIAS-->
    <!--LIBRERIA - GLOBAL-->
    <?php include('../assets/librerias/librerias_globales_insert.html'); ?>
    <!--LIBRERIA - INSERT-->
    <?php include('../assets/librerias/librerias_insert.html'); ?>

</head>
<body>

<div class="wrapper">
    <div class="sidebar">
    	<div class="sidebar-wrapper">
            <!--MENU Y LOGO-->
            <?php
            include('../assets/html/logo/logo_insert.html');
            include('../assets/html/menu/menu_insert.html');
            ?>
            <!--CAMBIAR COLOR DE LA ENTRADA DE MENU ACTIVA-->
            <script>$(function () {
                    document.getElementById("menu_contactos").className = "active";
                });</script>

        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Insert contactos</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--USER & LOGOUT-->
                    <?php include('../assets/html/menu/user_logout_insert.html'); ?>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card2">

                        <div class="container">  
                          <form id="contact" action="../assets/php/post/post_contactos.php" method="post">
                            <h3>Insertar contacto</h3>
                            <h4>Rellene el formulario para añadir una nuevo contacto a una sede ya añadida.</h4>
                            
                            <fieldset>
                            &nbsp;Nombre del contacto:  <input placeholder="Nombre del contacto*" name="nombre" type="text"  required>
                            </fieldset>
                            <fieldset>&nbsp;Selecciona la sede:
                            <?php $data = select_all_sede(); ?>
                            <select name="select_box_id_sede" class="select_box">
                              <option value="" disabled selected>Selecciona la sede*</option>
                              <?php
                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                              ?>
                                    <option value="<?php echo $row['ID_SEDE']?>"><?php echo "$row[nombre_comercial] - $row[nombre]";?></option>
                            <?php   
                                    }       
                                }
                             ?>       
                            </select>
                            </fieldset>
                            <fieldset>
                            &nbsp;Cargo:  <input placeholder="Cargo*" name="cargo" type="text" required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Correo electrónico:  <input placeholder="Correo electrónico*" name="email" type="email"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Teléfono:  <input placeholder="Teléfono*" name="telefono" type="text"  required>
                            </fieldset>
                            <fieldset>
                            &nbsp;Extensión:  <input placeholder="Extensión" name="extension" type="text">
                            </fieldset>
                            <fieldset>&nbsp;Selecciona el país:
                            <?php $data = select_all_pais(); ?>
                            <select name="select_box_pais" class="select_box">
                              <option value="" disabled selected>Selecciona el país*</option>
                              <?php
                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                              ?>
                                    <option value="<?php echo $row['PAIS']?>"><?php echo $row['PAIS']?></option>
                            <?php   
                                    }       
                                }
                             ?>       
                            </select>
                            </fieldset>
                            <fieldset>
                              <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                            </fieldset>
                          </form>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>
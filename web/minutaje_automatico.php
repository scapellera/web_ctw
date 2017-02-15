    <!doctype html>

<?php
session_start();
include('assets/php/db.php');
include('assets/php/selects.php');
include('assets/php/functions.php');
if($_SESSION["login_done"]==true){
?>


<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>WEB TEST</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    


    <!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

     <!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <!--COLUMNAS QUE PUEDEN SER MODIFICADAS
    <script type="text/javascript" src="assets/js/editor.js"></script>-->


    <!-- DATATABLES TABLAS
    <script src="table/tables.js"></script> -->
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    
    <!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!--EDIT DATATABLE CODE TYPE TABLE-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    <!--TABLE_EDITOR.CSS-->
    <link href="assets/css/table_editor.css" rel="stylesheet"/>
    <link href="assets/css/table.css" rel="stylesheet"/>
    <!--BOTONES EXCEL-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!--BOTONES EXCEL CSS-->
    <link href="assets/css/table2.css" rel="stylesheet"/>
    <!--EDIT DATATABLE CODE
    <link href="assets/css/table4.css" rel="stylesheet"/>-->
    <!--INSERTS-->
    <link href="./assets/css/insert.css" rel="stylesheet" />
    <!--SEDES EN VARIABLES-->
    <!--<script src="assets/php/select_clientes_sedes.php"></script>-->
    <!--SEDES SELEC DEPENDIENTE-->
     <script src="assets/js/functions.js"></script>
     <!--micss-->
     <link href="assets/css/micss.css" rel="stylesheet"/>



</head>
<body>
<!--CREAMOS LAS VARIABLES EN JS QUE LUEGO UTILIZAREMOS PARA VINCULAR LAS SEDES CON LOS CLIENTES-->




<!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->
<div class="wrapper">
    <div class="sidebar">

    

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="./"><img src="assets/img/ctw_logo.gif" alt="CTW Logo"></a>
                 
            </div>

            <ul class="nav">
                <li>
                    <a href="./index.php">
                        <i class="pe-7s-note2"></i>
                        <p>INICIO</p>
                    </a>
                </li> 
                <li>
                    <a href="./buscador/buscador.php">
                        <i class="pe-7s-search"></i>
                        <p>Buscador</p>
                    </a>
                </li>
                <li>
                    <a href="./entrada_stock.php">
                        <i class="pe-7s-box2"></i>
                        <p>Entrada de stock</p>
                    </a>
                </li>
                <li>
                    <a href="./insert/insert.php">
                        <i class="pe-7s-pen"></i>
                        <p>Insert</p>
                    </a>
                </li>
                <li  class="active">
                    <a href="./minutaje.php">
                        <i class="pe-7s-pen"></i>
                        <p>Minutaje</p>
                    </a>
                </li>
               
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">Minutaje</a>
                </div>
                <div class="collapse navbar-collapse">
                    <!--ICONOS ESQUERRA-->
                    <!--<ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>-->

                    <ul class="nav navbar-nav navbar-right">
                        <!--Comentat account i dropdown-->
                        <!--<li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>-->
                        <li>
                            <a href="../perfil.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li>
                            <a href="../logout.php">Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="container">


                            <h3>Añadir Minutaje (Automatico)</h3>
                            <h4>Rellene el formulario para añadir la salida realizada</h4>

                            <p><button class="button_horas" onclick="myFunction1()">Presione este boton al entrar.</button></p>
                            <p><button class="button_horas" onclick="myFunction2()">Presione este boton al salir.</button></p>

                          <form id="contact" action="./assets/php/post/post_minutaje_automatico.php" method="post" name="f_cliente_sede">
                            
                            
                            <fieldset>
                            <?php $data = select_all_cliente(); ?>
                            <select name="select_box_nif_empresa" class="select_box" onchange="cambia_sede()">
                              <option value="" disabled selected>Selecciona el cliente*</option>
                              <?php
                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                              ?>
                                    <option value="<?php echo $row['NIF_EMPRESA']?>"><?php echo "$row[nombre_completo] - $row[NIF_EMPRESA]";?></option>
                            <?php   
                                    }       
                                }
                             ?>       
                            </select>
                            </fieldset>
                            <fieldset>
                                <select class="select_box" name="select_box_sede_cliente"> 
                                <option value="-">- 
                                </select>
                                                            
                            </fieldset>
                            <fieldset>
                            <?php $data = select_all_servicio(); ?>
                            <select name="select_box_servicio" class="select_box">
                              <option value="" disabled selected>Selecciona el servicio*</option>
                              <?php
                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                              ?>
                                    <option value="<?php echo $row['ID_SERVICIO']?>"><?php echo "$row[nombre] - $row[descripcion]";?></option>
                            <?php   
                                    }       
                                }
                             ?>       
                            </select>
                            </fieldset>
                            <fieldset>
                            <?php $data = select_all_usuario(); ?>
                            <select name="select_box_usuario" class="select_box">
                              <option value="" disabled selected>Selecciona el usuario que realiza el servicio*</option>
                              <?php
                                if ($data->num_rows > 0) {
                                    // output data of each row
                                    while($row = $data->fetch_assoc()) {
                              ?>
                                    <option value="<?php echo $row['ID_USUARIO']?>"><?php echo "$row[user] - $row[nombre]";?></option>
                            <?php   
                                    }       
                                }
                             ?>       
                            </select>
                            </fieldset>
                            <fieldset>
                            <p>Fecha: <a id="fecha_print"></a></p>
                            <input type="hidden" id="fecha" name="fecha" value="" required/>
                            </fieldset>
                            <fieldset>
                            <p>Hora de entrada: <a id="hora_entrada_print"></a></p>
                            <input type="hidden" id="hora_entrada" name="hora_entrada" value="" required/>

                            </fieldset>
                            <fieldset>
                            <p>Hora de salida: <a id="hora_salida_print"></a></p>
                            <input type="hidden" id="hora_salida" name="hora_salida" value="" required/>
                            </fieldset>
                            <fieldset>
                              Facturado&nbsp;&nbsp;&nbsp;<input name="facturado" type="checkbox">
                            </fieldset>
                            <fieldset>
                              <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                            </fieldset>

                          </form>

                          
                          


<script>
function myFunction1() {
    var d = new Date(); // for now
    //obtener hora actual
    var horas = d.getHours(); // => 9
    var minutos = d.getMinutes(); // =>  30
    d.getSeconds(); // => 51
    var tiempo = horas + ":" + minutos;
    //obtener fecha
    var day = d.getDate();
    var month = d.getMonth() +1;
    var year = d.getFullYear();
    var fecha = year + "-" + month + "-" + day;

    //passar hora de inicio
    document.getElementById("hora_entrada_print").innerHTML = tiempo;
    document.getElementById('hora_entrada').value = tiempo;

    //passar fecha
    document.getElementById("fecha_print").innerHTML = fecha;
    document.getElementById('fecha').value = fecha;

}

function myFunction2() {
   var d = new Date(); // for now
var horas = d.getHours(); // => 9
var minutos = d.getMinutes(); // =>  30
d.getSeconds(); // => 51
 var tiempo = horas + ":" + minutos;

    document.getElementById("hora_salida_print").innerHTML = tiempo;
    document.getElementById('hora_salida').value = tiempo;
}
</script>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <!--Menu footer-->
                        <!--<li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>-->
                    </ul>
                </nav>
                <!--Copyright-->
                <!--<p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>-->
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <!--<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>-->
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
    <!--POPUP DE COLOR BLAU SUPERIOR DRET-->
	<!--<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>-->



</html>




<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>
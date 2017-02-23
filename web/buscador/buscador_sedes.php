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

    <title>WEB TEST</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">-->

     <!-- ARCHIVOS NECESARIOS PARA DATATABLES-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <?php
    if($_SESSION["user_rol"]<=1){
        //<!--COLUMNAS QUE PUEDEN SER MODIFICADAS-->
    echo"<script type=\"text/javascript\" src=\"../assets/js/editor/edit_sede.js\"></script>";

    }
    
    ?>
    


    <!-- DATATABLES TABLAS -->
    <script src="../assets/table/tables.js"></script>
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="../assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    
    <!--<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!--EDIT DATATABLE CODE TYPE TABLE-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
    
    <!--TABLE_EDITOR.CSS-->
    <link href="../assets/css/table_editor.css" rel="stylesheet"/>
    <link href="../assets/css/table.css" rel="stylesheet"/>
    <!--BOTONES EXCEL-->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="http://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="http://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!--BOTONES EXCEL CSS-->
    <link href="../assets/css/table2.css" rel="stylesheet"/>
    <!--EDIT DATATABLE CODE-->
    <link href="../assets/css/table4.css" rel="stylesheet"/>
    <!--INSERTS-->
    <link href="../assets/css/insert.css" rel="stylesheet" />
    <!--NUESTRO CSS-->
    <link href="../assets/css/micss.css" rel="stylesheet" />
    <!--CSS DEL CHECKBOX ACTIVAR/DESACTIVAR-->
    <link href="../assets/css/csscheckbox.css" rel="stylesheet" />


</head>
<body>

<div class="wrapper">
    <div class="sidebar">

    

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../"><img src="../assets/img/ctw_logo.gif" alt="CTW Logo"></a>
                 
            </div>

            <ul class="nav">
                <li>
                    <a href="../index.php">
                        <i class="pe-7s-pen"></i>
                        <p>PÁGINA INICIO</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_clientes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li  class="active">
                    <a href="buscador_sedes.php">
                        <i class="pe-7s-pen"></i>
                        <p>Sedes</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_contactos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Contactos</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_mayoristas.php">
                        <i class="pe-7s-pen"></i>
                        <p>Mayoristas</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_usuarios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_servicios.php">
                        <i class="pe-7s-pen"></i>
                        <p>Servicios</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_articulos.php">
                        <i class="pe-7s-pen"></i>
                        <p>Artículos</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_stock.php">
                        <i class="pe-7s-pen"></i>
                        <p>Stock</p>
                    </a>
                </li>
                <li>
                    <a href="buscador_minutaje.php">
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
                    <a class="navbar-brand"></a>
                </div>
                <div class="collapse navbar-collapse">
                    
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <a href="../user.php"> <?php echo $_SESSION["username"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
                        </li>
                        <li>
                            <a href="../../logout.php">Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div >
                        <div >

                            <script>
                            function preguntar(id_sede){
                                if(id_sede>0){
                                   eliminar=confirm("¿Deseas eliminar este sede?");
                                   if (eliminar)
                                   //Redireccionamos si das a aceptar
                                     window.location.href="../assets/php/delete/delete_sede.php?id="+id_sede; //página web a la que te redirecciona si confirmas la eliminación
                                    else
                                  //Y aquí pon cualquier cosa que quieras que salga si le diste al boton de cancelar
                                    alert('No se ha podido eliminar el sede...')
                                }else{
                                    alert ('Error, solo se puede eliminar en local siendo el admin');
                                }
                            }
                            function result(activo){
                                if (activo==0){//imprime un input activado o desactivado
                                    document.write("<td><label style='margin-top: 10px; margin-left:12px;' class='switcha'><a>&nbsp;0</a><input  type='checkbox' disabled ><div  class='slider rounda'></div></label></td>");
                                }else{
                                    document.write("<td><label style='margin-top: 10px; margin-left:12px;' class='switcha'><a>&nbsp;1</a><input  type='checkbox' checked disabled ><div  class='slider rounda'></div></label></td>");
                                }
                            }
                            </script>

                                <table id="buscador_sede" class="table table-striped table-bordered">
                                    <thead>
                                    
                                    
                                        <tr>
                                            <th style="background-color: #39AF33; width: 3px;">Activos</th>
                                            <!--<th style="background-color: #F26842; width: 3px;">Borrar</th>-->
                                            <th>Cliente</th>
                                            <th>Nombre</th>
                                            <th>Ubicación</th>
                                            <th>Ciudad</th>
                                            <th>Código postal</th>
                                            <th>Calle</th>
                                            <th>Número</th>
                                            <th>Telefono</th>
                                            <th>País</th>
                                            <th>Prefijo</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            
                                            $data = select_all_sede();

                                            if ($data->num_rows > 0) {
                                                 // output data of each row
                                                 while($row = $data->fetch_assoc()) {
                                                    $pk = $row['ID_SEDE'];
                                                    $pais = $row['pais'];

                                        ?>
                                                    <!--<script>var x = <?php echo $pk ?></script>-->
                                                    <tr>
                                                        <script>result(<?php echo $row['activo']?>)</script> 
                                                        <!--<td><button style="margin-top: 3px; margin-left:14px;" class="btn btn-danger" onclick="preguntar(<?php   

                                                                $nombre_fichero = '../assets/php/delete/delete_sede.php';

                                                                if (file_exists($nombre_fichero)) {
                                                                    echo $row['ID_SEDE'];
                                                                    
                                                                } else {
                                                                    echo 0;
                                                                }


                                                        ?>)"><i class="glyphicon glyphicon-trash"></i></button></td> -->
                                                        <td><label style="margin-top: 11px;">
                                                        <a data-pk=<?php echo "\"$pk\""; ?>>
                                                        <?php 
                                                        $nif_cliente = $row['NIF_cliente'];
                                                        $nombreCliente = select_nombre_cliente($nif_cliente);
                                                        echo $nombreCliente;
                                                        ?> 
                                                        </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="nombre" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['nombre']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="ubicacion" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ubicacion']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="ciudad" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['ciudad']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="codigo_postal" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['codigo_postal']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="calle" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['calle']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="numero" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['numero']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="telefono" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['telefono']?> </a></label></td>
                                                        <td><label style="margin-top: 11px;"><a href="#" class="pais" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['pais']?> </a></label></td>
                                                        <!--
                                                        <td>

                                                        
                                                            <select name="hola" id="mySelect" onchange="myFunction('<?php echo $pais; ?>')">
                                                              <option value="<?php echo $row['pais']?>" disabled selected data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['pais']?></option>
                                                                <?php
                                                                $data2 = select_all_pais();
                                                                if ($data2->num_rows > 0) {
                                                                    // output data of each row
                                                                    while($row2 = $data2->fetch_assoc()) {
                                                                ?>

                                                                    <option value="<?php echo $row2['PAIS']?>"><?php echo $row2['PAIS']?></option>
                                                                <?php   
                                                                    }       
                                                                }
                                                                ?> 
                                                             </select>
                                                             
                                                         </td>
                                                         -->
                                                        <td><label style="margin-top: 11px;"><a href="#" class="prefijo" data-pk=<?php echo "\"$pk\""; ?>><?php echo $row['prefijo']?> </a></td>
                                                             
                                                    </tr>



                                        <?php         
                                                }
                                            } else {
                                                 echo "0 results";
                                            }

                                            
                                        ?>
                                        
                                     
                                    </tbody>
                                </table>


                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <!--<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>-->
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="../assets/js/bootstrap-checkbox-radio-switch.js"></script>

    <!--  Charts Plugin -->
    <script src="../assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="../assets/js/demo.js"></script>
    

</html>

<?php 
}else{
    echo "false";
    header("location:../index.php");
}

?>
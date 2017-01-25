<?php
function select_all_pais(){
    $conn = connect();
    $sql = "SELECT * 
    FROM PAIS
    ORDER BY PAIS asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_prefijo_pais($pais){
    $conn = connect();
    $sql = "SELECT prefijo FROM PAIS WHERE PAIS = '".$pais."'";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();
	$prefijo = $row['prefijo'];
    close($conn);
    return $prefijo;
  }

function select_all_cliente(){
    $conn = connect();
    $sql = "SELECT * 
    FROM CLIENTE
    ORDER BY nombre_completo asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_sede(){
    $conn = connect();
    $sql = "SELECT * 
    FROM SEDE S, CLIENTE C
    WHERE S.NIF_cliente = C.NIF_EMPRESA
    ORDER BY C.nombre_comercial, S.nombre asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

function select_all_mayorista(){
    $conn = connect();
    $sql = "SELECT * 
    FROM MAYORISTA
    ORDER BY nombre_empresa asc";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }
function select_all_stock(){
    $conn = connect();
    $sql = "SELECT * 
    FROM STOCK";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

  function select_sede_cliente($nif_cliente){
     $conn = connect();
    $sql = "SELECT * 
    FROM SEDE S
    WHERE S.NIF_cliente = '".$nif_cliente."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

  function select_nombre_sede($id_sede){
    $conn = connect();
    $sql = "SELECT nombre
    FROM SEDE
    WHERE ID_SEDE = '".$id_sede."'";
    $data = $conn->query($sql);
    close($conn);
    return $data;
  }

?>
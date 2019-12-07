<?php

   	$id = $_GET['id'];

    require 'database/conexao.php';

    $excluirempresa = "DELETE FROM `empresa` WHERE id=$id;";

    mysqli_query($conexao,$excluirempresa) or die("Erro ao tentar excluir registro");

    
    $url = 'listarempresas.php';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

?>
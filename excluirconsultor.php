<?php

   	$id = $_GET['id'];

    require 'database/conexao.php';

    $excluirconsultor = "DELETE FROM `consultor` WHERE id=$id;";

    mysqli_query($conexao,$excluirconsultor) or die("Erro ao tentar excluir registro");

    
    $url = 'listarconsultores.php';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

?>
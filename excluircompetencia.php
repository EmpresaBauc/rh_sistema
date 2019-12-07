<?php

   	$id = $_GET['id'];

    require 'database/conexao.php';

    $excluircompetencia= "DELETE FROM `relac_proj_emp` WHERE id=$id;";

    mysqli_query($conexao,$excluircompetencia) or die("Erro ao tentar excluir registro");

    
    $url = 'listarcompetencia.php';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

?>
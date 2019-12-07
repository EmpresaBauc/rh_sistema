<?php

   	$id = $_GET['id'];

    require 'database/conexao.php';

    $excluirprojeto = "DELETE FROM `projeto` WHERE id=$id;";

    mysqli_query($conexao,$excluirprojeto) or die("Erro ao tentar excluir registro");

    
    $url = 'listarprojetos.php';
    echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

?>
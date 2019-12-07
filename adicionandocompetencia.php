<?php
	
	$empresa = $_POST['empresa'];
	$projeto = $_POST['projeto'];


	require 'database/conexao.php';

	
	$query = '';
	$query = "INSERT INTO `relac_proj_emp` (`id`, `projeto_id`, `empresa_id`) VALUES (NULL, '$projeto', '$empresa');";

	mysqli_query($conexao,$query) or die("Erro ao tentar cadastrar registro");

	
    $url = 'listarcompetencia.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
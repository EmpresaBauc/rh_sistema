<?php
	$nome = $_POST['nome'];
	$caracteristicas = $_POST['caracteristicas'];
	$cronograma = $_POST['cronograma'];
	$telefone = $_POST['telefone'];
	$escritorio = $_POST['escritorio'];
	$gerente = $_POST['gerente'];

	require 'database/conexao.php';


	
	$query = '';
	$query = "INSERT INTO `projeto` (`id`,`nome`,`caracteristicas`, `cronograma`, `telefone`, `escritorio_id`, `gerente_id`) VALUES (NULL, '$nome','$caracteristicas', '$cronograma', '$telefone', '$escritorio', '$gerente');";

	mysqli_query($conexao,$query) or die("Erro ao tentar cadastrar registro");

	
    $url = 'listarprojetos.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
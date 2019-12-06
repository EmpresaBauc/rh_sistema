<?php
	$tipo = $_POST['tipo'];
	$produto_avanco = $_POST['produto_avanco'];
	$topico = $_POST['topico'];
	$sub_topico = $_POST['sub_topico'];
	$dossie = $_POST['dossie'];
	$sub_dossie = $_POST['sub_dossie'];
	$nome_doc = $_POST['nome_doc'];
	$data = $_POST['data'];
	$tags = $_POST['tags'];
	$redator = $_POST['redator'];
	$observacoes = $_POST['observacoes'];
	$link = $_POST['link'];
	$status = $_POST['status'];

	require 'database/conexao.php';


	$sql = "INSERT INTO `av_documentos` VALUES (NULL, '$tipo', '$produto_avanco', '$topico', '$sub_topico','$dossie','$sub_dossie','$nome_doc','$data','$tags','$redator','$observacoes','$link','$status');"; 
		
	mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");

    $url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
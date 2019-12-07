<?php
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$cnpj = $_POST['cnpj'];

	require 'database/conexao.php';

	if($id == null || $id == ""){
		echo "Id da empresa vazio";
	}

	if($nome == null || $nome == ""){
		echo "Nome da empresa vazio";
	}

	if($endereco == null || $endereco == ""){
		echo "Endereço da empresa vazio";
	}

	if($cnpj == null || $cnpj == ""){
		echo "CNPJ da empresa vazio";
	}
	
	$query = '';
	$query = "UPDATE `empresa` SET nome='$nome', endereco = '$endereco', cnpj = '$cnpj' WHERE id = '$id';";

	mysqli_query($conexao,$query) or die("Erro ao tentar cadastrar registro");


    $url = 'listarempresas.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
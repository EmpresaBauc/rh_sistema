<?php
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$cnpj = $_POST['cnpj'];

	require 'database/conexao.php';

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
	$query = "INSERT INTO `empresa` (`id`, `nome`, `endereco`, `cnpj`) VALUES (NULL, '$nome', '$endereco', '$cnpj');";

	mysqli_query($conexao,$query) or die("Erro ao tentar cadastrar registro");

	
    $url = 'index.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
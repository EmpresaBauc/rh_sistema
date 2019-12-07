<?php
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];

	require 'database/conexao.php';

	if($nome == null || $nome == ""){
		echo "Nome do consultor vazio";
	}

	if($telefone == null || $telefone == ""){
		echo "Telefone do consultor vazio";
	}

	if($email == null || $email == ""){
		echo "Email do consultor vazio";
	}
	
	$query = '';
	$query = "INSERT INTO `consultor` (`id`, `nome`, `telefone`, `email`) VALUES (NULL, '$nome', '$telefone', '$email');";

	mysqli_query($conexao,$query) or die("Erro ao tentar cadastrar registro");

	
    $url = 'listarconsultores.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
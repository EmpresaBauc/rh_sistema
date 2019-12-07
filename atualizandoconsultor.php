<?php
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];

	require 'database/conexao.php';

	if($id == null || $id == ""){
		echo "Id do consultor vazio";
	}

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
	$query = "UPDATE `consultor` SET nome='$nome', telefone = '$telefone', email = '$email' WHERE id = '$id';";

	mysqli_query($conexao,$query) or die("Erro ao tentar atualizar registro");


    $url = 'listarconsultores.php';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
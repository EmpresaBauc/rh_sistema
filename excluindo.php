<?php

$id = $_GET['id'];


require 'database/conexao.php';

$consulta_nome_doc = mysqli_query($conexao,"select Nome_Doc, Redator from av_documentos where Id=$id") or die("Erro ao tentar cadastrar registro");

while ($dados = mysqli_fetch_array($consulta_nome_doc)) 
{
  $nome_doc = $dados["Nome_Doc"];
  $redator = $dados["Redator"];
}

if(($redator == "Afonso Soares")||
	($redator ==	"André Gonzaga")||
	($redator ==	"Carlos Magno")||
    ($redator ==	"Claudio Nani")||
    ($redator ==	"Denilson Castro")||
    ($redator ==	"Douglas Meneses")||
    ($redator ==	"Elisangela Meneses")||
    ($redator ==	"Fernando Junqueira")||
    ($redator ==	"Isac Ramos")||
    ($redator ==	"Isamara Mello")||
    ($redator ==	"Johann Albino")||
    ($redator ==	"Juliana Souza")||
    ($redator ==	"Julio César")||
    ($redator ==	"Kennedy Alves")||
    ($redator ==	"Lara Félix")||
    ($redator ==	"Luiz Paulo")||
    ($redator ==	"Matheus Lima")||
    ($redator ==	"Michael Avila")||
    ($redator ==	"Núbia Lima")||
    ($redator ==	"Priscilla Barbara")||
    ($redator ==	"Raquel Oliveira")||
    ($redator ==	"Túlio Gonzaga")||
    ($redator ==	"Victor Souza")||
    ($redator ==	"Victor Winter")||
    ($redator ==	"Wellington Cassio")||
    ($redator ==	"Vitor Henrique")||
    ($redator ==	"Wilker Kunert"))
{

	$consulta_id_avancao = mysqli_query($conexao,"select id from av_base_de_conhecimento_avancao where conteudo_postado_base_de_conhecimento='$nome_doc'") or die("Erro ao tentar cadastrar registro");

	$consulta_id_moedas = mysqli_query($conexao,"select id from av_avancoins_acoes_esporadicas_logs
 where observacao='$nome_doc'") or die("Erro ao tentar cadastrar registro");


	while ($dados2 = mysqli_fetch_array($consulta_id_avancao)) 
	{
	  $id_avancao = $dados2["id"];
	}


	while ($dados3 = mysqli_fetch_array($consulta_id_moedas)) 
	{
	  $id_moedas = $dados3["id"];
	}


	$excluidocumentos = "DELETE FROM `av_documentos` WHERE id=$id;";
	$excluiavancao = "DELETE FROM `av_base_de_conhecimento_avancao` WHERE id=$id_avancao;";
	$excluimoedas = "DELETE FROM `av_avancoins_acoes_esporadicas_logs` WHERE id=$id_moedas;";

	mysqli_query($conexao,$excluiavancao) or die("Erro ao tentar cadastrar registro linha 55");
	mysqli_query($conexao,$excluidocumentos) or die("Erro ao tentar cadastrar registro");
	mysqli_query($conexao,$excluimoedas) or die("Erro ao tentar cadastrar registro");

}else
{
		$excluidocumentos = "DELETE FROM `av_documentos` WHERE id=$id;";
		mysqli_query($conexao,$excluidocumentos) or die("Erro ao tentar cadastrar registro");

}



$url = 'index.php';
echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
?>
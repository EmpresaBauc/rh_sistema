<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Sistema de RH</title>

  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-3.3.7.min.css">
  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="libs/normalize/css/normalize-7.0.0.css">
</head>
<body>
  
<?php 
	require 'menu.php';
	require 'database/conexao.php';
?>

   <div class="container">
	 <div class="row">
	 	<div class="col-md-6 col-md-offset-3">
	 		<h1 class="text-center">Adicionar Competência</h1>
			<form action="adicionandocompetencia.php" method="post">
			   <div class="form-group">
				  <label class="control-label" for="empresa">Empresa:</label>
				 	<select class="form-control"  name="empresa" id="empresa">
  						<?php
  							$busca = "SELECT * FROM empresa";
  							$todos = mysqli_query($conexao,"$busca")or die("Erro");
        					$cont = mysqli_num_rows($todos);
        					echo "<option value=\"0\">Selecione</option>";
        					while ($dados = mysqli_fetch_array($todos)) 
        					{
        						echo "<option value=".$dados["id"].">".$dados["nome"]."</option>";
        					}
  						?>
					</select>
				</div>  
				<div class="form-group">
				  <label class="control-label" for="projeto">Projeto:</label>
				 	<select class="form-control"  name="projeto" id="projeto">
  						<?php
  							$busca = "SELECT * FROM projeto";
  							$todos = mysqli_query($conexao,"$busca")or die("Erro");
        					$cont = mysqli_num_rows($todos);
        					echo "<option value=\"0\">Selecione</option>";
        					while ($dados = mysqli_fetch_array($todos)) 
        					{
        						echo "<option value=".$dados["id"].">".$dados["nome"]."</option>";
        					}
  						?>
					</select>
				</div>  
			    <input class="btn btn-default" type="submit" name="enviar" value="Enviar">
			</form>
      <br>
		</div>
	 </div>
</div>

<script src="libs/jquery/js/jquery-3.2.1.min.js"></script>
<script src="libs/bootstrap/js/bootstrap-3.3.7.min.js"></script>
<script src="libs/bootstrap/js/npm.js"></script>

</body>
</html>
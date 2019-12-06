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
  
<?php require 'menu.php' ?>

   <div class="container">
	 <div class="row">
	 	<div class="col-md-6 col-md-offset-3">
	 		<h1 class="text-center">Adicionar Nova Empresa</h1>
			<form action="adicionandoempresa.php" method="post">
			   	<div class="form-group">
			        <label class="control-label" for="nome">Nome:</label>
			        <input class="form-control" type="text" id="nome" name="nome" />
			    </div>
			    <div class="form-group">
			        <label class="control-label" for="endereco">Endereço:</label>
			        <input class="form-control" type="text" id="endereco" name="endereco" />
			    </div>
          <div class="form-group">
              <label class="control-label" for="cnpj">CNPJ:</label>
              <input class="form-control" type="text" id="cnpj" name="cnpj" />
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
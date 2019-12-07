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
  <h1 class= "text-center">Painel de Visualização dos Consultores</h1>
  <div id="editar"></div>
  <div class="row">
    <?php
        require 'database/conexao.php';

        error_reporting(1);
        $busca = "SELECT * FROM consultor";

        $total_reg = "10"; // número de registros por página

        $pagina=$_GET['pagina'];
        if (!$pagina) 
        {
          $pc = "1";
        }else 
        {
          $pc = $pagina;
        }


        $inicio = $pc - 1;
        $inicio = $inicio * $total_reg;
        $limite = mysqli_query($conexao,"$busca LIMIT $inicio,$total_reg")or die("Erro");
        $todos = mysqli_query($conexao,"$busca")or die("Erro");
        $cont = mysqli_num_rows($todos);
        $tp= intdiv($cont,$limite) + 1; 
        
        // vamos criar a visualização
        echo "<div class='panel panel-default'>
              <div class='panel-heading'>Consultores</div>
               <table class='table'>
               <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th></th>
                <th></th>
              </tr>";
        while ($dados = mysqli_fetch_array($limite)) 
        {
          $id = $dados["id"];
          $nome = $dados["nome"];
          $telefone = $dados["telefone"];
          $email = $dados["email"];
        
          echo " <tr>
                  <th>$nome</th>
                  <th>$telefone</th>
                  <th>$email</th>
                  <th><a class=\"btn btn-info\" href=\"editarconsultor.php?id=$id&nome=$nome&telefone=$telefone&email=$email\" >Editar</a></th>
                  <th><a class=\"btn btn-danger\" href=\"excluirconsultor.php?id=$id\">Excluir</a></th>
                </tr>
               ";
        }
        
        echo " </table>
        </div>";
         
        // agora vamos criar os botões "Anterior e próximo"
        $anterior = $pc -1;
        $proximo = $pc +1;
        echo "<nav aria-label='Page navigation'><ul class='pagination'>";
                  if ($pc>1) {
                    echo  
                    "<li>
                      <a href='?pagina=$anterior' aria-label='Previous'>
                        <span aria-hidden='true'>&laquo;</span> Anterior
                      </a>
                    </li>";
                  }
                  echo'&nbsp';
                  if ($pc<=$tp) {
                    echo 
                    "<li>
                      <a href='?pagina=$proximo' aria-label='Next'>
                        Proximo <span aria-hidden='true'>&raquo;</span>
                      </a>
                    </li>";
                  }
        echo"   </ul>
            </nav>";
      ?>
  </div>
</div>

<script src="libs/jquery/js/jquery-3.2.1.min.js"></script>
<script src="libs/bootstrap/js/bootstrap-3.3.7.min.js"></script>
<script src="libs/bootstrap/js/npm.js"></script>

</body>
</html>
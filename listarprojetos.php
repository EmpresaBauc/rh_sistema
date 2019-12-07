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
  <h1 class= "text-center">Painel de Visualização dos Projetos</h1>
  <div id="editar"></div>
  <div class="row">
    <?php
        require 'database/conexao.php';

        error_reporting(1);
        $busca = "SELECT * FROM projeto";

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
              <div class='panel-heading'>Projetos</div>
               <table class='table'>
               <tr>
                <th>Nome</th>
                <th>Caracteristicas</th>
                <th>Cronograma</th>
                <th>Telefone</th>
                <th>Escritorio</th>
                <th>Gerente</th>
                <th></th>
                <th></th>
              </tr>";
        while ($dados = mysqli_fetch_array($limite)) 
        {
          $id = $dados["id"];
          $nome = $dados["nome"];
          $caracteristicas = $dados["caracteristicas"];
          $cronograma = $dados["cronograma"];
          $telefone = $dados["telefone"];
          $nome_esc = "SELECT nome FROM escritorio WHERE id=".$dados["escritorio_id"];
          $nome_dados = mysqli_query($conexao,"$nome_esc")or die("Erro");
          $escritorio = mysqli_fetch_array($nome_dados)[0];
          $escritorio_id = $dados["escritorio_id"];
          $nome_gerente = "SELECT nome FROM gerente WHERE id=".$dados["gerente_id"];
          $gerente_dados = mysqli_query($conexao,"$nome_gerente")or die("Erro");
          $gerente = mysqli_fetch_array($gerente_dados)[0];  
          $gerente_id = $dados["gerente_id"];      
          echo " <tr>
                  <th>$nome</th>
                  <th>$caracteristicas</th>
                  <th>$cronograma</th>
                  <th>$telefone</th>
                  <th>$escritorio</th>
                  <th>$gerente</th>
                  <th><a class=\"btn btn-info\" href=\"editarprojeto.php?id=$id&nome=$nome&endereco=$endereco&cnpj=$cnpj\" >Editar</a></th>
                  <th><a class=\"btn btn-danger\" href=\"excluirprojeto.php?id=$id\">Excluir</a></th>
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
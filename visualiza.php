<?php require 'database/conexao.php' ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Gestor da Base de Conhecimento</title>

  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap_3.3.7.min.css">
  <link rel="stylesheet" href="libs/normalize/css/normalize_7.0.0.css">
  <link rel="stylesheet" href="libs/main.css">
</head>
<body>
  
<?php require 'menu.php' ?>

<div class="container"> 
  <h1 class= "text-center">Painel de Visualização dos Documentos</h1>
  <div class="row">
    <?php
        error_reporting(1);
        $busca = "SELECT * FROM av_documentos";

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
              <div class='panel-heading'>Documentos</div>
               <table class='table'>
               <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Documento</th>
                <th>Data</th>
                <th>Redator</th>
                <th>Observação</th>
                <th>Link</th>
                <th>Status</th>
              </tr>";
        while ($dados = mysqli_fetch_array($limite)) 
        {
          $id = $dados["Id"];
          $tipo = $dados["Tipo"];
          $nome_doc = $dados["Nome_Doc"];
          $data = $dados["Data"];
          $tags = $dados["Tags"];
          $redator = $dados["Redator"];
          $observacao = $dados["Observacao"];
          $link = $dados["Link"];
          $status = $dados["Status"];

          if($status==1)
          {
            $status = 'Concluído'; 
          }
          else if ($status==0)
          {
            $status = 'Em execução';
          }
          else if ($status==-1)
          {
            $status = 'Pendente';
          }
          else
          {
            $status = 'Sem status!!';
          }

          echo " <tr>
                  <th>$id</th>
                  <th>$tipo</th>
                  <th>$nome_doc</th>
                  <th>$data</th>
                  <th>$redator</th>
                  <th>$observacao</th>
                  <th><a class='btn btn-xs btn-info' href='$link'>Abrir</a></th>
                  <th>$status</th>
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
 
<script src="libs/jquery/js/jquery_3.2.1.min.js"></script>
<script src="libs/bootstrap/js/bootstrap_3.3.7.min.js"></script>

</body>
</html>

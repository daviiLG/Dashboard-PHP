<?php
// inclui a barra de pesquisa
include('nav-bar.php');

// requer as informações de livro.php
require_once ('../src/model/livro.php');
// se não há uma sessao, ela iniciará
if(!$_SESSION){
  session_start();
}
// livro é uma variavel pela classe livro
$livro = new Livro();
// livros será livro, mas com a função da listagem de livro
$livros = $livro->listBook();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<!-- criação de uma tabela com os dados dos livros cadastrados no banco de dados -->
<div class="container mt-4">
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h4>Lista de Livros <a href="cadastra-livros.php" class="btn btn-primary float-end">Cadastrar Livro</a></h4>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Autor</th>
              <th>Editora</th>
              <th>Ano</th>
              <th>Categoria</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          // se a quantidade de livros cadastrados for maior que zero...
                  if(mysqli_num_rows($livros) > 0){
                  //  para cada livro cadastrado, criará uma tabela com suas informações -->
                    foreach($livros as $livro){
                
                ?>
                <tr>
                  <td><?= $livro['id'] ?></td>
                  <td><?= $livro['nome'] ?></td>
                  <td><?= $livro['autor'] ?></td>
                  <td><?= $livro['editora'] ?></td>
                  <td><?= $livro['ano'] ?></td>
                  <td><?= $livro['categoria'] ?></td>
                  <td>
                    <!-- na tabela de ações, haverá os botoes de visualizar (que leva para livro-view.php), editar (que leva para
                    editar-livro.php) e excluir (que leva para acoes.php). Em seu URL, todos tem o id's do livro selecionado, para
                    poder ser feito a identificação de tal livro-->
                    <a href="livro-view.php/?id=<?= $livro['id'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                    <a href="editar-livro.php/?id=<?= $livro['id'] ?>" class="btn btn-success btn-sm">Editar</a>
                    <form action="/login/config/acoes.php" method="POST" class="d-inline">
                      <!-- confirmação para caso a pessoa realmente quer que o usuario seja exluido; seu nome é "deleta_livro"
                       e será levado para acoes.php para ser feito o delete lá -->
                        <button onclick="return confirm('Você deseja exluir mesmo?')"
                        type="submit" name="deleta_livro" value="<?=$livro['id']?>" class="btn btn-danger btn-sm">Excluir </button>
                    </form>
                  </td>
                </tr>
                <?php 
                    }
                    // se é igual a zero, então dirá que nenhum livro foi encontrado
                  }else{
                    echo '<h5>Nenhum livro encontrado</h5>';
                  }
                
                ?>
          </tbody>

        </table>

      </div>

    </div>

  </div>

</div>

    
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
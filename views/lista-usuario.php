<?php
// requer informações de user.php
require_once ('../src/model/user.php');
// inicia a sessao
session_start();
// user é a variavel pela classe user
$user = new User();
// usuarios é user, mas com a função de listagem de usuarios
$usuarios = $user->listUser();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <!-- inclui a barra de pesquisa -->
    <?php include('nav-bar.php'); ?> 

    <!-- criação de uma tabela com os dados dos usuarios cadastrados no banco de dados -->
    <div class="container mt-4">
      <div class="row">
        <div class="card">
          <div class="card-header">
            <h4>Lista de Usuários <a href="cadastra-usuario.php" class="btn btn-primary float-end">Cadastrar Usuário</a></h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              // se a quantidade de usuarios cadastrados forem maior que zero...
                  if(mysqli_num_rows($usuarios) > 0){
                  //  para cada usuario cadastrado, criará uma tabela com suas informações -->                    
                    foreach($usuarios as $usuario){
                
                ?>
                <tr>
                  <td><?= $usuario['id'] ?></td>
                  <td><?= $usuario['nome'] ?></td>
                  <td><?= $usuario['email'] ?></td>
                  <td>
                     <!-- na tabela de ações, haverá os botoes de visualizar (que leva para usuario-view.php), editar (que leva para
                    editar-usuario.php) e excluir (que leva para acoes.php). Em seu URL, todos tem o id's do usuario selecionado, para
                    poder ser feito a identificação de tal usuario-->
                    <a href="usuario-view.php/?id=<?php echo $usuario['id'] ?>" class="btn btn-secondary btn-sm">Visualizar</a>
                    <a href="editar-usuario.php/?id=<?php echo $usuario['id'] ?>" class="btn btn-success btn-sm">Editar</a>
                    <form action="/login/config/acoes.php" method="POST" class="d-inline">
                        <button onclick="return confirm('Você deseja excluir mesmo?')"
                        type="submit" name="deleta_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm">Excluir </button>
                    </form>
                  </td>
                </tr>
                <?php 
                    }
                    // se é igual a zero, então dirá que nenhum livro foi encontrado
                  }else{
                    echo '<h5>Nenhum Usuário encontrado</h5>';
                  }
                
                ?>
              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
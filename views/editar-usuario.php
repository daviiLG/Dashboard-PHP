<?php
// requere as informações de user.php e inicia uyma sessao
require_once('../src/model/user.php');
session_start();

// a variavel user fará o papel da classe user
$user = new User();
// a variavel usuarios será ainda o user, mas com a função de encontrar algum em especifico pelo seu id
$usuarios = $user->findByID($_GET['id']);
// users será a variavel usuarios, mas as informações são "convertidas" em arrays
$users = $usuarios->fetch_assoc();

// se a quantidade de usuarios cadastrados forem maior que 0...
if ($usuarios->num_rows > 0) {


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
  <?php include('nav-bar.php'); ?>

  <!-- pagina de edição de usuário -->
  <div class="container mt-5">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h4>Edição de Usuário <a href="/login/views/lista-usuario.php" class="btn btn-primary float-end">Voltar</a></h4>

        </div>
        <div class="card-body">

        <!-- formulario pelo metodo post, na qual levará as informações para "acoes.php" e compará-las lá -->
        <form action="/login/config/acoes.php" method="POST">
            <div class="mb-3">
              <!-- na parte id, mostrará o id do usuário que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>ID</label>
              <input type="text" name="id" class="form-control" value="<?= $users['id'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte nome, mostrará o nome do usuário que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Nome</label>
              <input type="text" name="nome" class="form-control" value="<?= $users['nome'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte email, mostrará o email do usuário que foi selecionado. se a pessoa quiser mudá-lo, basta alterá-lo,
               pois ele é um input (e também que é justamente para editar as informações) -->
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="<?= $users['email'] ?>">
            </div>
            <div class="mb-3">
              <!-- na parte de senha, não mostrará sua senha, mas ainda assim será possivel alterá-la, se a pessoa não quiser
               alterar, basta não mexer ali no campo vazio -->
              <label>Senha</label>
              <input type="password" name="senha" class="form-control">
            </div>
            <div class="mb-3">
               <!-- botao para salvar as informações novas (ou não, se não foram alteradas), seu nome é "edita_usuario" -->
              <button class="btn btn-primary" type="submit" name="edita_usuario">Salvar</button>
            </div>
        </form>
        </div>

      </div>
    </div>
  </div>
  <!-- se a quantidade de usuários for igual a 0, dirá que o usuário não foi encontrado -->
<?php } else {echo "Usuário não encontrado!";} ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
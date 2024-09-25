<?php
// requere as informações de user.php
require_once('../src/model/user.php');
// inicia a sessao
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

  <!-- pagina de listagem de usuario -->
  <div class="container mt-5">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <!-- href para servir como um botao para voltar a "lista-usuario.php" -->
          <h4>Usuário cadastrado: <a href="/login/views/lista-usuario.php" class="btn btn-primary float-end">Voltar</a></h4>
        </div>
        <div class="card-body">
          
            <div class="mb-3">
              <!-- mostra o dado de id -->
              <label>ID</label>
              <p><?php echo $users['id'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de nome -->
              <label>Nome</label>
              <p><?php echo $users['nome'] ?></p>
            </div>
            <div class="mb-3">
              <!-- mostra o dado de email -->
              <label>Email</label>
              <p><?php echo $users['email'] ?></p>
            </div>

        </div>

      </div>
    </div>
  </div>
  <!-- se for igual a zero, dirá que o usuario nao foi encontrado -->
<?php } else {echo "Usuario não encontrado!";} ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
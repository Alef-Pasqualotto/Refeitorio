<?php session_start();
include_once(__DIR__ . '..\..\backend\conecta.php');
if(isset($_POST['login']))
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $banco = new Banco;
    $conn = $banco->conectar();    
    
    $stmt = $conn->prepare('SELECT * FROM usuario WHERE email = :email AND senha = :senha');
    $stmt->execute([
        ':email' => $email,
        ':senha' => $password
        ]
    );    
    $ret = $stmt->fetch();
    
    if($ret){        
        $_SESSION['usuario_id']=$ret['usuario_id'];
        $_SESSION['uemail']=$ret['email'];
        echo "<script>window.location.href='cardapio.php'</script>";
    }
    else{
        echo "<script>alert('Não foi encontrado usuário com o email e senha informados');</script>";
    }
  }
  ?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cardápio RU</h3></div>
                                    <h3 class="text-center font-weight-light my-4">Login do Usuário</h3>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="Email" required />
                                                <label for="inputEmail">Endereço de Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Senha" name="password" required />
                                                <label for="inputPassword">Senha</label>
                                            </div>
                                
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button  class="btn btn-success"  type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="registration.php">Novo no site? Cadastre-se!</a></div>
                                        <hr />
                                           <div class="small"><a href=<?php echo ('..\backend\logout.php')?>>Página Inicial</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

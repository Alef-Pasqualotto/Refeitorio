<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cardápio RU | Cadastro </title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cardápio RU</h3></div>
                                 <h3 class="text-center font-weight-light my-4">Cadastro de Usuário</h3>
                                    <div class="card-body">
                                        <form method="post" name="registration" action="../../backend/inserir.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="hidden" value="3" name="registro" id="registro">
                                                        <input class="form-control" id="nome" type="text" name="nome" placeholder="Insira seu Primeiro Nome"  required />
                                                        <label for="nome">Nome</label>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="nome@exemplo.com" />
                                                <label for="inputEmail">Endereço de Email</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" type="password" placeholder="Crie uma Senha" name="senha"  id="senha"/>
                                                        <label for="senha">Senha</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirme a Senha" name="confirmpassword" id="confirmpassword" />
                                                        <label for="inputPasswordConfirm">Confirmar a Senha</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" name="submit" class="btn btn-primary btn-block">Criar Conta</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Já possui uma conta? Faça o Login</a></div>
                                        <hr />
                                           <div class="small"><a href="index.php">Página Inicial</a></div>
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

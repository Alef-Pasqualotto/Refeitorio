<?php session_start();
include_once(__DIR__ . '..\..\..\backend\conecta.php');
if (strlen($_SESSION["usuario_id"]) == 0) {
    header('location:add-cardapio.php');
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
    <title>Adicionar Refeição</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>


</head>

<body>
    <?php include_once('includes/header.php'); ?>
    <div id="layoutSidenav">
        <?php include_once('includes/leftbar.php'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Adicionar Cardápio</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="cardapio.php">Cardápio</a></li>
                        <li class="breadcrumb-item active">Adicionar Cardápio</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" action="../../backend/inserir.php">
                            <input type="hidden" name="registro" value='4'>
                                <div class="row" style="margin-top:1%;">
                                    <div class="col-2">Data:</div>
                                    <div class="col-6"><input type="date" required name="data" placeholder="Insira a data" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-2">ID do Nutricionista:</div>
                                    <div class="col-6"><input type="number" required name="nutricionista" id="nutricionista" placeholder="Insira o ID do nutricionista" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-2">Tipo:</div>
                                    <div class="col-6">
                                        <select name="tipo" required id="tipo" class="form-control">
                                            <option value="" disabled selected hidden>Insira o tipo do cardápio</option>
                                            <option value="1">Café</option>
                                            <option value="2">Almoço</option>
                                            <option value="3">Janta</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin-top:1%;">
                                    <div class="col-2">Itens:</div>
                                    <div class="col-6">
                                        <?php include_once('includes/itens.php'); ?>
                                    </div>
                                </div>


                                <div class="row" style="margin-top:1%">
                                    <div class="col-2">&nbsp;</div>
                                    <div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Enviar</button></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>

</html>
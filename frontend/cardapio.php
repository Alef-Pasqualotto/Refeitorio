<?php session_start();
error_reporting(0);
include_once(__DIR__ . '..\..\backend\conecta.php');
if (strlen($_SESSION["usuario_id"]) == 0) {
    header('location:' . __DIR__ . '..\..\backend\conecta.php');
} else {
    $banco = new Banco;
    if (!empty($_GET['data'])) {
        $data = $_GET['data'];
        $pesquisa = 2;
    } else {
        $pesquisa = 1;
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
        <title>Cardápio RU</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <?php include_once('includes/header.php'); ?>
        <div id="layoutSidenav">
            <?php include_once('includes/leftbar.php'); ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Cardápio Semanal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Refeições</li>
                        </ol>
                        <hr />
                        <?php
                        if ($banco->autentica($_SESSION["usuario_id"])) {
                            echo '
                            <div class="row mb-4">
                            <div class="card bg-success text-white d-grid gap-2 col-6 mx-left me-1" style="width: fit-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="text-white stretched-link" href="add-cardapio.php">Adicionar Cardápio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-success text-white d-grid gap-2 col-6 mx-left me-1" style="width: fit-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="text-white stretched-link" href="add-refeicao.php">Adicionar Refeição</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card bg-success text-white d-grid gap-2 col-6 mx-left me-1" style="width: fit-content">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a class="text-white stretched-link" href="add-ingrediente.php">Adicionar Ingrediente</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>';
                        }
                        ?>

                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Cardápio Semanal
                                </div>
                                <div class="card-body">
                                    <div class="col-2">Pesquisa por semana:</div>
                                    <div class="col-6">
                                        <input id="data-pesquisa" type="date" required name="data" <?php echo empty($data) ? '' : 'value="' . $data . '"' ?> placeholder="Pesquisa por semana" class="form-control">
                                    </div>
                                    <a href="../../../refeitorio/frontend/cardapio.php">Limpar</a>
                                    <table id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Refeição</th>
                                                <th>Tipo</th>
                                                <th>Data</th>
                                                <th>Ingredientes</th>
                                                <th>Calorias</th>
                                                <th>Nutricionista</th>
                                                <th>Crn</th>
                                                <?php
                                                if ($banco->autentica($_SESSION["usuario_id"])) {
                                                    echo '<th>Ação</th>';
                                                }
                                                ?>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Refeição</th>
                                                <th>Tipo</th>
                                                <th>Data</th>
                                                <th>Ingredientes</th>
                                                <th>Calorias</th>
                                                <th>Nutricionista</th>
                                                <th>Crn</th>
                                                <?php
                                                if ($banco->autentica($_SESSION["usuario_id"])) {
                                                    echo '<th>Ação</th>';
                                                }
                                                ?>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $itens = include_once(__DIR__ . '..\..\backend\buscar.php');
                                            for ($i = 0; $i < count($itens); $i++) {
                                            ?>

                                                <tr>
                                                    <td><?php echo htmlentities($i + 1); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["nome_do_prato"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["tipo_formatado"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["data_formatada"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["ingredientes"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["soma_das_calorias"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["nome"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["crn"]); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($banco->autentica($_SESSION["usuario_id"])) {
                                                            echo '<div class="dropdup">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">Editar</a></li>
                                                              <li><a class="dropdown-item" href=add-cardapio.php?tipo=' . $itens[$i]["tipo"] . '&nutricionista_id=' . $itens[$i]["usuario_id"] . '&cardapio_id=' . $itens[$i]["cardapio_id"] . '>Clonar</a></li>
                                                              <li><a class="dropdown-item" href=../backend/excluir.php?registro=2&item_id=' . $itens[$i]["item_id"] . '>Excluir refeição</a></li>
                                                              <li><a class="dropdown-item" href=../backend/excluir.php?registro=3&cardapio_id=' . $itens[$i]["cardapio_id"] . '>Excluir cardápio</a></li> 
                                                              
                                                            </ul>
                                                          </div>';
                                                        }
                                                        ?>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Refeição</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="" method="post">
                                                                            <input type="hidden" id="id" />
                                                                            <div class="mb-3">
                                                                                <label for="nome" class="form-label">Nome da Refeição</label>
                                                                                <?php echo '<input type="text" class="form-control" id="nome" value="'. ($itens[$i]["nome_do_prato"] . '"' )?>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="tipo" class="form-label">Tipo</label>
                                                                                <select class="form-select" name="tipo" id="tipo">
                                                                                    <option value="1" <?php if ($itens[$i]['tipo'] == 1) print('selected') ?>>Café</option>
                                                                                    <option value="2" <?php if ($itens[$i]['tipo'] == 2) print('selected') ?>>Almoço</option>
                                                                                    <option value="3" <?php if ($itens[$i]['tipo'] == 3) print('selected') ?>>Janta</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="dtnasc" class="form-label">Data</label>
                                                                                <input type="date" class="form-control" id="dtnasc">
                                                                            </div>
                                                                            <div class="row" style="margin-top:1%;">
                                                                                <div class="col-3">Ingredientes:</div>
                                                                                <div class="col-6">
                                                                                    <div class="input-group">
                                                                                        <div class="form-outline">
                                                                                            <input id="search-focus" type="search" id="form1" class="form-control" onkeyup="pesquisar()" placeholder="Pesquisa" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row" style="margin-top:1%;">
                                                                                        <div class="col-12">
                                                                                            <?php include_once('includes/ingredientes.php'); ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" id="cancelar" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                                <button id="alterar" class="btn btn-primary" type="button">Alterar</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php echo $row['id'] ?>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </main>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="js/scripts.js"></script>

    </body>

    </html>
<?php } ?>
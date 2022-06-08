<?php session_start();
error_reporting(0);
include_once(__DIR__ . '..\..\..\backend\conecta.php');
if (strlen($_SESSION["usuario_id"]) == 0) {
    header('location:logout.php');
} else {
    $banco = new Banco;
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
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
                            echo '<div class="card bg-primary text-white d-grid gap-2 col-6 mx-left">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="me-3">
                                            <a class="text-white stretched-link" href="add-refeicao.php">Adicionar Refeição</a>
                                        </div>
                                    </div>
                                </div>
                            </div><br>';
                        }
                        ?>

                        <div class="row">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Cardápio Semanal
                                </div>
                                <div class="card-body">
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
                                                <th>Ação</th>
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
                                                <th>Ação</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $itens = include_once(__DIR__ . '..\..\..\backend\buscar.php');
                                            for ($i = 0; $i < count($itens); $i++) {
                                            ?>

                                                <tr>
                                                    <td><?php echo htmlentities($i + 1); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["nome_do_prato"]); ?></td>
                                                    <td><?php echo htmlentities($itens[$i]["tipo"]); ?></td>
                                                    <td> <?php echo htmlentities($itens[$i]["dt"]); ?></td>
                                                    <td> <?php echo htmlentities($itens[$i]["ingredientes"]); ?></td>
                                                    <td> <?php echo htmlentities($itens[$i]["soma_das_calorias"]); ?></td>
                                                    <td> <?php echo htmlentities($itens[$i]["nome"]); ?></td>
                                                    <td> <?php echo htmlentities($itens[$i]["crn"]); ?></td>
                                                    <td>
                                                        <button id="novo" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Ver
                                                        </button>
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Refeição</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" id="id" />
                                                                        <div class="mb-3">
                                                                            <label for="nome" class="form-label">Nome da Refeição</label>
                                                                            <input type="text" class="form-control" id="nome">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="dtnasc" class="form-label">Data</label>
                                                                            <input type="date" class="form-control" id="dtnasc">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="dtnasc" class="form-label">Nutricionista</label>
                                                                            <input type="text" class="form-control" id="dtnasc">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                            <button id="salvar" class="btn btn-danger" type="button">Excluir</button>
                                                                            <button id="alterar" class="btn btn-primary" type="button">Clonar</button>
                                                                            <button id="alterar" class="btn btn-primary" type="button">Alterar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--<a href="manage-notes.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Tem certeza que quer excluir?')" class="btn btn-danger">Excluir</a></td>-->
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    </html>
<?php } ?>
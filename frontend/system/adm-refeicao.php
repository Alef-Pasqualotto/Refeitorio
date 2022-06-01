<?php session_start();
error_reporting(0);
include_once('includes/config.php');
include_once(__DIR__ . '..\..\..\backend\conecta.php');
if(strlen( $_SESSION["usuario_id"])==0)
{   
    header('location:logout.php');
} else {
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
<?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
         <?php include_once('includes/leftbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Cardápio Semanal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Refeições</li>
                        </ol>
                        <hr />
                        <div class="row">
<?php
$userid=$_SESSION["usuario_id"];
$ret=mysqli_query($con,"select id from tblcategory where createdBy='$userid'");
$listedcategories=mysqli_num_rows($ret);

$query=mysqli_query($con,"select * from tblnotes where createdBy='$userid'");
$totalnotes=mysqli_num_rows($query);
?>
        <!--<div class="col-lg-6 col-xl-2 mb-4"></div> -->

        <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="card bg-primary text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                            <a class="text-white stretched-link" href="add-refeicao.php">Adicionar Refeição</a>
                                                <div class="text-lg fw-bold"><?php //echo $listedcategories;?></div>
                                            </div>
                                            <!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar feather-xl text-white-50"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            -->
                                        </div>
                                    </div>
                                <!--    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-white stretched-link" href="manage-categories.php">Ver Detalhes</a>
                                   
                                    </div> -->
                                </div>
                            </div>
                     <!--<div class="col-lg-6 col-xl-4 mb-4">
                                <div class="card bg-success text-white h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="me-3">
                                                <div class="text-white-75 small">Total de Refeições</div>                                                
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square feather-xl text-white-50"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between small">
                                        <a class="text-white stretched-link" href="manage-notes.php">Ver Detalhes</a>
                       
                                    </div>
                                </div>
                            </div>
                       
                 
                        </div>
                    -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Cardápio Semanal
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                           <tr>
                                        <th>#</th>
                                            <th>Refeição</th>
                                             <th>Categoria</th>
                                            <th>Data</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Refeição</th>
                                            <th>Categoria</th>
                                            <th>Data</th>
                                            <th>Ação</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php 
$userid=$_SESSION["edmsid"];
$query=mysqli_query($con,"select * from tblnotes where createdBy='$userid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?> 

  <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                              <td><?php echo htmlentities($row['noteTitle']);?></td>
                                            <td><?php echo htmlentities($row['noteCategory']);?></td>
                                            <td> <?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
                                            <a href="view-note.php?noteid=<?php echo $row['id']?>" class="btn btn-primary">Ver</a> 
                                            <a href="manage-notes.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Tem certeza que quer excluir?')" class="btn btn-danger">Excluir</a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
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
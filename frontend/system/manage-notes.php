<?php 
//não esta sendo utilizado


session_start();
include_once(__DIR__ . '..\..\..\backend\conecta.php');
if(strlen($_SESSION["usuario_id"])==0)
{   header('location:logout.php');
} else {

// For deleting    
if($_GET['del']){
$nid=$_GET['id'];
$userid=$_SESSION["usuario_id"];
mysqli_query($con,"delete from tblnotes where id ='$nid' and  createdBy='$userid'");
mysqli_query($con,"delete from tblnoteshistory where noteId ='$nid' and  userId='$userid'");
echo "<script>alert('Refeição deletada');</script>";
echo "<script>window.location.href='manage-notes.php'</script>";
          }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
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
                        <h1 class="mt-4">Administrar Refeição</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Cardápio</a></li>
                            <li class="breadcrumb-item active">Administrar Refeição</li>
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
$query=mysqli_query($con,"select * from item where createdBy='$userid'");
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
                                            <a href="view-note.php?noteid=<?php echo $row['id']?>" class="btn btn-primary">Editar</a> 
                                            <a href="manage-notes.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Tem certeza que deseja excluir?')" class="btn btn-danger">Excluir</a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                </footer>
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
<?php }  ?>
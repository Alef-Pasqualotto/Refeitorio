<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["edmsid"])==0)
{   header('location:logout.php');
} else {

if(isset($_POST['submit']))
{
    $category=$_POST['category'];
    $ntitle=$_POST['notetitle'];
    $ndescription=$_POST['notediscription'];
    $createdby=$_SESSION['edmsid'];

$sql=mysqli_query($con,"insert into tblnotes(noteCategory,noteTitle,noteDescription,createdBy) values('$category','$ntitle','$ndescription','$createdby')");
echo "<script>alert('Note Added  successfully');</script>";
echo "<script>window.location.href='manage-notes.php'</script>";
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
        <title>Adicionar Refeição</title>
       <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/leftbar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Adicionar Refeição</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="cardapio.php">Cardápio</a></li>
                            <li class="breadcrumb-item active">Adicionar Refeição</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" enctype="multipart/form-data">                                



<div class="row" style="margin-top:1%;">
<div class="col-2">Nome do Prato:</div>
<div class="col-6"><input type="text" required name="notetitle" placeholder="Insira o nome do prato" class="form-control"></textarea>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Tipo:</div>
<div class="col-6">
<select name="tipoprato" required id="tipoprato" class="form-control">
  <option value="" disabled selected hidden>Insira o tipo da refeição</option>
  <option value="cafe">Café</option>
  <option value="almoco">Almoço</option>
  <option value="janta">Janta</option>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2">Ingredientes:</div>
<div class="col-6">
<input type="checkbox" name="ingredientes" value="arroz"> Arroz<br>
<input type="checkbox" name="ingredientes" value="feijão"> Feijão<br>
<input type="checkbox" name="ingredientes" value="carnedegado"> Carne de Gado<br>
<input type="checkbox" name="ingredientes" value="frango"> Frango<br>
<input type="checkbox" name="ingredientes" value="carnedeporco"> Carne de Porco<br>
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
<?php }  ?>

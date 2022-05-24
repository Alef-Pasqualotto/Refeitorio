   <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Sistema</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Cardápio
                            </a>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Refeições
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                             <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-notes.php">Adicionar</a>
                                    <a class="nav-link" href="manage-notes.php">Administrar</a>
                                </nav>
                            </div>
                               <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                             Logout
                            </a>
                        </div>
                    </div>
<?php
$id=intval($_SESSION["edmsid"]);
$query=mysqli_query($con,"select * from tblregistration where id='$id'");
while($row=mysqli_fetch_array($query))
{ $fullname=$row['firstName']." ".$row['lastName'];
}

    ?>

                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado com a Conta:</div>
                       <?php echo $fullname?>
                    </div>
                </nav>
            </div>
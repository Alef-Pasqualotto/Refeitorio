<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Sistema</div>
                            <a class="nav-link" href="cardapio.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Cardápio
                            </a>

                            <?php
                            $banco = new Banco;
                            $conn = $banco->conectar();
                            if($banco->autentica($_SESSION["usuario_id"])){
                            echo ('
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Adicionar
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-cardapio.php">Cardápio</a>
                                    <a class="nav-link" href="add-refeicao.php">Refeição</a>
                                    <a class="nav-link" href="add-ingrediente.php">Ingrediente</a>                                     
                                </nav>
                            </div>
                            <a class="nav-link" href="gerenciar.php">
                                <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
                                Gerenciar Usuário
                            </a>
                            
                            <a class="nav-link" href="registration.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Registro de Usuário
                            </a>
                            
                            
                            ');
                            }
                            ?>

                               <a class="nav-link" href=<?php echo ('..\backend\logout.php')?>>
                                <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                             Logout
                            </a>
                        </div>
                    </div>

                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado com a Conta:</div>
                        <?php
                            $id=intval($_SESSION["usuario_id"]);                            
                            $query = $conn->prepare('SELECT nome FROM usuario WHERE usuario_id = :id');
                            $query->execute([':id' => $id]);
                            $nome = $query->fetch(PDO::FETCH_ASSOC);
                            echo $nome['nome'];
                            ?>
                    </div>
                </nav>
            </div>
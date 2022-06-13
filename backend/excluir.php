<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

//o codigo consiste em mudar a data de exclusao do cardapio, alterando a para ficar menor que a hora atual

$query = $conn->prepare('UPDATE cardapio SET dt_exclusao = CURRENT_TIMESTAMP() - 1 WHERE cardapio_id = :id;');        
$query->execute([
    ':id' => $dados['cardapio_id'],
]);

?>
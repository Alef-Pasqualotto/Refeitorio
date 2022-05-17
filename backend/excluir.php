<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio
switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare(' DELETE FROM ingrediente  WHERE ingrediente_id = :id ;');        
        $query->execute([ ':id' => $dados['ingrediente_id']]);
        break;
        break;
    case 2:
        $query = $conn->prepare(' DELETE FROM item  WHERE item_id = :id ;');        
        $query->execute([ ':id' => $dados['item_id']]);
        break;
    case 3:
        $query = $conn->prepare(' DELETE FROM usuario  WHERE usuario_id = :id ;');        
        $query->execute([ ':id' => $dados['usuario_id']]);
        break;
        break;
    case 4:
        $query = $conn->prepare(' DELETE FROM cardapio  WHERE cardapio_id = :id ;');        
        $query->execute([ ':id' => $dados['cardapio_id']]);
        break;
        break;
}
?>
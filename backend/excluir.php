<?php
include_once('banco.php');
$id = $_GET['id'];
$banco = new Banco;
$conn = $banco->conectar();

$conn->prepare('DELETE FROM :tabela WHERE (:id)');

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio


switch ($_GET['tabela']) {
    case 1:
        $tabela = "ingrediente";
        break;
    case 2:
        $tabela = "item";
        break;
    case 3:
        $tabela = 'usuario';
        break;
    case 4:
        $tabela = 'cardapio';
        break;
}
?>
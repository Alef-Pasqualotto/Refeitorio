<?php
include_once('conexao.php');
$dados = $_POST;
$conn = new Banco;
$conn->conectar();

$conn->prepare('INSERT INTO :tabela (:campos) VALUES (:valores)');

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio


switch ($dados['registro']) {
    case 1:
        $campos = 'nome,calorias';
        break;
    case 2:
        $campos = 'descricao';
        break;
    case 3:
        $campos = 'nome, senha, email, crn';
        break;
    case 4:
        $campos = 'dt, tipo, nutricionista_id';
        break;
}
?>
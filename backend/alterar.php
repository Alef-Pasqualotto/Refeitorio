<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

$conn->prepare('UPDATE :tabela (:campos) SET (:valores)');

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio


switch ($dados['registro']) {
    case 1:
        $tabela = 'ingrediente';
        $campos = 'nome,calorias';
        //$conn->bindParam(':tabela', $tabela, ':campos', $campos, ':valores', implode(', ', array_splice($dados, 1)), PDO::PARAM_INT);
        break;
    case 2:
        $tabela = 'item';
        $campos = 'descricao';
        break;
    case 3:
        $tabela = 'usuario';
        $campos = 'nome, senha, email, crn';
        break;
    case 4:
        $tabela = 'cardapio';
        $campos = 'dt, tipo, nutricionista_id';
        break;
}
?> 

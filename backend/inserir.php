<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

$query = $conn->prepare('INSERT INTO ? (?) VALUES (?)');

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio


switch ($dados['registro']) {
    case 1:
        $tabela = 'ingrediente';
        $campos = 'nome, calorias';
        $dados['calorias'] = (int)$dados['calorias'];
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

$query->bindParam(1, $tabela, PDO::PARAM_INT);
$query->bindParam(2, $campos, PDO::PARAM_STR);
$query->bindParam(3, '('+ implode(', ', array_splice($dados, 1)) +')', PDO::PARAM_INT);

$query->execute();
?>
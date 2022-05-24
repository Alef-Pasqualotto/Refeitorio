<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

$consulta = "SELECT * FROM";
$ingredientes = [];

// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio

switch ($_POST['tabela']){
    
    case 1:
        $consulta = $consulta . ' ingrediente';
        break;
    case 2:
        $consulta = $consulta . ' item';
        break;
    case 3:
        $consulta = $consulta . ' cardapio';
        break;
}


foreach ($conn->query("
        $consulta
        ", PDO::FETCH_ASSOC) as $ingrediente){
        $ingredientes[] = [
            "id" => $ingrediente['ingrediente_id'],
            "nome" => $ingrediente['nome'],
                "calorias" => $ingrediente['calorias']           
        ];
    }
    print json_encode($ingredientes);
?>

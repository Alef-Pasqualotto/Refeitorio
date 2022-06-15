<?php
include_once('conecta.php');
$dados = $_GET;
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = cardapio

switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare('UPDATE ingrediente SET dt_exclusao = (CURRENT_TIMESTAMP() - 1) WHERE ingrediente_id = :id;');        
        $query->execute([
            ':id' => $dados['ingrediente_id'],
        ]);
        header('location:..\frontend\system\cardapio.php');
        break;
        case 2:
                $query = $conn->prepare('UPDATE item SET dt_exclusao = (CURRENT_TIMESTAMP() - 1) WHERE item_id = :id;');        
                $query->execute([
                    ':id' => $dados['item_id'],
                ]);
                header('location:..\frontend\system\add-ingrediente.php');
                break;
        case 3:        
                $query = $conn->prepare('UPDATE cardapio SET dt_exclusao = (CURRENT_TIMESTAMP() - 1) WHERE cardapio_id = :id;');        
                $query->execute([
                    ':id' => $dados['cardapio_id'],
                ]);
                header('location:..\frontend\system\cardapio.php');
                break;
        case 4:

                break;
    }
?>
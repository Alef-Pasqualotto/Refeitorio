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
        $query = $conn->prepare('UPDATE ingrediente (nome, calorias) SET (:nome, :calorias) WHERE ingrediente_id = :id;');        
        $query->execute([
            ':id' => $dados['ingrediente_id'],
            ':nome' => $dados['nome'],
            ':calorias' => $dados['calorias']
        ]);
        break;
        case 2:
            $query = $conn->prepare('UPDATE item (descricao) SET (:descricao) WHERE item_id = :id;');        
            $query->execute([
                ':id' => $dados['item_id'],
                ':descricao' => $dados['descricao']            
            ]);
            break;
        case 3:        
            $query = $conn->prepare('UPDATE cardapio (dt, tipo, nutricionista_id) SET (:dt, :tipo, :nutricionista) WHERE cardapio_id = :id;');        
            $query->execute([
                ':id' => $dados['cardapio_id'],
                ':dt' => $dados['data'],
                ':tipo' => $dados['tipo'],
                ':nutricionista' => $dados['nutricionista']
    
            ]);
            break;
    }
?>



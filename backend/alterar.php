<?php
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = cardapi


switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare(' UPDATE ingrediente SET nome = :nome, calorias = :calorias  WHERE ingrediente_id = :id ;');        
        $query->execute([
            ':id' => $dados['ingrediente_id'],
            ':nome' => $dados['nome'],
            ':calorias' => $dados['calorias']
        ]);
        break;
        case 2:
            $query = $conn->prepare('UPDATE item SET descricao = :descricao WHERE item_id = :id;');        
            $query->execute([
                ':id' => $dados['item_id'],
                ':descricao' => $dados['descricao']            
            ]);
            break;
        case 3:        
            $query = $conn->prepare('UPDATE cardapio SET dt = :dt, tipo = :tipo, nutricionista_id = :nutricionista WHERE cardapio_id = :id;');        
            $query->execute([
                ':id' => $dados['cardapio_id'],
                ':dt' => $dados['data'],
                ':tipo' => $dados['tipo'],
                ':nutricionista' => $dados['nutricionista']
    
            ]);
            break;

        case 4:
            $query = $conn->prepare('UPDATE usuario SET senha = :senha, email = :email , crn = :crn WHERE nome = :nome');
            $query->execute([
                ':nome' => $dados['nome'],
                ':senha' => $dados['senha'],
                ':email' => $dados['email'],
                ':crn' => $dados['crn']
                
            ]);
            break; 
    }
?>



<?php
include_once('conecta.php');
$dados = $_GET;
$banco = new Banco;
$conn = $banco->conectar();

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio


switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare('UPDATE ingrediente (nome, calorias) SET (:nome, :calorias);');        
        $query->execute([
            ':nome' => $dados['nome'],
            ':calorias' => $dados['calorias']
        ]);
        break;
        case 2:
            $query = $conn->prepare('UPDATE item (descricao) SET (:descricao);');        
            $query->execute([
                ':descricao' => $dados['descricao']            
            ]);
            break;
       /*  case 3:        
            $query = $conn->prepare('UPDATE usuario (nome, senha, email, crn) SET (:nome, :senha, :email, :crn);');        
            $query->execute([
                ':nome' => $dados['nome'],
                ':senha' => $dados['senha'],
                ':email' => $dados['email'],
                ':crn' => isset($dados['senha']) ? $dados['senha'] : null
            ]);
            break; */
        case 3:        
            $query = $conn->prepare('UPDATE cardapio (dt, tipo, nutricionista_id) SET (:dt, :tipo, :nutricionista);');        
            $query->execute([
                ':dt' => $dados['data'],
                ':tipo' => $dados['tipo'],
                ':nutricionista' => $dados['nutricionista']
    
            ]);
            break;
    }
    ?>
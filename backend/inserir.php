<?php
//header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
include_once('conecta.php');
$dados = $_POST;
$banco = new Banco;
try{
    $conn = $banco->conectar();
} catch(PDOException $e){
    echo 'Falha ao salvar os arquivos. Favor, tente mais tarde.';
}

// dependendo do valor que vier em registro, nós inserimos em uma tabela diferente
// 1 = ingrediente
// 2 = item
// 3 = usuario
// 4 = cardapio

// Faz um INSERT diferente, de acordo com os números que vierem representando as tabelas
switch ($dados['registro']) {
    // ingrediente
    case 1:
        $query = $conn->prepare('INSERT INTO ingrediente (nome, calorias) VALUES (:nome, :calorias);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':calorias' => $dados['calorias']
        ]);
        break;

        // item e ingrediente_item
    case 2:
        $query = $conn->prepare('INSERT INTO item (descricao) VALUES (:descricao);');
        $query->execute([
            ':descricao' => $dados['descricao']
        ]);
        
        $item_id = pegaUltimoId($conn);

        foreach(explode(',', $dados['ingredientes']) as $ingrediente){
            $query = $conn->prepare('INSERT INTO ingrediente_item (ingrediente_id, item_id) VALUES (:ingrediente_id, :item_id);');
            
            $query->execute([
                ':ingrediente_id' => $ingrediente,
                ':item_id' => $item_id[0]
            ]);
        }
        break;

        //usuario
    case 3:
        $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, crn) VALUES (:nome, :senha, :email, :crn);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':senha' => $dados['senha'],
            ':email' => $dados['email'],
            ':crn' => isset($dados['crn']) ? $dados['crn'] : null
        ]);
        header('location:..\frontend\system\login.php');
        
        break;

        //cardapio e cardapio_item
    case 4:
        $query = $conn->prepare('INSERT INTO cardapio (dt, tipo, nutricionista_id) VALUES (:dt, :tipo, :nutricionista);');
        $query->execute([
            ':dt' => $dados['data'],
            ':tipo' => $dados['tipo'],
            ':nutricionista' => $dados['nutricionista']
        ]);
        
        $cardapio_id = pegaUltimoId($conn);

        foreach(explode(',', $dados['itens']) as $item){
            $query = $conn->prepare('INSERT INTO cardapio_item (cardapio_id, item_id) VALUES (:cardapio_id, :item_id);');            
            
            $query->execute([
                ':cardapio_id' => $cardapio_id[0],
                ':item_id' => $item[0]
            ]);
        }
        break;
}

function pegaUltimoId($conexao){
    $query = $conexao->prepare("SELECT LAST_INSERT_ID()");
    $query->execute();
    return $query->fetch(PDO::FETCH_NUM);
}


?>
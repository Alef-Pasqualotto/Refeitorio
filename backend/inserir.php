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


switch ($dados['registro']) {
    case 1:
        $query = $conn->prepare('INSERT INTO ingrediente (nome, calorias) VALUES (:nome, :calorias);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':calorias' => $dados['calorias']
        ]);
        break;
    case 2:
        $query = $conn->prepare('INSERT INTO item (descricao) VALUES (:descricao);');
        $query->execute([
            ':descricao' => $dados['descricao']
        ]);
        
        $query = $conn->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $item_id = $query->fetch(PDO::FETCH_NUM);

        foreach(explode(',', $dados['ingredientes']) as $ingrediente){
            $query = $conn->prepare('INSERT INTO ingrediente_item (ingrediente_id, item_id) VALUES (:ingrediente_id, :item_id);');
            
            $query->execute([
                ':ingrediente_id' => $ingrediente,
                ':item_id' => $item_id[0]
            ]);
        }
        break;
    case 3:
        $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, crn) VALUES (:nome, :senha, :email, :crn);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':senha' => $dados['senha'],
            ':email' => $dados['email'],
            ':crn' => isset($dados['senha']) ? $dados['senha'] : null
        ]);
        break;
    case 4:
        $query = $conn->prepare('INSERT INTO cardapio (dt, tipo, nutricionista_id) VALUES (:dt, :tipo, :nutricionista);');
        $query->execute([
            ':dt' => $dados['data'],
            ':tipo' => $dados['tipo'],
            ':nutricionista' => $dados['nutricionista']
        ]);
        
        $query = $conn->prepare("SELECT LAST_INSERT_ID()");
        $query->execute();
        $item_id = $query->fetch(PDO::FETCH_NUM);

        foreach(explode(',', $dados['ingredientes']) as $ingrediente){
            $query = $conn->prepare('INSERT INTO ingrediente_item (ingrediente_id, item_id) VALUES (:ingrediente_id, :item_id);');
            
            $query->execute([
                ':ingrediente_id' => $ingrediente,
                ':item_id' => $item_id[0]
            ]);
        }
        break;
}
?>
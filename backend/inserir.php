<?php
header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
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
        $query = $conn->prepare('INSERT INTO item (nome, calorias) VALUES (:descricao);');        
        $query->execute([
            ':descricao' => $dados['descricao']            
        ]);
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
        break;
}
?>
<?php
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
        $query = $conn->prepare('SELECT * FROM ingrediente WHERE nome = :nome');
        $query->execute([
            ':nome' => $dados['nome']           
        ]);
        // Se houver um ingrediente com esse nome no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO ingrediente (nome, calorias) VALUES (:nome, :calorias);');
            $query->execute([
                ':nome' => $dados['nome'],
                ':calorias' => $dados['calorias']
            ]);
            header('location:..\frontend\system\add-ingrediente.php');
        } else{
            // Por enquanto só morre, depois mostrar de forma mais amigável para o usuário
            die('Já existe um ingrediente com o mesmo nome cadastrado');
        }
        break;
        // item e ingrediente_item
    case 2:

        $query = $conn->prepare('SELECT * FROM item WHERE descricao = :descricao');
        $query->execute([
            ':descricao' => $dados['descricao']           
        ]);
        // Se houver um item com esse nome no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO item (descricao) VALUES (:descricao);');
            $query->execute([
                ':descricao' => $dados['descricao']
            ]);
            
            $item_id = pegaUltimoId($conn);

            foreach($dados['ingredientes'] as $ingrediente){
                $query = $conn->prepare('INSERT INTO ingrediente_item (ingrediente_id, item_id) VALUES (:ingrediente_id, :item_id);');
                
                $query->execute([
                    ':ingrediente_id' => $ingrediente,
                    ':item_id' => $item_id[0]
                ]);
            header('location:..\frontend\system\add-refeicao.php');
        }
        } else{
            // Por enquanto só morre, depois mostrar de forma mais amigável para o usuário
            die('Já existe um prato com o mesmo nome cadastrado');
        }
        break;

        //usuario
    case 3:
        if($dados['senha'] == $dados['confirmpassword']){
        $query = $conn->prepare('SELECT * FROM usuario WHERE email = :email');
        $query->execute([
            ':email' => $dados['email']           
        ]);
        // Se houver um item com esse nome no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){
            $query = $conn->prepare('INSERT INTO usuario (nome, senha, email, crn) VALUES (:nome, :senha, :email, :crn);');
        $query->execute([
            ':nome' => $dados['nome'],
            ':senha' => $dados['senha'],
            ':email' => $dados['email'],
            ':crn' => isset($dados['crn']) ? $dados['crn'] : null
        ]);
        header('location:..\frontend\system\login.php');
        
        } else{
            // Por enquanto só morre, depois mostrar de forma mais amigável para o usuário
            die('Já existe um usuário com o mesmo email cadastrado');
        }
        break;
    } else{
        die("<script>alert('As senhas nâo coincidem');</script>");
    }
        //cardapio e cardapio_item
    case 4:
        $query = $conn->prepare('SELECT * FROM cardapio WHERE dt = :dt AND tipo = :tipo AND nutricionista_id = :nutricionista_id');
        $query->execute([
            ':dt' => $dados['data'],
            ':tipo' => $dados['tipo'],
            ':nutricionista_id' => $dados['nutricionista']
        ]);
        // Se houver um cardapio com estes dados no banco, ele não insere
        if($query->fetch(PDO::FETCH_ASSOC) == null){            
            $query = $conn->prepare('INSERT INTO cardapio (dt, tipo, nutricionista_id, dt_exclusao) VALUES (:dt, :tipo, :nutricionista, :dt_exclusao);');
            $query->execute([
                ':dt' => $dados['data'],
                ':tipo' => $dados['tipo'],
                ':nutricionista' => $dados['nutricionista'],
                ':dt_exclusao' => $dados['data_exclusao']
            ]);
            
            $cardapio_id = pegaUltimoId($conn);

            foreach($dados['itens'] as $item){
                $query = $conn->prepare('INSERT INTO cardapio_item (item_id, cardapio_id) VALUES (:item_id, :cardapio_id);');
                
                $query->execute([
                    ':item_id' => $item,
                    ':cardapio_id' => $cardapio_id[0]
                ]);
            header('location:..\frontend\system\add-cardapio.php');
        }
        } else{
            // Por enquanto só morre, depois mostrar de forma mais amigável para o usuário
            die('Já existe um cardapio com as mesmas informações cadastradas');
        }
        break;
}

function pegaUltimoId($conexao){
    $query = $conexao->prepare("SELECT LAST_INSERT_ID()");
    $query->execute();
    return $query->fetch(PDO::FETCH_NUM);
}


?>
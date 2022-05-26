<?php

if (count($_POST) > 0) {

    $nome_produto = $_POST['nome_produto'];
    $categoria_produto = $_POST['categoria_produto'];
    $valor_produto = $_POST['valor_produto'];
    $foto_produto = $_POST['foto_produto'];
    $info_produto = $_POST[ 'info_produto'];

    try {
        include 'conexao_bd.php';

        //TODO pegar codigo do usuário logado

        $consulta = $conn->prepare('INSERT into produto (nome,categoria,valor,foto,info_adicional,codigo_usuario) VALUES(?,?,?,?,?,?)');
        $consulta->execute([$nome_produto, $categoria_produto, $valor_produto, $foto_produto, $info_produto, null]);
        $resultado_consulta['style'] = 'alert-success';
        $resultado_consulta['msg'] = 'Inserido com sucesso';

        


        
    } catch (PDOException $e) {
        // $e->getMessage();
        $resultado_consulta['style'] = 'alert-danger';
        $resultado_consulta['msg'] = 'Falha ao cadastrar item: ' . $e->getMessage();
    }

    $conn = null;
}



include 'produto.php';

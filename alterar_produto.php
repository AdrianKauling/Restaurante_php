<?php
    if (count($_POST) > 0) {

        $codigo_produto = $_POST['codigo_produto'];
        $nome_produto = $_POST['nome_produto'];
        $categoria_produto = $_POST['categoria_produto'];
        $valor_produto = $_POST['valor_produto'];
        $info_produto = $_POST[ 'info_produto'];

        try{

            include 'conexao_bd.php';

            //TODO pegar codigo do usuário logado

            $consulta = $conn->prepare("UPDATE produto SET nome=?,categoria=?,valor=?,info_adicional=?,data_hora=now() WHERE codigo=?");
            $consulta->execute([$nome_produto, $categoria_produto, $valor_produto, $info_produto, $codigo_produto]);
            $resultado_consulta['style'] = 'alert-success';
            $resultado_consulta['msg'] = 'Produto alterado com sucesso';

            $conn=null;

        }catch (PDOException $e) {
            // $e->getMessage();
            $resultado_consulta['style'] = 'alert-danger';
            $resultado_consulta['msg'] = 'Falha ao alterar produto: ' . $e->getMessage();
        }
    }
    header("Location: produto.php");

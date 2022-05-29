<?php

    try{
        $codigo = $_GET['codigo'];
        include 'conexao_bd.php';
        session_start();
        require_once('./produto/Produto.php');
        $resultado_busca = Produto::selecionar($conn,$codigo);
        $produtoRemovido = new Produto($resultado_busca[0]);
        $produtoRemovido->remover($conn);
        $resultado_consulta['style'] = 'alert-success';
        $resultado_consulta['msg'] = 'Produto removido com sucesso';

    }catch (PDOException $e) {
        // $e->getMessage();
        $resultado_consulta['style'] = 'alert-danger';
        $resultado_consulta['msg'] = 'Falha ao remover produto: ' . $e->getMessage();
    }
    finally{
        $conn = null;
        $_SESSION['resultado_consulta'] = $resultado_consulta;
    }

    header("Location: produto.php");

<?php
    if (count($_POST) > 0) {

        require_once('./produto/Produto.php');
        session_start();
        $produtoAlterado = new Produto($_POST);

        try{
            include 'conexao_bd.php';
            $produtoAlterado->atualizar($conn);
            $resultado_consulta['style'] = 'alert-success';
            $resultado_consulta['msg'] = 'Produto alterado com sucesso';
            $conn=null;
        }
        catch (PDOException $e) {
            $resultado_consulta['style'] = 'alert-danger';
            $resultado_consulta['msg'] = 'Falha ao alterar produto: ' . $e->getMessage();
        }
        finally{
            $conn = null;
            $_SESSION['resultado_consulta'] = $resultado_consulta;
        }
    }
    header("Location: produto.php");

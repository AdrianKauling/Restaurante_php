<?php

    try{
        include "conexao_bd.php";
        //Pegar os produtos armazenados no BD
        require_once('./produto/Produto.php');
        $produtos = Produto::selecionar($conn);
    }
    catch(PDOException $e) {
        // $e->getMessage();
        $resultado_consulta['style'] = 'alert-danger';
        $resultado_consulta['msg'] = 'Falha ao buscar item: ' . $e->getMessage();
        $_SESSION['resultado_consulta'] = $resultado_consulta;
    }
    finally{
        $conn = null;
        
    }
?>

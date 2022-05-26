<?php

    try{

        include 'conexao_bd.php';

        //TODO pegar codigo do usuário logado

        $consulta = $conn->prepare("UPDATE produto SET situacao='DESABILITADO' WHERE codigo=?");
        $consulta->execute([$_GET['cod_produto']]);
        $resultado_consulta['style'] = 'alert-success';
        $resultado_consulta['msg'] = 'Produto removido com sucesso';

        $conn=null;

    }catch (PDOException $e) {
        // $e->getMessage();
        $resultado_consulta['style'] = 'alert-danger';
        $resultado_consulta['msg'] = 'Falha ao remover produto: ' . $e->getMessage();
    }

    include "produto.php";

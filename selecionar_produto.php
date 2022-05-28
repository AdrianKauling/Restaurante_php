<?php

    try{
        include "conexao_bd.php";
        //Pegar os produtos armazenados no BD
        $where="";
        if(isset($cod_produto) && $cod_produto > 0){
            $where = "AND codigo = ". $cod_produto;
        }

        $consulta2 = $conn->prepare("SELECT * FROM produto WHERE situacao='HABILITADO'".$where);
        $consulta2->execute();

        $produtos = $consulta2->fetchAll(PDO::FETCH_ASSOC);
        // echo "<pre>";
        // print_r($resultado_consulta['produtos']);
        // echo "</pre>";
        
    }
    catch(PDOException $e) {
        // $e->getMessage();
        $resultado_consulta['style'] = 'alert-danger';
        $resultado_consulta['msg'] = 'Falha ao buscar item: ' . $e->getMessage();
    }
?>

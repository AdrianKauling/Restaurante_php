<?php
    if(count($_POST) > 0){
    
        $nome_produto = $_POST['nome_produto'];
        $qtd_produto = $_POST['qtd_produto'];
        $preco_produto = $_POST['preco_produto'];
        $obs_produto = $_POST['obs_produto'];

        try{
            include 'conexao_bd.php';

            $consulta = $conn->prepare('INSERT into item_pedido (nome_produto,quantidade,cod_usuario,preco_produto,observacao) VALUES(?,?,?,?,?)');
            $consulta->execute([$nome_produto,$qtd_produto,null,$preco_produto,$obs_produto]);
            $resultado_consulta['style'] = 'alert-success';
            $resultado_consulta['msg'] = 'Inserido com sucesso';
        }   
        catch(PDOException $e){
            // $e->getMessage();
            $resultado_consulta['style'] = 'alert-danger';
            $resultado_consulta['msg'] = 'Falha ao cadastrar item: '. $e->getMessage();
        }
    
    }

    include 'pedido.php';

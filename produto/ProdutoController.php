<?php
    require_once('./produto/Produto.php');
    class ProdutoController{

        function selecionar( $codigo=null){
            try{
                include './conexao_bd.php';
                return Produto::selecionar($conn,$codigo);
            }
            catch(PDOException $e) {
                session_start();
                $resultado_consulta['style'] = 'alert-danger';
                $resultado_consulta['msg'] = 'Falha ao buscar item: ' . $e->getMessage();
                $_SESSION['resultado_consulta'] = $resultado_consulta;
            }
            finally{
                $conn = null;
            }
            
        }

        function cadastrar($conexao,$valores){
            $novoProduto = new Produto($valores);
            $novoProduto->inserir($conexao);
        }
    }

?>
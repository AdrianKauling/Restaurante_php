<?php
    if(count($_POST) > 0){

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            include 'conexao_bd.php';
            
            $consulta = $conn->prepare('SELECT * FROM usuario WHERE email = :email and senha = md5(:senha)');
            $consulta->bindParam(':email',$email, PDO::PARAM_STR);
            $consulta->bindParam(':senha',$senha, PDO::PARAM_STR);
            $consulta->execute();

            $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
            
            if(count($result) == 0){
                $usuarioExiste['cod'] = 0;
                $usuarioExiste['msg'] = "Usuário não confere";
            }elseif(count($result) == 1){
                session_start();
                $_SESSION["nome_usuario"] = $result[0]["nome"];
                $_SESSION["nome_email"] = $result[0]["email"];
                $_SESSION["codigo_usuario"] = $result[0]["codigo"];
                header("Location: pedido.php");
            }else{
                echo 'verificar';
            }

        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        $conn = null;
    }

    include 'index.php';

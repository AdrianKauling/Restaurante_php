<?php 

    class Produto{
        private $codigo;
        private $nome;
        private $categoria;
        private $valor;
        private $foto;
        private $info_adicional;
        private $codigo_usuario;

        function __construct($valores){
            if(isset($valores['codigo'])){
                $this->codigo = $valores['codigo'];
            }
            $this->nome = $valores['nome'];
            $this->categoria = $valores['categoria'];
            $this->valor = $valores['valor'];
            $this->foto = $valores['foto'];
            $this->info_adicional = $valores['info_adicional'];
            $this->codigo_usuario = $_SESSION['codigo_usuario'];
        }

        function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        function inserir($conexao){
            $consulta = $conexao->prepare('INSERT into produto (nome,categoria,valor,foto,info_adicional,codigo_usuario) VALUES(?,?,?,?,?,?)');
            $consulta->execute([$this->nome, $this->categoria, $this->valor, $this->foto, $this->info_adicional, $this->codigo_usuario]);
        }

        function atualizar($conexao){
            $consulta = $conexao->prepare("UPDATE produto SET nome=?,categoria=?,valor=?,info_adicional=?,data_hora=now() WHERE codigo=?");
            $consulta->execute([$this->nome, $this->categoria, $this->valor, $this->info_adicional,$this->codigo]);
        }

        function remover($conexao){
            $consulta = $conexao->prepare("UPDATE produto SET situacao='DESABILITADO' WHERE codigo=?");
            $consulta->execute([$this->codigo]);
        }

        static function selecionar($conexao, $codigo=null){
            $where="";
            if(isset($codigo) && $codigo > 0){
                $where = "AND codigo = ". $codigo;
            }
            $consulta2 = $conexao->prepare("SELECT * FROM produto WHERE situacao='HABILITADO'".$where);
            $consulta2->execute();
            $produtos = $consulta2->fetchAll(PDO::FETCH_ASSOC);

            return $produtos;
        }
    }

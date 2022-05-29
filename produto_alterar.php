<?php session_start(); ?>
<?php if(isset($_SESSION['codigo_usuario'])): 
    require_once('./produto/ProdutoController.php');
    $produtoController = new ProdutoController();    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Alterar produto</h2>
        <?php 
            if(isset($_GET['codigo']) && $_GET['codigo'] > 0){
                $codigo = $_GET['codigo'];
                $produtos = $produtoController->selecionar($codigo);
            }
        ?>
        <form action="alterar_produto.php" method="POST" id="form_cadastro_produto">
            
            <div class="form-group">
                <label for="codigo_produto">Código do produto:</label>
                <input type="text" required  value="<?= $produtos[0]['codigo'];?>" class="form-control" id="codigo_produto" name="codigo" aria-describedby="nomeHelp" readonly placeholder="Digite o produto..">
            </div>
            <br>

            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" required  value="<?= $produtos[0]['nome'];?>" class="form-control" id="nome_produto" name="nome" aria-describedby="nomeHelp" placeholder="Digite o produto..">
            </div>
            <br>

            <div class="form-group">
                <label for="categoria_produto">Categoria:</label>
                <input type="text" required value="<?= $produtos[0]['categoria'];?>" class="form-control" id="categoria_produto" name="categoria" aria-describedby="nomeHelp" placeholder="Digite a categoria do produto..">
            </div>
            <br>

            <div class="form-group">
                <label for="valor_produto">Valor unitário (R$): </label>
                <input type="number" required value="<?= $produtos[0]['valor'];?>" step=".01" class="form-control" id="valor_produto" name="valor" aria-describedby="nomeHelp" placeholder="Digite o valor do produto..">
            </div>
            <br>

            <div class="form-group">
                <label for="foto_produto">Foto:</label>
                <input type="file" class="form-control" id="foto_produto" name="foto" aria-describedby="nomeHelp">
            </div>
            <br>

            <div class="form-group">
                <label for="info_produto">Informações adicionais:</label>
                <textarea id="info_produto" class="form-control" name="info_adicional" rows="4"><?= $produtos[0]['info_adicional'];?></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Alterar produto</button>
            <br>
            <br>
            <?php if (isset($resultado_consulta)) : ?>
                <div class="alert <?= $resultado_consulta['style'] ?>">
                    <?php echo $resultado_consulta['msg'] ?>
                </div>
            <?php endif; ?>


            <?php
                $produtos = $produtoController->selecionar();
            ?>

            <br>
            <?php if (count($produtos) > 0) : ?>
                <table style="background-color: #236B8E;" class="table">

                    <h4>Produtos cadastrados</h4>
                    <tr>
                        <th>Cód.</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Valor</th>
                        <th>Info adicional</th>
                        <th>Data hora</th>

                    </tr>


                    <?php foreach ($produtos as $p) : ?>
                        <tr>
                            <td><?= $p["codigo"] ?></td>
                            <td><?= $p["foto"] ?></td>
                            <td><?= $p["nome"] ?></td>
                            <td><?= $p["categoria"] ?></td>
                            <td><?= $p["valor"] ?></td>
                            <td><?= $p["info_adicional"] ?></td>
                            <td><?= $p["data_hora"] ?></td>
                            <td>
                            <a class="btn btn-outline-warning btn-sm" onclick="<?php ?>"  href="produto_alterar.php?codigo=<?= $p['codigo']; ?>">Alterar</a>
                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Deletar <?php echo $p['nome'] ?> ?')" href="produto_remover.php?codigo=<?= $p['codigo']; ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
<?php else: ?>

<h1>Você não está logado no sistema!</h1>

<?php endif; ?>
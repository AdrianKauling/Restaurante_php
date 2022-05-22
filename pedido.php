<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de pedidos 1.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Cadastro de pedidos</h2>
        <form action="cadastrar_pedido.php" method="POST" id="form_cadastro_pedido">
            <div class="form-group">
                <label for="nome_produto">Nome do produto</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" aria-describedby="nomeHelp" placeholder="Digite o produto..">
            </div>
            <br>

            <div class="form-group">
                <label for="obs_produto">Observações</label>
                <input type="text" class="form-control" id="obs_produto" name="obs_produto" aria-describedby="nomeHelp" placeholder="Ex: Sem queijo.">
            </div>
            <br>

            <div class="form-group">
                <label for="qtd_produto">Quantidade do produto</label>
                <input type="number" class="form-control" id="qtd_produto" name="qtd_produto" aria-describedby="qtdHelp" placeholder="Digite a quantidade..">
            </div>
            <br>

            <div class="form-group">
                <label for="qtd_produto">Preço do produto</label>
                <input type="text" class="form-control" id="preco_produto" name="preco_produto" aria-describedby="precoHelp" placeholder="Ex: 4.55">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Adicionar item</button>
            <br>
            <br>
            <?php if(isset($resultado_consulta)): ?>
                <div class="alert <?= $resultado_consulta['style']?>">
                    <?php echo $resultado_consulta['msg'] ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>
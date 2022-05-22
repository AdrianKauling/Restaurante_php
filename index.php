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
        <h2>Efetue login</h2>


        <form action="login.php" id="form_login" method="POST">

            <?php if (isset($usuarioExiste) && $usuarioExiste['cod'] == 0) : ?>
                <div class="alert alert-danger">
                    <?php echo $usuarioExiste['msg']; ?>
                </div>
            <?php endif; ?>


            <input type="email" id="email" name="email" placeholder="Digite seu email" /> <br> <br>
            <input type="password" id="senha" name="senha" placeholder="Digite sua senha" /><br> <br>
            <input type="submit" id="submeter" value="Entrar" class="btn btn-primary"/>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Cadastro</title>
</head>

<body>
    <div class="conteiner">
        <div class="row">
            <?php
            include "conexao.php";

            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $qtd = $_POST["qtd"];
            $cat_produto = $_POST["cat_produto"];

            $sql = "INSERT INTO `produto` (`id`, `nome`, `qtd`, `cat_produto`) VALUES ('$id', '$nome', '$qtd', '$cat_produto')";
            if (mysqli_query($conexao, $sql)) {
                mensagem("$nome cadastrado com sucesso!", 'sucess');
            } else
                mensagem("$nome não foi cadastrado", 'danger');

            ?>
            <a href="create.html" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</body>

</html>
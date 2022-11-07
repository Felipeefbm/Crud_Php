<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Cadastro de Fornecedor</title>
</head>

<body>
    <div class="conteiner">
        <div class="row">
            <?php
            include "conexao1.php";

            $cnpj = $_POST["cnpj"];
            $razao = $_POST["razao_social"];
        
            $sql = "INSERT INTO `fornecedor` (`cnpj`, `razao_social`) VALUES ('$cnpj', '$razao')";
            if (mysqli_query($conexao, $sql)) {
                mensagem("$cnpj cadastrado com sucesso!", 'sucess');
            } else
                mensagem("$cnpj não foi cadastrado", 'danger');

            ?>
            <a href="create1.html" class="btn btn-primary">Voltar</a>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Cadastro fornecedor</title>
</head>

<body>
    <?php
    include "conexao1.php"
    $cnpj = $_GET["cnpj"] ??'';
    $sql = "SELECT * FROM fornecedor WHERE cnpj = $cnpj";
    $dados = mysqli_query($conexao, $sql)
    ?>
    <div class="conteiner">
        <div class="row">
            <div class="collum">
                <h1>Cadastro de Fonecedor</h1>
                <form action="create_script1.php" method="post">
                    <div class="form-group">
                        <label for="cnpj"> cnpj </label>
                        <input name="cnpj" type="text" class="form-control" maxlength="14" placeholder="cnpj" value="<?php echo $linha['cnpj'];?>">
                    </div>
                    <div class="form-group">
                        <label for="razao"> razao social</label>
                        <input name="razao" type="text" class="form-control" placeholder="razao social" value="<?php echo $linha['razao'];?>">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="bin bin-sucess" value="Salvar Alterações"><br><br>
                        <a type="button" class="btn btn-info" href="hardware.php">Voltar ao inicio</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
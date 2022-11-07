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
    <?php
    include "conexao.php"
    $id = $_GET["id"] ??'';
    $sql = "SELECT * FROM produto WHERE id = $id";
    $dados = mysqli_query($conexao, $sql)
    ?>
    <div class="conteiner">
        <div class="row">
            <div class="collum">
                <h1>Cadastro</h1>
                <form action="create_script.php" method="post">
                    <div class="form-group">
                        <label for="id"> ID do produto</label>
                        <input name="id" type="text" class="form-control" maxlength="14" placeholder="id do produto" value="<?php echo $linha['id'];?>">
                    </div>
                    <div class="form-group">
                        <label for="nome"> Nome do produto</label>
                        <input name="nome" type="text" class="form-control" placeholder="nome do produto" value="<?php echo $linha['nome'];?>">
                    </div>
                    <div class="form-group">
                        <label for="qtd"> Quantidade</label>
                        <input name="qtd" type="number" class="form-control" placeholder="Quantidade do produto" value="<?php echo $linha['qtd'];?>">
                    </div>
                    <div class="form-group">
                        <label for="cat_produto"> categoria do produto</label>
                        <input name="cat_produto" type="text" class="form-control" placeholder="categoria do produto" value="<?php echo $linha['cat_produto'];?>">
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
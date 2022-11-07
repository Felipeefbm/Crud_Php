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
    $pesquisa = $_POST["busca"] ?? "";

    include "conexao.php ";

    $sql = "SELECT * FROM produto WHERE nome LIKE '%$pesquisa%'";

    $dados = mysqli_query($conexao, $sql);

    ?>
    <div class="conteiner">
        <div class="row">
            <div class="collum">
                <h1>Pesquisar</h1>
                <nav class="navbar bg-light">
                    <div class="container-fluid">
                        <form class="for-inline" action="pesquisa.php" method="POST">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="busca" autofocus>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Categoria do produto</th>
                            <th scope="col">Funções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $id = $linha["id"];
                            $nome = $linha["nome"];
                            $qtd = $linha["qtd"];
                            $cat_produto = $linha["cat_produto"];
                            echo "<tr>
                                <th scope='row'>$nome</th>
                                 <td>$qtd</td>
                                 <td>$cat_produto</td>
                                 <td width=150px><a href='create_edit.php?id-$id' class='btn btn-sucess btn-sm'>Editar</a>
                                    <a href='#' class='btn btn-danger btn-sm'>Excluir</a>
                                </td>
                            </tr>";
                        }
                        ?>

                    </tbody>
                </table>
                <a type="button" class="btn btn-info" href="hardware.php">Voltar ao inicio</a>
            </div>
        </div>
    </div>

</body>

</html>
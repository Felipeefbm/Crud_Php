<?php

require 'banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: indice.php");
}

if (!empty($_POST)) {

    $idErro = null;
    $nomeErro = null;
    $qtdErro = null;
    $cat_produtoErro = null;

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $qtd = $_POST['qtd'];
    $cat_produto = $_POST['cat_produto'];
    

    //Validação
    $validacao = true;
    if (empty($id)) {
        $idErro = 'Por favor digite o id!';
        $validacao = false;
    }

    if (empty($nome)) {
        $nomeErro = 'Por favor digite o nome!';
        $validacao = false;    }

    if (empty($qtd)) {
        $qtdErro = 'Por favor digite a quantidade!';
        $validacao = false;
    }

    if (empty($cat_produto)) {
        $cat_produtoErro = 'Por favor preenche o campo!';
        $validacao = false;
    }

    // update data
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE produto  set id = ?, nome = ?, qtd = ?, cat_produto = WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id, $nome, $qtd, $cat_produto));
        Banco::desconectar();
        header("Location: indice.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM produto where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $id = $data['id'];
    $nome = $data['nome'];
    $qtd = $data['qtd'];
    $cat_produto = $data['cat_produto'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- using new bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Atualizar id</title>
</head>

<body>
<div class="container">

    <div class="span10 offset1">
        <div class="card">
            <div class="card-header">
                <h3 class="well"> Atualizar id </h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="update.php?id=<?php echo $id ?>" method="post">

                    <div class="control-group <?php echo !empty($idErro) ? 'error' : ''; ?>">
                        <label class="control-label">Id</label>
                        <div class="controls">
                            <input name="nome" class="form-control" size="50" type="number" placeholder="id"
                                   value="<?php echo !empty($id) ? $id : ''; ?>">
                            <?php if (!empty($idErro)): ?>
                                <span class="text-danger"><?php echo $idErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($nomeErro) ? 'error' : ''; ?>">
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="Nome" class="form-control" size="80" type="text" placeholder="Nome"
                                   value="<?php echo !empty($nome) ? $nome : ''; ?>">
                            <?php if (!empty($nomeErro)): ?>
                                <span class="text-danger"><?php echo $nomeErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($qtdErro) ? 'error' : ''; ?>">
                        <label class="control-label">Quantidade</label>
                        <div class="controls">
                            <input name="quantidade" class="form-control" size="30" type="number" placeholder="Quantidade"
                                   value="<?php echo !empty($qtd) ? $qtd : ''; ?>">
                            <?php if (!empty($qtdErro)): ?>
                                <span class="text-danger"><?php echo $qtdErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="control-group <?php echo !empty($cat_produtoErro) ? 'error' : ''; ?>">
                        <label class="control-label">Categoria</label>
                        <div class="controls">
                            <div class="form-check">
                                <p class="form-check-label">
                                    <input class="form-check-input" type="radio" name="categoria" id="cat"
                                           value="PLACAS" <?php echo ($cat_produto == "PLACAS") ? "checked" : null; ?>/> Placas

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="categoria" id="cat"
                                       value="DEMAIS" <?php echo ($sexo == "DEMAIS") ? "checked" : null; ?>/> Demais
                            </div>
                            </p>
                            <?php if (!empty($cat_produtoErro)): ?>
                                <span class="text-danger"><?php echo $cat_produtoErro; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <br/>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
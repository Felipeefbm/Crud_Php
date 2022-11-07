<?php
require 'banco.php';

$id = 0;

if(!empty($_GET['cnpj']))
{
    $cnpj = $_REQUEST['cnpj'];
}

if(!empty($_POST))
{
    $cnpj = $_POST['cnpj'];

    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM fornecedor where cnpj = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($cnpj));
    Banco::desconectar();
    header("Location: indice.php");
}
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <title>Deletar Fornecedor</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir o fornecedor</h3>
                </div>
                <form class="form-horizontal" action="delete1.php" method="post">
                    <input type="hidden" name="cnpj" value="<?php echo $cnpj;?>" />
                    <div class="alert alert-danger"> Deseja excluir o cnpj?
                    </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="indice.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

    </html>
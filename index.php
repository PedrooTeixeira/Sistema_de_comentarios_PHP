<?php
require "mensagens.php";
$msg = new mensagens();
?>
<!doctype html>
<html>
<head>
    <title>Sistema de Comentários</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <!--validação-->
    <?php
    if(isset($_POST['nome'])&& empty($_POST['nome'])==false){
        $nome = addslashes($_POST['nome']);
        $mensagem = addslashes($_POST['mensagem']);

        $msg->inserirMsg($nome,$mensagem);
    }
    ?>

    <!--Formulário-->
    <form method="post" class="text-center border border-light p-5">
        <p class="h4 mb-4">Sistema de Comentários</p>
        <!-- Nome -->
        <input type="text" name="nome"  class="form-control mb-4" placeholder="Nome" required>
        <!-- Mensagem -->
        <div class="form-group">
            <textarea name="mensagem" maxlength="200" class="form-control rounded-0"  rows="3" placeholder="Mensagem"required></textarea>
        </div>
        <!-- Botão -->
        <button class="btn btn-info btn-block" type="submit">Enviar Comentário</button>
    </form>
<br><br>

    <!--chama a função de contar comentários do banco-->
    <p class="lead">Total de comentários <?= $msg->contarMensagens() ?></p>

<?php foreach($msg->listarMsg() as $mensagem) {
    ?>
    <!--comentarios-->
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?= $mensagem['nome'] ?></h5>

                <small><?= $mensagem['data_msg'] ?></small>
            </div>
            <p class="mb-1"><?= $mensagem['msg'] ?></p>
        </a>
    </div>
    <br>
    <?php
}
    ?>

</div>
</body>
</html>

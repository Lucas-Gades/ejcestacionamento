<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!--Tags básicas do head-->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arrays em PHP</title>
    <!--Link dos nossos arquivos CSS e JS padrão-->
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="js/scripts.js"></script>
    <!--Link dos arquivos CSS e JS do Bootstrap-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body id="bodyindex">

    <?php

    include "box.php";

    include_once "boxDAO.php";

    include_once "usuarioDAO.php";

    $con = Conexao::getConexao();

    session_start();



    $_SESSION["logado"] = false;

    if (isset($_POST["entrar"])) {
        $usuario = $_POST["txtUsuario"];
        $senha = $_POST["txtSenha"];

        if (UsuarioDAO::logar($usuario, $senha)) {
            $_SESSION["logado"] = true;
            session_cache_expire(10);
            header("Location: listagem.php");
        }
    }



    ?>

    <div class="container">
      

        <div class=" d-flex justify-content-center  ">

            <div class="card">

                <img src='img/carro.png' style='height:30%; width:60%; margin-left:75px;'>

                <div class="card-header">
                    <h3>Login</h3>
                    <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="index.php">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type='text' name="txtUsuario" value="" class="form-control" placeholder="username">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type='password' name="txtSenha" value="" class="form-control" placeholder="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="entrar" name="entrar" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
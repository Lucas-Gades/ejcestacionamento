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

<body id="cadastrobody">
    <?php
    include_once "box.php";
    include_once "boxDAO.php";
    include_once "imagem.php";

    session_start();

    if (isset($_SESSION["logado"])) {
        if ($_SESSION["logado"] == false) {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }


    if (!isset($_SESSION["modo"])) {
        $_SESSION["modo"] = 1;
    }




    $box = "";
    $nome = "";
    $endereco = "";
    $numero = "";
    $bairro = "";
    $fone = "";
    $automovel = "";
    $placa = "";
    $foto = "semfoto.jpg";



    if (isset($_POST["botaoAcao"])) {
        if ($_POST["botaoAcao"] == "Gravar") {
            $boxs = $_POST["box"];
            $nome = $_POST["nome"];
            $endereco = $_POST["endereco"];
            $numero = $_POST["numero"];
            $bairro = $_POST["bairro"];
            $fone = $_POST["fone"];
            $automovel = $_POST["automovel"];
            $placa = $_POST["placa"];
            $arquivo = $_FILES["fileFoto"];
            if($arquivo!="" && $arquivo!=null)
            $foto = Imagem::uploadImagem($arquivo, 2000, 2000, 5000, "img/"); 
            else
            $foto = "";


            $pAux = new Box(
                $boxs,
                $foto,
                $nome,
                $endereco,
                $numero,
                $bairro,
                $fone,
                $automovel,
                $placa
            );
            if($_SESSION["modo"]==1)
            BoxDAO::inserir($pAux);
            else
            BoxDAO::atualizar($pAux);
    } else if($_POST["botaoAcao"]=="Excluir"){
       BoxDAO::excluir($_POST["box"]);
    }


        if (isset($_POST["botaoAcao"])) {
            if ($_POST["botaoAcao"] == "Excluir" || $_POST["botaoAcao"] == "Limpar") {
                $_SESSION["modo"] = 1; //insercao
            } else if ($_POST["botaoAcao"] == "Cancelar") {
                header("Location: listagem.php");
            } else {
                $_SESSION["modo"] = 2; //atualização
            }
        }
    }


    if (isset($_POST["selBox"])) {
        $box = BoxDAO::getBox($_POST["selBox"]);
        $boxs = $box->getBox();
        $nome = $box->getNome();
        $endereco = $box->getEndereco();
        $numero = $box->getNumero();
        $bairro = $box->getBairro();
        $fone = $box->getFone();
        $automovel = $box->getAutomovel();
        $placa = $box->getPlaca();
        $foto = $box->getFoto();

        if($foto==null){
            $foto = "semfoto.jpg";
        }else{
           $foto ;

        }
      
        $_SESSION["modo"] = 2;
    }else {
        $_SESSION["modo"] = 1;

    }



    ?>



    <div class="container">
        <div clas="row ">

            <form method="post" action="cadastro.php" enctype="multipart/form-data">

                 <div class="form-row">
                    <div class="col-md-12" id="topformulario">
                        <h1>EJC . Estacionamento</h1>
                    </div>
                 </div>
                
                <div class="form-row" id="formulario">
                 
                    <div class="col-md-12 ">
                        <img src="img/<?php echo $foto; ?>" style="width:30%; height:50p%; ">
                    </div>
                  
                    <div class="col-md-8 ">
                        <input type="file" name="fileFoto">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputBox">Box</label>
                        <input type="number" class="form-control" name="box" value="<?php echo $boxs; ?>" id="inputNumber" placeholder="Box" min="1" max="100">
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="inputNome">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>" id="inputNome" placeholder="Nome">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputEndereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $endereco; ?>" id="inputEndereco" placeholder="Rua">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputNumero">Número</label>
                        <input type="number" class="form-control" name="numero" value="<?php echo $numero; ?>" id="inputNumeroEndereco" placeholder="Número" min="1">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputUsuario">Bairro</label>
                        <input type="text" class="form-control" value="<?php echo $bairro; ?>" name="bairro" id="inputUsuario" placeholder="Bairro">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="inputFone">Fone</label>
                        <input type="text" class="form-control" value="<?php echo $fone; ?>" name="fone" id="inputFone" placeholder="Fone">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputAutomovel">Automóvel</label>
                        <input type="text" class="form-control" name="automovel" value="<?php echo $automovel; ?>" id="inputAutomóvel" placeholder="Automóvel">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPlaca">Placa</label>
                        <input type="text" class="form-control" name="placa" value="<?php echo $placa; ?>" id="inputPlaca" placeholder="Placa">
                    </div>
                    <div class="col-md-2 offset-md-2">

                        <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success" />
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="botaoAcao" value="Excluir" class="btn btn-danger" />
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="botaoAcao" value="Cancelar" class="btn btn-warning" />
                    </div>
                    <div class="col-md-2">
                        <input type="submit" name="botaoAcao" value="Limpar" class="btn btn-primary" />
                    </div>

                </div>

            </form>



        </div>






</body>
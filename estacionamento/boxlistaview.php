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

<?php

    class BoxListaView{

        public static function geraLista($boxLista){
            
   
            echo "
            <form action='cadastro.php' method='post'>
                <div class='row' style='background-color: rgba(0, 0, 0,1.0); color:#FFFFFF;'>
                    <div class='col-md-1'>
                     FOTO
                    </div>
                    <div class='col-md-1' style='background-color: rgba(0, 0, 0,0.5); color: white;border: 2px solid black;'>
                     BOX
                    </div>
                    <div class='col-md-2' style='background-color: rgba(0, 0, 0,0.5); color: white;border: 2px solid black;'>
                    NOME
                    </div>
                    <div class='col-md-2' style='background-color: rgba(0, 0, 0,0.5); color: white;border: 2px solid black;'>
                    FONE
                    </div>
                    <div class='col-md-2' style='background-color: rgba(0, 0, 0,0.5); color: white;border: 2px solid black;'>
                    VEICULO
                    </div>
                    <div class='col-md-2' style='background-color: rgba(0, 0, 0,0.5); color: white;border: 2px solid black;'>
                     PLACA  
                    </div>
                    
                </div>
            ";
            $cont = 0;
            

                foreach($boxLista as $box){
                 $cont++;
                    $cor = "#BBBBBB";
                    if($cont%2 == 0){
                        $cor = "#DDDDDD";
                    }
                    $boxs = $box ->getBox();
                    $foto = $box->getFoto();
                    $nome = $box -> getNome();
                    
                    $fone = $box->getFone();
                    $automovel = $box->getAutomovel();
                    $placa = $box->getPlaca();
                    if($foto==null){
                        $foto = "semfoto.jpg";
                    }else{
                       $foto ;

                    }
                 
                                          

                    echo "
                        <div class='row' style='background-color: $cor; border: 1px solid black;background-color:yellow;'>
                            <div class='col-md-1 semEspaco' style='padding-left: 0 !important; padding-right: 0 !important;height: 150px;  !important; '>
                                <button class='btn' type='submit' name='selBox' value= $boxs style='height:100%; width:100%; padding:0px!important;'>
                                <img src= 'img/$foto' style='height:100%; width:100%;border: 1px solid black;'>
                                </button> 
                            </div>
                            <div class='col-md-1' style='display:flex; align-items:center; justify-content: center;background-color: rgba(39, 28, 109,0.5);border: 1px solid black;'>
                               <button class='btn' type='submit'name='selBox'value= $boxs style='font-size:20px;background-color:transparent;'>   
                                <b>$boxs</b>
                               </button> 
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center;border: 1px solid black;'>
                            
                            <b>$nome</b>
                            
                            </div>
                            
                            <div class='col-md-2' style='display:flex; align-items:center;border: 1px solid black;font-family:helvetica;'>
                                $fone
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center; text-align: center;border: 1px solid black;font-family:helvetica;'>
                            $automovel
                            </div>
                            <div class='col-md-2' style='display:flex; align-items:center; border: 1px solid black;font-family:helvetica; >
                            <img src= 'img/placa.jpg' style='height:30%; width:60%;margin-left:0px;'>
                            $placa
                             </div>
                            <div class='col-md-1'style='display:flex; align-items:center; border: 1px solid black;'>
                                <button class='btn' type='submit' name='delBox' value= $boxs style='height:100%; background-color:transparent;'>
                                    <img src= 'img/delete.png' style='height:30%; width:60%;margin-left:0px;'>
                                    
                                </button> 
                            </div>
                            <div class='col-md-1'style='display:flex; align-items:center; border: 1px solid black;'>
                                <button class='btn' type='submit' name='selBox' value= $boxs style='height:100%;background-color:transparent;'>
                                    <img src= 'img/edit.png' style='height:30%; width:60%;'>
                                  
                                </button> 
                            </div>

                        </div>
                    ";
                     
                }
                echo "</form>";

        }

    
    }

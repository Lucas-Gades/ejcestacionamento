<?php
    include "conexao.php";

    class BoxDAO{
        
        //Básico de uma classe DAO
        //inserir
        //atualizar
        //excluir

        public static function inserir($box){
            $con = Conexao::getConexao();
            $sql = $con-> 
            prepare("insert into boxs values (?,?,?,?,?,?,?,?,?)");
        
            $boxs = $box ->getBox();
            $foto = $box->getFoto();
            $nome = $box -> getNome();
            $endereco = $box->getEndereco();
            $numero = $box->getNumero();
            $bairro = $box ->getBairro();
            $fone = $box->getFone();
            $automovel = $box->getAutomovel();
            $placa = $box->getPlaca();
            
            $sql->bindParam(1, $boxs);
            $sql->bindParam(2, $nome);
            $sql->bindParam(3, $endereco);
            $sql->bindParam(4, $numero);
            $sql->bindParam(5, $bairro);
            $sql->bindParam(6, $fone);
            $sql->bindParam(7, $automovel);
            $sql->bindParam(8, $placa);
            $sql->bindParam(9, $foto);
   
            
            $sql->execute();
        }

        //Quero que o excluir possa funcionar de 3 formas:
            //Recebendo um pokemon
            //Recebendo o nome do pokemon
            //Recebendo o código do pokemon
        public static function excluir($box){
            $con = Conexao::getConexao();
           
            $sql = null;
            if(is_numeric($box)){
                
                $sql=$con->prepare("delete from boxs where box = ?");
               
                $sql->bindParam(1, $box);

            } else if($box==null){
                $sql=$con->prepare("delete from boxs where placa = ?");
                $sql->bindParam(1, $placa);
            }else {
                $nome = $box->getNome();
                $sql=$con->prepare("delete from boxs where nome = ?");
                $sql->bindParam(1, $nome);
            }
            $sql->execute();  
        }

        public static function atualizar($boxs){
            $con = Conexao::getConexao();

            $box = $boxs ->getBox();
            $foto = $boxs->getFoto();
            $nome = $boxs -> getNome();
            $endereco = $boxs->getEndereco();
            $numero = $boxs->getNumero();
            $bairro = $boxs ->getBairro();
            $fone = $boxs->getFone();
            $automovel = $boxs->getAutomovel();
            $placa = $boxs->getPlaca();
            

            if($box>0){
                $sql = $con->prepare("update boxs set box=?,nome=?, endereco=?,numero=?, bairro=?, fone=?, automovel=? , placa=? , foto=? where box=? ");
                $sql->bindParam(10, $box);
            } else {
                $sql = $con->prepare("update boxs set box=?,nome=?, endereco=?,numero=?, bairro=?, fone=?, automovel=? , placa=? , foto=? where nome=? ");
                $sql->bindParam(10, $nome);
            }
            $sql->bindParam(1, $box);
            $sql->bindParam(2, $nome);
            $sql->bindParam(3, $endereco);
            $sql->bindParam(4, $numero);
            $sql->bindParam(5, $bairro);
            $sql->bindParam(6, $fone);
            $sql->bindParam(7, $automovel);
            $sql->bindParam(8, $placa);
            $sql->bindParam(9, $foto);
   
            

            $sql->execute();
            
        }

        //Ao dar um get pokemon (localizando o pokemon no banco e devolvendo uma instancia)
        //queremos que se possa usar ou o código ou o nome
        public static function getBox($identificacao){
            $con = Conexao::getConexao();
            $sql = null;

            if(is_numeric($identificacao)){
                $sql = $con->prepare("select * from boxs where box=?");
                $sql->bindParam(1, $identificacao);
            } else {
                $sql = $con->prepare("select * from boxs where nome=?");
                $sql->bindParam(1, $identificacao);
            }

            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $box = null;
            if($registro = $sql->fetch()){
                $box = new Box(
                    $registro["box"],
                    $registro["foto"],
                    $registro["nome"],
                    $registro["endereco"],
                    $registro["numero"],
                    $registro["bairro"],
                    $registro["fone"],
                    $registro["automovel"],
                    $registro["placa"]
                );
            }

            return $box;

        }


        public static function getBoxs($campo, $ordem, $operador, $valor){
            $con = Conexao::getConexao();

            if($operador=="")
                $sql = $con->prepare("select * from boxs order by $campo $ordem");
            else{
                $sql = $con->prepare("select * from boxs where $campo $operador ? order by $campo $ordem");
                $sql->bindParam(1, $valor);
            }
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();

            $boxLista = array();

            while($registro = $sql->fetch()){
                $boxs = new Box(
                    $registro["box"],
                    $registro["foto"],
                    $registro["nome"],
                    $registro["endereco"],
                    $registro["numero"],
                    $registro["bairro"],
                    $registro["fone"],
                    $registro["automovel"],
                    $registro["placa"],
                );
                $boxLista[] = $boxs;
            }

            return $boxLista;
        }



    }

?>
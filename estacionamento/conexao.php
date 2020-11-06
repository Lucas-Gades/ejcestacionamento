<?php
    class Conexao{
        public static $conexao;

        public static function getConexao(){
            $stringConexao = "mysql:host=sql213.epizy.com;port=3306;dbname=epiz_27126592_estacionamento";
            $usuario = "epiz_27126592";
            $senha = "Y1XpaEs1xEZ";

            if(!isset(self::$conexao)){

                try{
                    self::$conexao = new PDO($stringConexao, $usuario, $senha);
                 
                } catch(PDOException $e){
                    //posso mostrar mensagens personalizadas de erro
                    //1044: usuário
                    //1045: senha
                    //2002: host
                }
            }

           
            return self::$conexao;
        }


    }



?>
<?php
    class Box{
        //PRIMEIRO: ATRIBUTOS (CARACTERISTICAS = VARIAVEIS)
        private $box;
        private $foto;
        private $nome;
        private $endereco;
        private $numero;
        private $bairro;
        private $fone;
        private $automovel;
        private $placa;

        //SEGUNDO: MÉTODOS (AÇÕES = FUNCTIONS)

        //CONSTRUTOR: método que diz como um novo objeto da classe deve ser construido
        public function __construct($box,$foto, $nome, $endereco, $numero, $bairro, $fone, $automovel, $placa){
            $this->box = $box;
            $this->foto=$foto;
            $this->nome = $nome;
            $this->endereco = $endereco;
            $this->numero= $numero;
            $this->bairro = $bairro;
            $this->fone = $fone;
            $this->automovel= $automovel;
            $this->placa = $placa;
        }

        //GETTERS: métodos que devolvem o valor de um atributo
        public function getBox(){
            return $this->box;
        }

        public function getFoto(){
            return $this->foto;
        }
        
        public function getNome(){
            return $this->nome;
        }

        public function getEndereco(){
            return $this->endereco;
            
        }
        public function getNumero(){
            return $this->numero;
        }
        public function getBairro(){
            return $this->bairro;
        }

        public function getFone(){
            return $this->fone;
        }
        public function getAutomovel(){
            return $this->automovel;
        }

        public function getPlaca(){
            return $this->placa;
        }

      //SETTERS: métodos que permitem alterar o valor de um atributo
         public function setBox($novobox){
        $this->box = $novobox;
    }

    
        public function setFoto($novafoto){
        $this->foto = $novafoto;
    }
        public function setNome($novonome){
            $this->nome = $novonome;
        }

        public function setEndereco($novoendereco){
            $this->numero = $novoendereco;
        }

        public function setNumero($novonumero){
            $this->endereco = $novonumero;
        }

        public function setBairro($novobairro){
            $this->bairro = $novobairro;
        }

        public function setFone($novofone){
            $this->fone = $novofone;
        }
        public function setAutomovel($novoautomovel){
            $this->fone = $novoautomovel;
        }
        public function setPlaca($novaplaca){
            $this->placa = $novaplaca;
        }
      
        //TOSTRING: método que retorna o objeto em forma de um texto
        public function __toString(){
            $texto = "";
            $texto = $texto . "box:" . $this->box . "<br>";
            $texto = $texto . "nome:" . $this->nome . "<br>";
            $texto = $texto . "endereco:" . $this->endereco . "<br>";
            $texto = $texto . "numero:" . $this->numero . "<br>";
            $texto = $texto . "bairro:" . $this->bairro . "<br>";
            $texto = $texto . "fone:" . $this->fone . "<br>";
            $texto = $texto . "automovel:" . $this->automovel . "<br>";
            $texto = $texto . "placa:" . $this->placa . "<br>";

            return $texto;
        }

        //MÉTODOS ESPECIAIS: qualquer método que não seja construct, get, set ou toString

    }


?>
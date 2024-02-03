<?php 
    class Mensagem{
        private $para=null;
        private $assunto=null;
        
        private $mensagem=null;

        public function __get($attr){
           return  $this->$attr;
        }
        public function __set($attr, $value){
            $this->$attr=$value;
        }
        public function mensagemValida(){
            if(empty($this->para)||empty($this->assunto)||empty($this->mensagem)){
                return false;
            }
            return true;
        }
}
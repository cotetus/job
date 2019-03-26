<?php
require_once 'model/indexClass.php';

class userController{
    
    private $acervo;
    private $imagems_acervo;
    private $exposicao;
    private $imagems_expo;
    private $categoria;
    private $usuario;
    
    
    public function __CONSTRUCT(){
        $this->acervo = new Acervo();
        $this->imagems_acervo = new Imagems_acervo();
        $this->exposicao = new Exposicao();
        $this->imagems_expo = new Imagems_expo();
        $this->categoria = new Categoria();
        $this->usuario = new Usuario();
    }
    
    public function Index(){

        require_once 'view/user/en/index.php';
    }


}
<?php
require_once '../../model/indexClass.php';

class acervoController{
    
    private $model;
    private $categoria;
    private $usuario;
    
    
    public function __CONSTRUCT(){
        $this->model = new Acervo();
        $this->categoria = new Categoria();
        $this->usuario = new Usuario();
    }
    
    public function Index(){
        require_once 'head.php';
        require_once 'acervo/listAcervo.php';
        require_once 'footer.php';
    }

    public function agregar(){
        require_once 'head.php';
        require_once 'acervo/insert.php';
        require_once 'footer.php';
    }
    
    public function editar(){
        if(isset($_REQUEST['id'])){
            $acer = Acervo::listOne($_REQUEST['id']);
            $id = $acer['id_user'];
            $user = Usuario::listOne($id);
            $id2 = $acer['id_categoria'];
            $categ = Categoria::listOne($id2);

        }

        require_once 'head.php';
        require_once 'acervo/acervo-editar.php';
        require_once 'footer.php';
     
    }


    
    public function Guardar(){
        
        $id = $_REQUEST['id'];
        $nome_peca = $_REQUEST['nome_peca'];
        $descricao = $_REQUEST['descricao'];
        $data_catalogada = $_REQUEST['data_catalogada'];
        $periodo = $_REQUEST['periodo'];
        $id_user = $_REQUEST['id_user'];
        $id_categoria = $_REQUEST['id_categoria'];

  
        $insert = Acervo::save($nome_peca, $id_user, $id_categoria, $data_catalogada, $descricao, $periodo, $id);

        
        if (isset($insert)) {
        header('Location: index.php?c=acervo&a=Index');
        }

        
    }
    
    public function Eliminar(){
        $id = $_REQUEST["id"];
        $delete = Acervo::delete($id);
        if (isset($delete)) {
            header('Location: index.php?c=acervo&a=Index');
        }else{
            echo "error";

        }
        
        
        
      
    }
}
<?php
require_once '../../model/indexClass.php';

class categoriaController{
    
    private $model;

    
    
    public function __CONSTRUCT(){
        $this->model = new Categoria();

    }
    
    public function Index(){
        require_once 'head.php';
        require_once 'categoria/listCategoria.php';
        require_once 'footer.php';
    }

    public function agregar(){
        require_once 'head.php';
        require_once 'categoria/insert.php';
        require_once 'footer.php';
    }
    
    public function editar(){
        if(isset($_REQUEST['id'])){
            $categoria = Categoria::listOne($_REQUEST['id']);

        }

        require_once 'head.php';
        require_once 'categoria/categoria-editar.php';
        require_once 'footer.php';
     
    }


    
    public function Guardar(){
        
        $id = $_REQUEST['id'];
        $nome = $_REQUEST['nome'];

        $insert = Categoria::save($nome, $id);

        
        if (isset($insert)) {
        header('Location: index.php?c=categoria&a=Index');
        }

    }
    
    public function Eliminar(){
        $id = $_REQUEST["id"];
        $delete = Categoria::delete($id);
        if (isset($delete)) {
            header('Location: index.php?c=categoria&a=Index');
        }else{
            echo "error";

        }
        
        
        
      
    }
}
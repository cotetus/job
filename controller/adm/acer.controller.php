<?php
require_once '../../model/indexClass.php';

class acerController{
    
    private $model;
    
    
    public function __CONSTRUCT(){
        $this->model = new Acervo();
    }
    
    public function Index(){
        require_once 'head.php';
        require_once 'acer/listAcervo.php';
        require_once 'footer.php';
    }

    public function agregar(){
        require_once 'head.php';
        require_once 'acer/insert.php';
        require_once 'footer.php';
    }
    
    public function Crud(){
        if(isset($_REQUEST['id'])){
            $acer = Acervo::listOne($_REQUEST['id']);
            $id = $acer['id_user'];
            $user = Usuario::listOne($id);
            $id2 = $acer['id_categoria'];
            $categ = Categoria::listOne($id2);

        }

        require_once 'view/adm/header.php';
        require_once 'view/adm/acer/acer-editar.php';
        require_once 'view/adm/footer.php';
     
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
        header('Location: index.php?c=acer&a=Index');
        }

        
    }
    
    public function Eliminar(){
        $id = $_REQUEST["id"];
        $delete = Acervo::delete($id);
        if (isset($delete)) {
            header('Location: index.php?c=acer&a=Index');
        }else{
            echo "error";

        }
        
        
        
      
    }
}
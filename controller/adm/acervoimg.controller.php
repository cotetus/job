<?php
require_once '../../model/indexClass.php';

class acervoimgController{
    
    private $model;
    private $acervo;

    
    
    public function __CONSTRUCT(){
        $this->model = new Imagems_acervo();
        $this->acervo = new Acervo();

    }
    
    public function Index(){
        require_once 'head.php';
        require_once 'acervoimg/listAcervoimg.php';
        require_once 'footer.php';
    }

    public function agregar(){
        require_once 'head.php';
        require_once 'acervoimg/insert.php';
        require_once 'footer.php';
    }
    
    public function editar(){
        if(isset($_REQUEST['id'])){
            $acervoimg = Imagems_acervo::listOne($_REQUEST['id']);
            $id = $acervoimg['id_aservo'];
            $acervo = Acervo::listOne($id);

        }

        require_once 'head.php';
        require_once 'acervoimg/acervoimg-editar.php';
        require_once 'footer.php';
     
    }


    
    public function Guardar(){
        
        $id = $_REQUEST['id'];
        $nome = $_REQUEST['nome'];
        $id_aservo = $_REQUEST['id_aservo'];
               if(isset($_FILES["imagem"])){
       $direction ="../../assets/img/acervo/";
       $nameimg = $_FILES["imagem"]["name"];
       $nameTemp = $_FILES["imagem"]["tmp_name"];
       move_uploaded_file($nameTemp,$direction.$nameimg);
   }
       $imagem = $nameimg;


        $insert = Imagems_acervo::save($nome, $id_aservo, $imagem, $id);

        
        if (isset($insert)) {
        header('Location: index.php?c=acervoimg&a=Index');
        }

    }
    
    public function Eliminar(){
        $id = $_REQUEST["id"];
        $delete = Categoria::delete($id);
        if (isset($delete)) {
            header('Location: index.php?c=acervoimg&a=Index');
        }else{
            echo "error";

        }
        
        
        
      
    }
}
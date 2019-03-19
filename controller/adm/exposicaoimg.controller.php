<?php
require_once '../../model/indexClass.php';

class exposicaoimgController{
    
    private $model;
    private $exposicao;

    
    
    public function __CONSTRUCT(){
        $this->model = new Imagems_expo();
        $this->exposicao = new Exposicao();

    }
    
    public function Index(){
        require_once 'head.php';
        require_once 'exposicaoimg/listExposicaoimg.php';
        require_once 'footer.php';
    }

    public function agregar(){
        require_once 'head.php';
        require_once 'exposicaoimg/insert.php';
        require_once 'footer.php';
    }
    
    public function editar(){
        if(isset($_REQUEST['id'])){
            $exposicaoimg = Imagems_expo::listOne($_REQUEST['id']);
            $id = $exposicaoimg['id_exposicao'];
            $acervo = Acervo::listOne($id);

        }

        require_once 'head.php';
        require_once 'exposicaoimg/exposicaoimg-editar.php';
        require_once 'footer.php';
     
    }


    
    public function Guardar(){
        
        $id = $_REQUEST['id'];
        $nome = $_REQUEST['nome'];
        $id_aservo = $_REQUEST['id_exposicao'];
               if(isset($_FILES["imagem"])){
       $direction ="../../assets/img/exposicao/";
       $nameimg = $_FILES["imagem"]["name"];
       $nameTemp = $_FILES["imagem"]["tmp_name"];
       move_uploaded_file($nameTemp,$direction.$nameimg);
   }
       $imagem = $nameimg;


        $insert = Imagems_expo::save($nome, $id_exposicao, $imagem, $id);

        
        if (isset($insert)) {
        header('Location: index.php?c=exposicaoimg&a=Index');
        }

    }
    
    public function Eliminar(){
        $id = $_REQUEST["id"];
        $delete = Imagems_expo::delete($id);
        if (isset($delete)) {
            header('Location: index.php?c=exposicaoimg&a=Index');
        }else{
            echo "error";

        }
        
        
        
      
    }
}
<?php
require_once '../../model/indexClass.php';

class exposicaoController{
    
    private $model;

    
    
    public function __CONSTRUCT(){
        $this->model = new Exposicao();

    }
    
    public function Index(){
        require_once 'head.php';
        require_once 'exposicao/listExposicao.php';
        require_once 'footer.php';
    }

    public function agregar(){
        require_once 'head.php';
        require_once 'exposicao/insert.php';
        require_once 'footer.php';
    }
    
    public function editar(){
        if(isset($_REQUEST['id'])){
            $exposicao = Exposicao::listOne($_REQUEST['id']);


        }

        require_once 'view/adm/head.php';
        require_once 'view/adm/exposicao/exposicao-editar.php';
        require_once 'view/adm/footer.php';
     
    }


    
    public function Guardar(){
        
        $id = $_REQUEST['id'];
        $nome = $_REQUEST['nome'];
        $nome_ES = $_REQUEST['nome_ES'];
        $descricao = $_REQUEST['descricao'];
        $descricao_ES = $_REQUEST['descricao_ES'];
        $local = $_REQUEST['local'];
        $data_inicio = $_REQUEST['data_inicio'];
        $data_final = $_REQUEST['data_final'];
        
       if(isset($_FILES["banner"])){
       $direction ="../../assets/img/exposicao/banner/";
       $namebanner = $_FILES["banner"]["name"];
       $nameTemp = $_FILES["banner"]["tmp_name"];
       move_uploaded_file($nameTemp,$direction.$namebanner);
   }
       $banner = $namebanner;

  
        $insert = Exposicao::save($nome, $nome_ES, $banner, $data_final, $data_inicio, $descricao, $descricao_ES, $local, $id);

        
        if (isset($insert)) {
        header('Location: index.php?c=exposicao&a=Index');
        }

        
    }
    
    public function Eliminar(){
        $id = $_REQUEST["id"];
        $delete = Exposicao::delete($id);
        if (isset($delete)) {
            header('Location: index.php?c=exposicao&a=Index');
        }else{
            echo "error";

        }
        
        
        
      
    }
}
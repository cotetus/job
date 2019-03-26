<?php

 class Imagems_acervo {
   
   private $id;
   private $nome;
   private $nome_ES;
   private $imagem;
   private $id_aservo;

   const TABLA = 'imagems_acervo';
   
   public function getId() {
      return $this->id;
   }
   public function getNome() {
      return $this->nome;
   }
   public function getNome_ES() {
      return $this->nome_ES;
   }
   public function getImagem() {
      return $this->imagem;
   }
   public function getId_aservo() {
      return $this->id_aservo;
   }


   public function setNome($nome) {
      $this->nome = $nome;
   }
   public function setNome_ES($nome_ES) {
      $this->nome_ES = $nome_ES;
   }
   public function setImagem($imagem) {
      $this->imagem = $imagem;
   }
   public function setId_aservo($id_aservo) {
      $this->artista = $id_aservo;
   }
   
   
   public function save($nome, $nome_ES, $imagem, $id_aservo, $id){
      $conexion = new Conexion();
      if($id) { //Modifica toda una linea, mediante el id.

         $sql = $conexion->prepare('UPDATE ' . self::TABLA .' SET nome = :nome, nome_ES = :nome_ES,  imagem = :imagem, id_aservo = :id_aservo WHERE id = :id');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':nome_ES', $nome_ES, PDO::PARAM_STR);
         $sql->bindParam(':imagem', $imagem);
         $sql->bindParam(':id_aservo', $id_aservo);
         $sql->bindParam(':id', $id);
         $sql->execute();
      }else {  //Inserta un nuevo espectaculo.
         $sql = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome, nome_ES, imagem,  id_aservo) VALUES(:nome, :imagem, :id_aservo)');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':nome_ES', $nome_ES, PDO::PARAM_STR);
         $sql->bindParam(':imagem', $imagem);
         $sql->bindParam(':id_aservo', $id_aservo);
         $id = $conexion->lastInsertId();
         $sql->execute();
      }
      return $sql;
   }
   public static function listOne($id){//Retorna nombre, descri.. por el id.
    
       $conexion = new Conexion();
       $sql = $conexion->prepare('SELECT nome, nome_ES, imagem, id_aservo FROM ' . self::TABLA . ' WHERE id = :id');
       $sql->bindParam(':id', $id);
       $sql->execute();
       $reg = $sql->fetch(); //Devuelve una única linea (array con cada campo) de la TABLA(id seleccionado).
       return $reg;
       
    }
    public static function listAll(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome, nome_ES, imagem, id_aservo FROM ' . self::TABLA);
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }
    public static function listAll_PT(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome, imagem, id_aservo FROM ' . self::TABLA . ' ORDER BY nome');
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }
    public static function listAll_ES(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome_ES, imagem, id_aservo FROM ' . self::TABLA . ' ORDER BY nome_ES');
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }
    //Elimina toda una linea de la tabla.
    public static function delete($id){
      $conexion = new Conexion();
      $sql = $conexion->prepare('DELETE FROM'. self::TABLA .' WHERE id = :id');
      $sql->bindValue(':id', $id);
      $sql->execute();
      return $sql;    
}

 }

?>
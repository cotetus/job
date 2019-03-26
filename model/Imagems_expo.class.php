<?php

 class Imagems_expo {
   
   private $id;
   private $nome;
   private $nome_ES;
   private $imagem;
   private $id_exposicao;

   const TABLA = 'imagems_expo';
   
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
   public function getId_exposicao() {
      return $this->id_exposicao;
   }


   public function setNome($nome) {
      $this->nome = $nome;
   }
   public function setNome_ES($nome_ES) {
      $this->nome = $nome_ES;
   }
   public function setImagem($imagem) {
      $this->imagem = $imagem;
   }
   public function setId_exposicao($id_exposicao) {
      $this->artista = $id_exposicao;
   }
   
   
   public function save($nome, $nome_ES, $id_exposicao, $imagem,  $id){
      $conexion = new Conexion();
      if($id) { //Modifica toda una linea, mediante el id.

         $sql = $conexion->prepare('UPDATE ' . self::TABLA .' SET nome = :nome, nome_ES = :nome_ES,  imagem = :imagem, id_exposicao = :id_exposicao WHERE id = :id');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':nome_ES', $nome_ES, PDO::PARAM_STR);
         $sql->bindParam(':imagem', $imagem, PDO::PARAM_STR);
         $sql->bindParam(':id_exposicao', $id_exposicao);
         $sql->bindParam(':id', $id);
         $sql->execute();
      }else {  //Inserta un nuevo espectaculo.
         $sql = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome, nome_ES, imagem,  id_exposicao) VALUES(:nome, :imagem, :id_exposicao)');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':nome_ES', $nome_ES, PDO::PARAM_STR);
         $sql->bindParam(':imagem', $imagem, PDO::PARAM_STR);
         $sql->bindParam(':id_exposicao', $id_exposicao);
         $id = $conexion->lastInsertId();
         $sql->execute();
      }
      return $sql;
   }
   public static function listOne($id){//Retorna nombre, descri.. por el id.
    
       $conexion = new Conexion();
       $sql = $conexion->prepare('SELECT nome, nome_ES, imagem, id_exposicao FROM ' . self::TABLA . ' WHERE id = :id');
       $sql->bindParam(':id', $id);
       $sql->execute();
       $reg = $sql->fetch(); //Devuelve una única linea (array con cada campo) de la TABLA(id seleccionado).
       return $reg;
       
    }
    public static function listAll(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome, nome_ES, imagem, id_exposicao FROM ' . self::TABLA);
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }
    public static function listAll_PT(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome, imagem, id_exposicao FROM ' . self::TABLA . ' ORDER BY nome');
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }
    public static function listAll_ES(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome_ES, imagem, id_exposicao FROM ' . self::TABLA . ' ORDER BY nome_ES');
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
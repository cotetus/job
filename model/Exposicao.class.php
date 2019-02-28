<?php

 class Exposicao {
   private $id;
   private $nome;
   private $descricao;
   private $banner;
   private $local;
   private $data_inicio;
   private $data_final;
   const TABLA = 'exposicao';
   
   public function getId() {
      return $this->id;
   }
   public function getNome() {
      return $this->nome;
   }
   public function getDescricao() {
      return $this->descricao;
   }
   public function getBanner() {
      return $this->banner;
   }
   public function getLocal() {
      return $this->local;
   }
   public function getData_final(){
      return $this->data_final;
   }
   public function getData_incio() {
      return $this->data_inicio;
   }

   public function setNome($nome) {
      $this->nome = $nome;
   }
   public function setDescricao($descricao) {
      $this->descricao = $descricao;
   }
   public function setBanner($banner) {
      $this->artista = $banner;
   }
   public function setLocal($local){
      $this->local = $local;
   }
   public function setData_incio($data_inicio){
      $this->data_inicio = $data_inicio;
   }
   public function setData_final($data_final){
      $this->data_final = $data_final;
   }
   
   public function save($nome, $banner, $data_final, $data_inicio, $descricao, $local, $id){
      $conexion = new Conexion();
      if($id) { //Modifica toda una linea, mediante el id.

         $sql = $conexion->prepare('UPDATE ' . self::TABLA .' SET nome = :nome, :data_inicio = data_inicio, :data_final = data_final, descricao = :descricao, banner = :banner WHERE id = :id');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $sql->bindParam(':banner', $banner);
         $sql->bindParam(':data_final', $data_final);
         $sql->bindParam(':data_inicio', $data_inicio);
         $sql->bindParam(':local', $local);
         $sql->bindParam(':id', $id);
         $sql->execute();
      }else {  //Inserta un nuevo espectaculo.
         $sql = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome, descricao, data_final, data_inicio banner, local) VALUES(:nome, :descricao, :data_final, :data_inicio :banner, :local)');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $sql->bindParam(':banner', $banner);
         $sql->bindParam(':data_final', $data_final);
         $sql->bindParam(':data_inicio', $data_inicio);
         $sql->bindParam(':local', $local, PDO::PARAM_STR);
         $id = $conexion->lastInsertId();
         $sql->execute();
      }
      return $sql;
   }
   public static function listOne($id){//Retorna nombre, descri.. por el id.
    
       $conexion = new Conexion();
       $sql = $conexion->prepare('SELECT nome, data_final, data_inicio, descricao, banner, local FROM ' . self::TABLA . ' WHERE id = :id');
       $sql->bindParam(':id', $id);
       $sql->execute();
       $reg = $sql->fetch(); //Devuelve una única linea (array con cada campo) de la TABLA(id seleccionado).
       return $reg;
       
    }
    public static function listAll(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome, descricao, data_final, data_inicio, banner, local FROM ' . self::TABLA . ' ORDER BY nome');
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
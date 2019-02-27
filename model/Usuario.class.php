<?php

 class Usuario {
   private $id;
   private $nome;
   private $email;
   private $senha;
   private $avatar;

   const TABLA = 'usuario';
   
   public function getId() {
      return $this->id;
   }
   public function getNome() {
      return $this->nome;
   }
   public function getDescricao() {
      return $this->email;
   }
   public function getId_userp() {
      return $this->senha;
   }
   public function getPeriodo() {
      return $this->avatar;
   }
   public function getId_categoria(){
      return $this->id_categoria;
   }
   public function getData_catalogada() {
      return $this->data_catalogada;
   }

   public function setNome($nome) {
      $this->nome = $nome;
   }
   public function setDescricao($email) {
      $this->email = $email;
   }
   public function setId_user($senha) {
      $this->artista = $senha;
   }
   public function setPeriodo($avatar){
      $this->avatar = $avatar;
   }
   public function setData_catalogada($data_catalogada){
      $this->data_catalogada = $data_catalogada;
   }
   public function setId_categoria($id_categoria){
      $this->id_categoria = $id_categoria;
   }
   
   public function save($nome, $senha, $id_categoria, $data_catalogada, $email, $avatar, $id){
      $conexion = new Conexion();
      if($id) { //Modifica toda una linea, mediante el id.

         $sql = $conexion->prepare('UPDATE ' . self::TABLA .' SET nome = :nome, :data_catalogada = data_catalogada, :id_categoria = id_categoria, email = :email, senha = :senha WHERE id = :id');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':email', $email, PDO::PARAM_STR);
         $sql->bindParam(':senha', $senha);
         $sql->bindParam(':id_categoria', $id_categoria);
         $sql->bindParam(':data_catalogada', $data_catalogada);
         $sql->bindParam(':avatar', $avatar);
         $sql->bindParam(':id', $id);
         $sql->execute();
      }else {  //Inserta un nuevo espectaculo.
         $sql = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome, email, id_categoria, data_catalogada senha, avatar) VALUES(:nome, :email, :id_categoria, :data_catalogada :senha, :avatar)');
         $sql->bindParam(':nome', $nome, PDO::PARAM_STR);
         $sql->bindParam(':email', $email, PDO::PARAM_STR);
         $sql->bindParam(':senha', $senha);
         $sql->bindParam(':id_categoria', $id_categoria);
         $sql->bindParam(':data_catalogada', $data_catalogada);
         $sql->bindParam(':avatar', $avatar, PDO::PARAM_STR);
         $id = $conexion->lastInsertId();
         $sql->execute();
      }
      return $sql;
   }
   public static function listOne($id){//Retorna nombre, descri.. por el id.
    
       $conexion = new Conexion();
       $sql = $conexion->prepare('SELECT nome, id_categoria, data_catalogada, email, senha, avatar FROM ' . self::TABLA . ' WHERE id = :id');
       $sql->bindParam(':id', $id);
       $sql->execute();
       $reg = $sql->fetch(); //Devuelve una única linea (array con cada campo) de la TABLA(id seleccionado).
       return $reg;
       
    }
    public static function listAll(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome, email, id_categoria, data_catalogada, senha, avatar FROM ' . self::TABLA . ' ORDER BY nome');
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
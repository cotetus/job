<?php

 class Acervo {
   private $id;
   private $nome_peca;
   private $descricao;
   private $data_catalogada;   
   private $periodo;
   private $id_user;
   private $id_categoria;
   const TABLA = 'acervo';
   
   public function getId() {
      return $this->id;
   }
   public function getNome_peca() {
      return $this->nome_peca;
   }
   public function getDescricao() {
      return $this->descricao;
   }
   public function getId_userp() {
      return $this->id_user;
   }
   public function getPeriodo() {
      return $this->periodo;
   }
   public function getId_categoria(){
      return $this->id_categoria;
   }
   public function getData_catalogada() {
      return $this->data_catalogada;
   }

   public function setNome_peca($nome_peca) {
      $this->nome_peca = $nome_peca;
   }
   public function setDescricao($descricao) {
      $this->descricao = $descricao;
   }
   public function setId_user($id_user) {
      $this->artista = $id_user;
   }
   public function setPeriodo($periodo){
      $this->periodo = $periodo;
   }
   public function setData_catalogada($data_catalogada){
      $this->data_catalogada = $data_catalogada;
   }
   public function setId_categoria($id_categoria){
      $this->id_categoria = $id_categoria;
   }
   
   public function save($nome_peca, $id_user, $id_categoria, $data_catalogada, $descricao, $periodo, $id){
      $conexion = new Conexion();
      if($id) { //Modifica toda una linea, mediante el id.

         $sql = $conexion->prepare('UPDATE ' . self::TABLA .' SET nome_peca = :nome_peca, descricao = :descricao, :data_catalogada = data_catalogada, :periodo= periodo,  id_user = :id_user, :id_categoria = id_categoria WHERE id = :id');
         $sql->bindParam(':nome_peca', $nome_peca, PDO::PARAM_STR);
         $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $sql->bindParam(':id_user', $id_user);
         $sql->bindParam(':id_categoria', $id_categoria);
         $sql->bindParam(':data_catalogada', $data_catalogada);
         $sql->bindParam(':periodo', $periodo);
         $sql->bindParam(':id', $id);
         $sql->execute();
      }else {  //Inserta un nuevo espectaculo.
         $sql = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome_peca, descricao, data_catalogada, periodo, id_user, id_categoria) VALUES(:nome_peca, :descricao, :data_catalogada, :periodo, :id_user, :id_categoria)');
         $sql->bindParam(':nome_peca', $nome_peca, PDO::PARAM_STR);
         $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $sql->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
         $sql->bindParam(':data_catalogada', $data_catalogada);
         $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
         $sql->bindParam(':periodo', $periodo, PDO::PARAM_STR);
         $id = $conexion->lastInsertId();
         $sql->execute();//var_dump($sql);die;
      }
      return $sql;
   }
   public static function listOne($id){//Retorna nombre, descri.. por el id.
    
       $conexion = new Conexion();
       $sql = $conexion->prepare('SELECT nome_peca, descricao, data_catalogada, periodo, id_user, id_categoria FROM ' . self::TABLA . ' WHERE id = :id');
       $sql->bindParam(':id', $id);
       $sql->execute();
       $reg = $sql->fetch(); //Devuelve una única linea (array con cada campo) de la TABLA(id seleccionado).
       return $reg;
       
    }
    public static function listAll(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome_peca, descricao, data_catalogada, periodo, id_user, id_categoria FROM ' . self::TABLA . ' ORDER BY nome_peca');
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
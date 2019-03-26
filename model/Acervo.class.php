<?php

 class Acervo {
   private $id;
   private $nome_peca;
   private $nome_peca_ES;
   private $descricao;
   private $descricao_ES;
   private $data_catalogada;   
   private $periodo;
   private $periodo_ES;
   private $id_user;
   private $id_categoria;
   const TABLA = 'acervo';
   
   public function getId() {
      return $this->id;
   }
   public function getNome_peca() {
      return $this->nome_peca;
   }
   public function getNome_peca_ES() {
      return $this->nome_peca_ES;
   }   
   public function getDescricao() {
      return $this->descricao;
   }
   public function getDescricao_ES() {
      return $this->descricao_ES;
   }
   public function getId_userp() {
      return $this->id_user;
   }
   public function getPeriodo() {
      return $this->periodo;
   }
   public function getPeriodo_ES() {
      return $this->periodo_ES;
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
   public function setNome_peca_ES($nome_peca_ES) {
      $this->nome_peca_ES = $nome_peca_ES;
   }
   public function setDescricao($descricao) {
      $this->descricao = $descricao;
   }
   public function setDescricao_ES($descricao_ES) {
      $this->descricao_ES = $descricao_ES;
   }
   public function setId_user($id_user) {
      $this->artista = $id_user;
   }
   public function setPeriodo($periodo){
      $this->periodo = $periodo;
   }
   public function setPeriodo_ES($periodo_ES){
      $this->periodo_ES = $periodo_ES;
   }
   public function setData_catalogada($data_catalogada){
      $this->data_catalogada = $data_catalogada;
   }
   public function setId_categoria($id_categoria){
      $this->id_categoria = $id_categoria;
   }
   
   public function save($nome_peca, $nome_peca_ES, $id_user, $id_categoria, $data_catalogada, $descricao, $descricao_ES, $periodo, $periodo_ES, $id){
      $conexion = new Conexion();
      if($id) { //Modifica toda una linea, mediante el id.

         $sql = $conexion->prepare('UPDATE ' . self::TABLA .' SET nome_peca = :nome_peca, nome_peca_ES = :nome_peca_ES, descricao = :descricao, descricao_ES = :descricao_ES, :data_catalogada = data_catalogada, :periodo = periodo, :periodo_ES = periodo_ES,  id_user = :id_user, :id_categoria = id_categoria WHERE id = :id');
         $sql->bindParam(':nome_peca', $nome_peca, PDO::PARAM_STR);
         $sql->bindParam(':nome_peca_ES', $nome_peca_ES, PDO::PARAM_STR);
         $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $sql->bindParam(':descricao_ES', $descricao_ES, PDO::PARAM_STR);
         $sql->bindParam(':id_user', $id_user);
         $sql->bindParam(':id_categoria', $id_categoria);
         $sql->bindParam(':data_catalogada', $data_catalogada);
         $sql->bindParam(':periodo', $periodo);
         $sql->bindParam(':periodo_ES', $periodo_ES);
         $sql->bindParam(':id', $id);
         $sql->execute();
      }else {  //Inserta un nuevo espectaculo.
         $sql = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nome_peca, nome_peca_ES, descricao, descricao_ES, data_catalogada, periodo, periodo_ES, id_user, id_categoria) VALUES(:nome_peca, :nome_peca_ES, :descricao, :descricao_ES, :data_catalogada, :periodo, :periodo_ES, :id_user, :id_categoria)');
         $sql->bindParam(':nome_peca', $nome_peca, PDO::PARAM_STR);
         $sql->bindParam(':nome_peca_ES', $nome_peca_ES, PDO::PARAM_STR);
         $sql->bindParam(':descricao', $descricao, PDO::PARAM_STR);
         $sql->bindParam(':descricao_ES', $descricao_ES, PDO::PARAM_STR);
         $sql->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
         $sql->bindParam(':data_catalogada', $data_catalogada);
         $sql->bindParam(':id_user', $id_user, PDO::PARAM_INT);
         $sql->bindParam(':periodo', $periodo, PDO::PARAM_STR);
         $sql->bindParam(':periodo_ES', $periodo_ES, PDO::PARAM_STR);
         $id = $conexion->lastInsertId();
         $sql->execute();//var_dump($sql);die;
      }
      return $sql;
   }
   public static function listOne($id){//Retorna nombre, descri.. por el id.
    
       $conexion = new Conexion();
       $sql = $conexion->prepare('SELECT nome_peca, nome_peca_ES, descricao, descricao_ES, data_catalogada, periodo, periodo_ES, id_user, id_categoria FROM ' . self::TABLA . ' WHERE id = :id');
       $sql->bindParam(':id', $id);
       $sql->execute();
       $reg = $sql->fetch(); //Devuelve una única linea (array con cada campo) de la TABLA(id seleccionado).
       return $reg;
       
    }

    public static function listAll(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome_peca, nome_peca_ES, descricao, descricao_ES, data_catalogada, periodo, periodo_ES, id_user, id_categoria FROM ' . self::TABLA );
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }

    public static function listAll_PT(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome_peca, descricao, data_catalogada, periodo, id_user, id_categoria FROM ' . self::TABLA . ' ORDER BY nome_peca');
       $sql->execute();
       $reg = $sql->fetchAll();
       return $reg;
    }
    public static function listAll_ES(){
       $conexion = new Conexion();
       $sql = $conexion->prepare ('SELECT id, nome_peca_ES, descricao_ES, data_catalogada, periodo_ES, id_user, id_categoria FROM ' . self::TABLA . ' ORDER BY nome_peca_ES');
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
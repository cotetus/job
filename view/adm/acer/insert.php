<form method="POST" action="?c=acer&a=Guardar"  id="edit" tabindex="-1"   >
    <input type="hidden" name="id"/>
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="false"><span class="glyphicon glyphicon-remove" aria-hidden="false"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Agregar Pieza</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" name="nome_peca" placeholder="Nombre de la pieza">
        </div>
        <div class="form-group">
        <input class="form-control " type="date" name="data_catalogada" placeholder="Fecha de registro">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" name="descricao" placeholder="Descripción"></textarea>
        </div>
        <div class="form-group">
        <input class="form-control " type="text" name="periodo" placeholder="Período">
        </div>
        <div class="form-group">
        <select class="form-control " name="id_categoria"/>
        <option value ="">Catgoria</option>
        <?php
        foreach($this->categoria->listAll() as $item){
        echo "<option value = '".$item['id']."'>".$item['nome']."</option>";}
        ?>
        </select></div>
        <div class="form-group">
        <select class="form-control " name="id_user"/>
        <option value ="">Usuario</option>
        <?php
        foreach($this->usuario->listAll() as $item){
        echo "<option value = '".$item['id']."'>".$item['nome']."</option>";}
        ?>
        </select>
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Agregar</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </form>
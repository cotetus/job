<form enctype="multipart/form-data" method="POST" action="?c=acervoimg&a=Guardar"  id="edit" tabindex="-1"   >
    <input type="hidden" name="id"/>
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="false"><span class="glyphicon glyphicon-remove" aria-hidden="false"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Agregar Imagenes del Acervo</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" name="nome" placeholder="Nombre">
        </div>
        <div class="form-group">
        <select class="form-control " name="id_categoria"/>
        <option value ="">Acervo</option>
        <?php
        foreach($this->acervo->listAll() as $item){
        echo "<option value = '".$item['id']."'>".$item['nome_peca']."</option>";}
        ?>
        </select>
        </div>
        <div class="form-group">
        <input class="form-control " type="file" name="imagem" placeholder="Imagen">
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
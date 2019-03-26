<form enctype="multipart/form-data" method="POST" action="?c=exposicao&a=Guardar"  id="edit" tabindex="-1"   >
    <input type="hidden" name="id"/>
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="false"><span class="glyphicon glyphicon-remove" aria-hidden="false"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Agregar Exposición</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" name="nome" placeholder="Nombre (PT)">
        </div>
        <div class="form-group">
        <input class="form-control " type="text" name="nome_ES" placeholder="Nombre (ES)">
        </div>
        <div class="form-group">
        <input class="form-control " type="text" name="local" placeholder="Local">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" name="descricao" placeholder="Descripción (PT)"></textarea>
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" name="descricao_ES" placeholder="Descripción (ES)"></textarea>
        </div>
        <div class="form-group">
        <input class="form-control " type="date" name="data_inicio" placeholder="Fecha de Inicio">
        </div>
        <div class="form-group">
        <input class="form-control " type="date" name="data_final" placeholder="Fecha Final">
        </div>
                <div class="form-group">
        <input class="form-control " type="file" name="banner" placeholder="Banner">
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
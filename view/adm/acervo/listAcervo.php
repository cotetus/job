<div class="main-container"> 
<div class="container">
    <div class="row">
             
        <div class="col-md-12">
        <h4>ACERVOS</h4>
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   

            <th>Nombre de la Pieza</th>
            <th>Descripción</th>
            <th>Fecha Registrada</th>
             <th>Período</th>
             <th>Modificar</th>
             <th>Eliminar</th>
                   </thead>
    <tbody>
       <?php $i = 0; ?>
       <?php foreach($this->model->listAll() as $datos): ?>    
            <tr>
            <td><?php echo  $datos['nome_peca'];?></td>                    
            <td><?php echo $datos['descricao']; ?></td>        
            <td><?php $newDate = date('d/m/Y', strtotime($datos['data_catalogada'])); echo $newDate; ?></td>
            <td><?php echo $datos['periodo']; ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button  class="btn btn-danger btn-xs" <?php echo "href='?c=acervo&a=eliminar&id=".$datos['id']."'";?> data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr><?php endforeach; ?>   
   
    
    </tbody>
        
</table>


                
            </div>
            
        </div>
    </div>
</div>

<form method="POST" action="?c=acervo&a=Index" class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Editar Pieza</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" value="<?php echo $datos['nome _peca']; ?>">
        </div>
        <div class="form-group">
        <input class="form-control " type="date" value="<?php echo $datos['data_catalogada']; ?>">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" value="<?php echo $datos['descricao']; ?>"></textarea>
        </div>
        <div class="form-group">
        <input class="form-control " type="text" value="<?php echo $datos['periodo']; ?>">
        </div>
        <div class="form-group">
        <select class="form-control " name="id_categoria"/>
        <option value ="">Categoria</option>
        <?php
        foreach($this->categoria->listAll() as $item){
        echo "<option value = '".$item['id']."'>".$item['nome']."</option>";}
        ?>
        </select>
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Modificar</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </form>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Eliminar Pieza</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>Realmente usted desea emplear esta acción?</div>
       
      </div>
        <div class="modal-footer ">
        <button <?php echo "href='?c=acervo&a=eliminar&id=".$datos['id']."'";?> type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Si</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

 </div>
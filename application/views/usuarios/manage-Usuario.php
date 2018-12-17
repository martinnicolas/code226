    <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo date('H:i:s'); ?> - <?php echo $this->session->flashdata('success'); ?>.</strong>        
      </div>
    <?php endif; ?>

    <div class="page-header">
      <a style="align:float-left;"class="btn btn-danger popup_reporte" href="<?php echo site_url(); ?>usuarios/pdf"><span class="glyphicon glyphicon-save"></span> PDF</a>
      <a style="align:float-left;"class="btn btn-success" href="<?php echo site_url(); ?>usuarios/excel"><span class="glyphicon glyphicon-save"></span> Excel</a>
      <a style="align:float-left;"class="btn btn-primary" href="<?php echo site_url(); ?>usuarios/agregar"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
      <h4>Listado de usuarios</h4>
    </div>

    <?php if(!empty($Usuarios)):?>
    <div class="table-responsive">
    <table id="tabla" class="table table-striped table-bordered table-hover">  
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Clave</th>
          <th>Fecha de creación</th>
          <th>Último acceso</th>
          <th>Estado</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($Usuarios as $Usuario): ?>
        <tr>
          <td><?php echo $Usuario->nombre ?></td>
          <td><?php echo $Usuario->clave ?></td>
          <td><?php echo datetime_to_php($Usuario->fecha_creacion) ?></td>
          <td><?php echo datetime_to_php($Usuario->ultimo_acceso) ?></td>
          <td><a href="<?php echo site_url()?>usuarios/cambiar_estado/<?php echo $Usuario->id ?>" > <?php if($Usuario->habilitado=='NO'){ echo "Deshabilitado"; } else { echo "Habilitado"; } ?></a></td>
          <td><?php echo anchor("usuarios/editar/".$Usuario->id, '<span class="glyphicon glyphicon-pencil"></span>','')?></td>
          <td><?php echo anchor("usuarios/eliminar/".$Usuario->id, '<span class="glyphicon glyphicon-trash"></span>','class="metodo_get confirmar" msj="Está seguro que desea continuar?"')?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    <?php else: ?>
      <div class="alert alert-info" role="alert">
        <strong>No hay Usuarios cargados!</strong>
      </div>
    <?php endif; ?>



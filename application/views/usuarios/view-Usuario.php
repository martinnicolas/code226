<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?php echo date('H:i:s'); ?> - <?php echo $this->session->flashdata('success'); ?>.</strong>        
  </div>
<?php endif; ?>


<div class="page-header">
  <a class="btn btn-default" href="<?php echo site_url(); ?>usuarios/index"><span class="glyphicon glyphicon-list-alt"></span> Volver</a>  
  <a class="btn btn-primary" href="<?php echo site_url().'usuarios/editar/'.$Usuario->id; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a>  
  <h4>Usuario</h4>
</div>

<dl class="dl-horizontal">

  <dt>Nombre: </dt><dd><?php echo $Usuario->nombre ?></dd>

  <dt>Clave: </dt><dd><?php echo $Usuario->clave ?></dd>

  <dt>Fecha de creacion: </dt><dd><?php echo datetime_to_php_date($Usuario->fecha_creacion) ?></dd>

  <dt>Último acceso: </dt><dd><?php echo datetime_to_php_date($Usuario->ultimo_acceso) ?></dd>
</dl>


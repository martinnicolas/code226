<?php if($this->session->flashdata('success')): ?>
  <div class="alert alert-success">
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong><?php echo date('H:i:s'); ?> - <?php echo $this->session->flashdata('success'); ?>.</strong>        
  </div>
<?php endif; ?>


<div class="page-header">
  <a class="btn btn-default" href="<?php echo site_url(); ?>personas/index"><span class="glyphicon glyphicon-list-alt"></span> Volver</a>  
  <a class="btn btn-primary" href="<?php echo site_url().'personas/editar/'.$Persona->id; ?>"><span class="glyphicon glyphicon-pencil"></span> Editar</a>  
  <h4>Persona</h4>
</div>

<dl class="dl-horizontal">
  <dt>DNI: </dt><dd><?php echo $Persona->dni ?></dd>

  <dt>Apellido: </dt><dd><?php echo $Persona->apellido ?></dd>

  <dt>Nombre: </dt><dd><?php echo $Persona->nombre ?></dd>

  <dt>Domicilio: </dt><dd><?php echo $Persona->domicilio ?></dd>

  <dt>Teléfono: </dt><dd><?php echo $Persona->telefono ?></dd>

  <dt>Email: </dt><dd><?php echo $Persona->email ?></dd>

  <dt>Fecha de nacimiento: </dt><dd><?php echo datetime_to_php_date($Persona->fecha_nacimiento) ?></dd>
</dl>


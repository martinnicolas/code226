
    <div class="page-header">
      <a class="btn btn-default" href="<?php echo site_url(); ?>personas/index"><span class="glyphicon glyphicon-list-alt"></span> Volver</a>  
      <h4>Agregar persona</h4>
    </div>

    <?php if (validation_errors()): ?>
    <!-- Notificaciones-->
        <div class="alert alert-danger alert-dismissible" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo 'Atención!'; ?></strong> Han ocurrido errores.
        </div>            
    <?php endif; ?>  

    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url()?>personas/crear">
      <div class="form-group">
        <label for="dni" class="col-lg-2 control-label"><span class="campo_requerido">*</span> DNI</label>
        <div class="col-lg-2">      
          <input type="number" class="form-control" id="dni" name="dni" value="<?php echo set_value('dni'); ?>">
        </div>
        <?php echo form_error('dni','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="apellido" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Apellido</label>
        <div class="col-lg-3">      
          <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo set_value('apellido'); ?>">
        </div>      
        <?php echo form_error('apellido','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Nombre</label>
        <div class="col-lg-4">      
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
        </div>      
        <?php echo form_error('nombre','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="domicilio" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Domicilio</label>
        <div class="col-lg-5">      
          <input type="text" class="form-control" id="domicilio" name="domicilio" value="<?php echo set_value('domicilio'); ?>">
        </div>      
        <?php echo form_error('domicilio','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="telefono" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Teléfono</label>
        <div class="col-lg-3">      
          <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono'); ?>">
        </div>  
        <?php echo form_error('telefono','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Email</label>
        <div class="col-lg-3">      
          <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
        </div>      
        <?php echo form_error('email','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Fecha de nacimiento</label>
        <div class="col-lg-3">      
          <input type="fecha_nacimiento" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo set_value('fecha_nacimiento'); ?>">
        </div>      
        <?php echo form_error('fecha_nacimiento','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

  <script type="text/javascript">
  $(document).ready(function ()
  {
    /* Datepicker */
    datepicker_spanish();
    $(function () {
      $("#fecha_nacimiento").datepicker();
    });
  });
</script>
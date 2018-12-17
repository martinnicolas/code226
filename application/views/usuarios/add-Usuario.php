
    <div class="page-header">
      <a class="btn btn-default" href="<?php echo site_url(); ?>usuarios/index"><span class="glyphicon glyphicon-list-alt"></span> Volver</a>  
      <h4>Agregar usuario</h4>
    </div>

    <?php if (validation_errors()): ?>
    <!-- Notificaciones-->
        <div class="alert alert-danger alert-dismissible" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong><?php echo 'Atención!'; ?></strong> Han ocurrido errores.
        </div>            
    <?php endif; ?>  

    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url()?>usuarios/crear">      
      <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Nombre</label>
        <div class="col-lg-3">      
          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">
        </div>      
        <?php echo form_error('nombre','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="clave" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Clave</label>
        <div class="col-lg-3">      
          <input type="password" class="form-control" id="clave" name="clave" value="<?php echo set_value('clave'); ?>">
        </div>      
        <?php echo form_error('clave','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>            
      <div class="form-group">
        <label for="confirmar_clave" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Confirmar clave</label>
        <div class="col-lg-3">      
          <input type="password" class="form-control" id="confirmar_clave" name="confirmar_clave" value="<?php echo set_value('confirmar_clave'); ?>">
        </div>      
        <?php echo form_error('confirmar_clave','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
  </div>

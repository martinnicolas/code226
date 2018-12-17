    <?php if($this->session->flashdata('success')): ?>
      <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong><?php echo date('H:i:s'); ?> - <?php echo $this->session->flashdata('success'); ?>.</strong>        
      </div>
    <?php endif; ?>

    <div class="page-header">
      <a class="btn btn-default" href="<?php echo site_url(); ?>usuarios/index"><span class="glyphicon glyphicon-list-alt"></span> Volver</a>  
      <h4>Editando usuario</h4>
    </div>
    <h3><small>Cambiar nombre</small></h3>
    <br/>
    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url()?>usuarios/actualizar" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $Usuario->id ?>"   name="Usuario_id">      
      <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Nombre</label>
        <div class="col-lg-4">
          <input type="text" value="<?php echo (!empty($Usuario))? $Usuario->nombre:set_value('nombre') ?>" class="form-control" id="nombre" name="nombre">
        </div>
        <?php echo form_error('nombre','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>            
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <br/>

    <div class="alert alert-info alert-dismissible" role="alert">
      <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php if (!empty($usuario['ultimo_acceso'])):?>
        <strong>Último acceso: </strong> <?php echo datetime_to_php($usuario['ultimo_login']);?>.
      <?php else:?>
        <strong>El usuario no registra ningún ingreso</strong>
      <?php endif;?>
    </div>            
    <h3><small>Cambiar clave</small></h3>
    <br/>
    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url()?>usuarios/cambiar_clave" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $Usuario->id ?>"   name="Usuario_id">      
      <div class="form-group">
        <label for="clave" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Nueva clave</label>
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
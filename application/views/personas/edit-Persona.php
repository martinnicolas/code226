    <div class="page-header">
      <a class="btn btn-default" href="<?php echo site_url(); ?>personas/index"><span class="glyphicon glyphicon-list-alt"></span> Volver</a>  
      <a class="btn btn-primary" href="<?php echo site_url().'personas/ver/'.$Persona->id; ?>"><span class="glyphicon glyphicon-info-sign"></span> Ver</a>  
      <h4>Editando persona</h4>
    </div>

    <form role="form" class="form-horizontal" method="post" action="<?php echo site_url()?>personas/actualizar" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $Persona->id ?>"   name="Persona_id">
      <div class="form-group">
        <label for="dni" class="col-lg-2 control-label"><span class="campo_requerido">*</span> DNI</label>
        <div class="col-lg-2">
          <input type="number" value="<?php echo (!empty($Persona) && !$this->input->post())? $Persona->dni:set_value('dni') ?>" class="form-control" id="dni" name="dni">
        </div>
        <?php echo form_error('dni','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="apellido" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Apellido</label>
        <div class="col-lg-3">
          <input type="text" value="<?php echo (!empty($Persona) && !$this->input->post())? $Persona->apellido:set_value('apellido') ?>" class="form-control" id="apellido" name="apellido">
        </div>
        <?php echo form_error('apellido','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Nombre</label>
        <div class="col-lg-4">
          <input type="text" value="<?php echo (!empty($Persona) && !$this->input->post())? $Persona->nombre:set_value('nombre') ?>" class="form-control" id="nombre" name="nombre">
        </div>
        <?php echo form_error('nombre','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="domicilio" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Domicilio</label>
        <div class="col-lg-5">
          <input type="text" value="<?php echo (!empty($Persona) && !$this->input->post())? $Persona->domicilio:set_value('domicilio') ?>" class="form-control" id="domicilio" name="domicilio">
        </div>
        <?php echo form_error('domicilio','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="telefono" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Teléfono</label>
        <div class="col-lg-3">
          <input type="text" value="<?php echo (!empty($Persona) && !$this->input->post())? $Persona->telefono:set_value('telefono') ?>" class="form-control" id="telefono" name="telefono">
        </div>
        <?php echo form_error('telefono','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Email</label>
        <div class="col-lg-3">
          <input type="text" value="<?php echo (!empty($Persona) && !$this->input->post())? $Persona->email:set_value('email') ?>" class="form-control" id="email" name="email">
        </div>
        <?php echo form_error('email','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label"><span class="campo_requerido">*</span> Fecha de nacimiento</label>
        <div class="col-lg-3">
          <input type="text" value="<?php echo (!empty($Persona) && !$this->input->post())? datetime_to_php_date($Persona->fecha_nacimiento):set_value('fecha_nacimiento') ?>" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
        </div>
        <?php echo form_error('fecha_nacimiento','<div class="col-lg-5"><span class="label label-danger">','</span></div>')?>      
      </div>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

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
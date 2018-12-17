    <div class="page-header">
      <a style="align:float-left;"class="btn btn-danger popup_reporte" href="<?php echo site_url(); ?>personas/pdf"><span class="glyphicon glyphicon-save"></span> PDF</a>
      <a style="align:float-left;"class="btn btn-success" href="<?php echo site_url(); ?>personas/excel"><span class="glyphicon glyphicon-save"></span> Excel</a>
      <a style="align:float-left;"class="btn btn-primary" href="<?php echo site_url(); ?>personas/agregar"><span class="glyphicon glyphicon-plus"></span> Agregar</a>
      <h4>Listado de personas</h4>
    </div>

    <?php if(!empty($Personas)):?>
    <div class="table-responsive">
    <table id="tabla" class="table table-striped table-bordered table-hover">  
      <thead>
        <tr>
          <th>DNI</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Domicilio</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Fecha de nacimiento</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($Personas as $Persona): ?>
        <tr>
          <td><?php echo $Persona->dni ?></td>
          <td><?php echo $Persona->apellido ?></td>
          <td><?php echo $Persona->nombre ?></td>
          <td><?php echo $Persona->domicilio ?></td>
          <td><?php echo $Persona->email ?></td>
          <td><?php echo $Persona->telefono ?></td>
          <td><?php echo datetime_to_php_date($Persona->fecha_nacimiento) ?></td>
          <td><?php echo anchor("personas/ver/".$Persona->id, '<span class="glyphicon glyphicon-search"></span>','')?></td>            
          <td><?php echo anchor("personas/editar/".$Persona->id, '<span class="glyphicon glyphicon-pencil"></span>','')?></td>
          <td><?php echo anchor("personas/eliminar/".$Persona->id, '<span class="glyphicon glyphicon-trash"></span>','class="metodo_get confirmar" msj="Está seguro que desea continuar?"')?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    <?php else: ?>
      <div class="alert alert-info" role="alert">
        <strong>No hay Personas cargadas!</strong>
      </div>
    <?php endif; ?>



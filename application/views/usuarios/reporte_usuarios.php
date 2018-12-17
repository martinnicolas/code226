<link type="text/css" href="<?php echo base_url("application/assets/estilos/estilo_reporte.css"); ?>" rel="stylesheet" />
<page backtop="30mm" backbottom="10mm" backleft="1mm" backright="1mm">   
    <page_header>
        <div id="header">
          <img src="<?php echo base_url("application/assets/imagenes/encabezado3.PNG"); ?>"/>            
        </div>    
    </page_header>
    <h4>Listado de usuarios</h4>    
    <?php if (!empty($usuarios)): ?>
    <table class="listado">  
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Clave</th>
          <th>Fecha de creación</th>
          <th>Último acceso</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?php echo $usuario->nombre; ?></td>     
            <td><?php echo $usuario->clave; ?></td>     
            <td><?php echo datetime_to_php_date($usuario->fecha_creacion); ?></td>     
            <td><?php echo datetime_to_php_date($usuario->ultimo_acceso); ?></td>     
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>            
    <?php else: ?>
        <p><b style= "color: red;">No se han cargado Usuarios</b></p>
    <?php endif; ?>     
    <page_footer>
        <table style="width: 100%">
            <tr>
                <th style="text-align: left; width: 50%">Listado de usuarios</th>
                <th style="text-align: right; width: 50%">página [[page_cu]]/[[page_nb]]</th>
            </tr>
        </table>
    </page_footer>      
</page>  
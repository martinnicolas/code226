<link type="text/css" href="<?php echo base_url("application/assets/estilos/estilo_reporte.css"); ?>" rel="stylesheet" />
<page backtop="30mm" backbottom="10mm" backleft="1mm" backright="1mm">   
    <page_header>
        <div id="header">
          <img src="<?php echo base_url("application/assets/imagenes/encabezado3.PNG"); ?>"/>            
        </div>    
    </page_header>
    <h4>Listado de personas</h4>    
    <?php if (!empty($personas)): ?>
    <table class="listado">  
      <thead>
        <tr>
          <th>DNI</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Domicilio</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Fecha de nacimiento</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach ($personas as $persona): ?>
        <tr>    
            <td><?php echo $persona->dni; ?></td>
            <td><?php echo $persona->apellido; ?></td>
            <td><?php echo $persona->nombre; ?></td>     
            <td><?php echo $persona->domicilio; ?></td>     
            <td><?php echo $persona->email; ?></td>     
            <td><?php echo $persona->telefono; ?></td>     
            <td><?php echo datetime_to_php_date($persona->fecha_nacimiento); ?></td>     
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>            
    <?php else: ?>
        <p><b style= "color: red;">No se han cargado Personas</b></p>
    <?php endif; ?>     
    <page_footer>
        <table style="width: 100%">
            <tr>
                <th style="text-align: left; width: 50%">Listado de personas</th>
                <th style="text-align: right; width: 50%">página [[page_cu]]/[[page_nb]]</th>
            </tr>
        </table>
    </page_footer>      
</page>  
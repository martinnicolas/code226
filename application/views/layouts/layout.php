<!DOCTYPE html>
<html lang="en">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Sistema - Ministerio de Educación - <?php echo $titulo ?></title>        
        <!-- Bootstrap 3.3.4-->
        <link rel="stylesheet" href="<?php echo base_url().'application/assets/bootstrap-3.3.4/dist/css/bootstrap.min.css'; ?>" />
        <script type="text/javascript" src="<?php echo base_url().'application/assets/bootstrap-3.3.4/dist/js/jquery-2.1.4.min.js'?>"></script>      
        <script type="text/javascript" src="<?php echo base_url().'application/assets/bootstrap-3.3.4/dist/js/bootstrap.min.js'?>"></script>      
        <!-- Bootstrap 3.3.4-->
        <!-- BootstrapDialog plugin -->
        <link rel="stylesheet" href="<?php echo base_url().'application/assets/bootstrap3-dialog-master/dist/css/bootstrap-dialog.min.css'; ?>" />
        <script type="text/javascript" src="<?php echo base_url().'application/assets/bootstrap3-dialog-master/dist/js/bootstrap-dialog.min.js'?>"></script>      
        <!-- BootstrapDialog plugin -->
        <!-- Datepicker -->
        <link rel="stylesheet" href="<?php echo base_url().'application/assets/jquery-ui-themes-1.10.2/themes/smoothness/jquery-ui.css'; ?>" />
        <script src="<?php echo base_url().'application/assets/jquery-ui-1.10.2/ui/jquery-ui.js'; ?>"></script>
        <!-- Datepicker -->
        <script type="text/javascript" src="<?php echo base_url().'application/assets/javascripts/application.js'?>"></script>      
        <script type="text/javascript">
            var m31 = {
                base_url: "<?php echo base_url(); ?>",
            };
        </script>
        <link rel="stylesheet" href="<?php echo base_url().'application/assets/estilos/estilo.css'?>" type="text/css" />
        <link rel="SHORTCUT ICON" href="<?php echo base_url().'application/assets/imagenes/logo.png';?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menú principal</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo anchor(site_url().'index/index', 'Sistema','class="navbar-brand"')?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li <?php echo ($objeto=='index')?'class="active"':''?> ><?php echo anchor(site_url().'index/index', 'Inicio')?></li>
            <li <?php echo ($objeto=='personas')?'class="active"':''?> ><?php echo anchor(site_url().'personas/index', 'Personas')?></li>
            <li <?php echo ($objeto=='usuarios')?'class="active"':''?> ><?php echo anchor(site_url().'usuarios/index', 'Usuarios')?></li>
          </ul>
          <!--<?php //echo $menu; ?>-->
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Begin page content -->
    <div class="container">
      <?php $this->load->view($contenido); ?>
    </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Dirección de Recursos Tecnológicos - Ministerio de Educación - Año 2015</p>
      </div>
    </footer>
  </body>
</html>
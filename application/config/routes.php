<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "IndexController/index";
$route['404_override'] = '';

// routes for Index.
$route['index/index']="IndexController/index";
// routes for Persona.
$route['personas/index']="PersonaController/index";
$route['personas/editar/(:num)']="PersonaController/edit/$1";
$route['personas/actualizar']="PersonaController/update";
$route['personas/eliminar/(:num)']="PersonaController/destroy/$1";
$route['personas/agregar']="PersonaController/add";
$route['personas/crear']="PersonaController/create";
$route['personas/ver/(:num)']="PersonaController/show/$1";
$route['personas/pdf']="PersonaController/generatePDF";
$route['personas/excel']="PersonaController/generateExcel";
// routes for Usuario.
$route['usuarios/index']="UsuarioController/index";
$route['usuarios/editar/(:num)']="UsuarioController/edit/$1";
$route['usuarios/actualizar']="UsuarioController/update";
$route['usuarios/cambiar_clave']="UsuarioController/cambiar_clave";
$route['usuarios/cambiar_estado/(:num)']="UsuarioController/cambiar_estado/$1";
$route['usuarios/eliminar/(:num)']="UsuarioController/destroy/$1";
$route['usuarios/agregar']="UsuarioController/add";
$route['usuarios/crear']="UsuarioController/create";
$route['usuarios/ver/(:num)']="UsuarioController/show/$1";
$route['usuarios/pdf']="UsuarioController/generatePDF";
$route['usuarios/excel']="UsuarioController/generateExcel";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
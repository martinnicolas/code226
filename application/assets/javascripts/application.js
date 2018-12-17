
function datepicker_spanish()
{
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',		
		prevText: '<Ant',
  		nextText: 'Sig>',
  		currentText: 'Hoy',
  		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  		weekHeader: 'Sm',
  		dateFormat: 'dd/mm/yy',
  		firstDay: 1,
  		isRTL: false,
  		showMonthAfterYear: false,
  		changeMonth: true,
  		changeYear: true,
  		showAnim: 'fadeIn',
  		yearSuffix: '',
    	maxDate: 'today',
 	};

 	$.datepicker.setDefaults($.datepicker.regional['es']);
}

BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_DEFAULT] = 'Información';
BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_INFO] = 'Información';
BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_PRIMARY] = 'Información';
BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_SUCCESS] = '';
BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_WARNING] = 'Atención!';
BootstrapDialog.DEFAULT_TEXTS[BootstrapDialog.TYPE_DANGER] = 'Cuidado!';
BootstrapDialog.DEFAULT_TEXTS['OK'] = 'Aceptar';
BootstrapDialog.DEFAULT_TEXTS['CANCEL'] = 'Cancelar';
BootstrapDialog.DEFAULT_TEXTS['CONFIRM'] = 'Confirmación';

/*global $, document, m31, alert, confirm, window 
*/
function pais_dni(pais, dni, argentina, callback)
{
	pais.change(function ()
	{
		dni.unbind('keydown', solo_digitos);
		var valor_pais = pais.val();
		if (valor_pais == argentina) {			
			valor_dni = dni.val();
			valor_dni = valor_dni.replace(/\D+/g, '');
			dni.val(valor_dni.substr(0, 8));
			dni.attr('maxlength', 8);			
			dni.bind('keydown', solo_digitos);
		}
		else {			
			dni.attr('maxlength', 255);			
		}
		if (callback !== undefined) {
			callback(pais, dni);
		}
	});		
}

function solo_digitos(event)
{
	if (!(event.keyCode == 8                              // backspace
		|| event.keyCode == 9                               // tab
		|| event.keyCode == 13                              // enter
  	|| event.keyCode == 46                              // delete
    || (event.keyCode >= 35 && event.keyCode <= 40)     // arrow keys/home/end
    || (event.keyCode >= 48 && event.keyCode <= 57)     // numbers on keyboard
    || (event.keyCode >= 96 && event.keyCode <= 105))   // number on keypad
  	){
		event.preventDefault();     // Prevent character input
  	}
}

function combinar_selects(dominio, imagen, relaciones)
{
	dominio.change(function () {
		var id_dominio = dominio.val();		
		var id_seleccionado = imagen.val();		
				
		imagen.empty();
		
		$.each(relaciones, function () {
			if (this.id_dominio == id_dominio){				
				$('<option />').val(this.id_imagen).html(this.nombre_imagen).appendTo(imagen);
			}
		});
		
		imagen.find('option[value=' + id_seleccionado + ']').attr('selected', 'selected');
	});
	
	dominio.change();
}

function entero_aleatorio()
{
	var entero = Math.random().toString();
	return entero.replace(/\D+/, '');
}

function es_natural_m0(texto)
{
	return texto.match(/^0*[1-9][0-9]*$/);
}

function es_natural(texto)
{
	return texto.match(/^\d+$/);
}

function agregar_parametro(url, parametro)
{
	var conector = '?';
	if (url.indexOf(conector) >= 0){
		conector = '&';
	}
	return url + conector + parametro;
}

function decode_url(url)
{
	var partes = url.split('?', 2);
	url = partes[0];
	var query_string = {};  
	if (partes.length > 1){
		partes = partes[1];
		var er = /([^&=]+)=([^&=]*)/g;
		var resultado;
		while (resultado = er.exec(partes)) {
			query_string[decodeURIComponent(resultado[1])] = decodeURIComponent(resultado[2]);
		}
	} 
	return [url, query_string];
}

function postear_link(link)
{
	var partes = decode_url(link.attr('href'));
	var url = partes[0];
	var query_string = partes[1];
	var form = $('<form method="post" style="display: none;" />').appendTo('body');
	form.attr({'action': url});
	for (k in query_string) {
		$('<input type="hidden" />').attr({'name': k, 'value': query_string[k]}).appendTo(form);
	}
	form.submit();
}

function imagen_ajax(id_imagen)
{
	var url = m31.base_url + 'application/views/templates/imagenes/ajax-loader.gif';
	var html = '<img style="display: none;" border="0" src=":url" id=":id_imagen" />';
	html = html.replace(':url', url);
	html = html.replace(':id_imagen', id_imagen);

	return $(html);
}

var ajax_request = null;

function ejecutar_ajax(accion, parametros, callback_success, imagen)
{  

	if (ajax_request) {
		ajax_request.abort();
		ajax_request = null;
	} 

	parametros.es_ajax = entero_aleatorio();

	var valor_url = accion + '?' + $.param(parametros);
	
	function callback_complete()
	{	
		ajax_request = null;

		if (imagen !== undefined) {
			imagen.hide();
		}		
	} 
	
	function callback_error(xhr, texto)
	{
		if (xhr.status !== 0) {
		  alert('Se produjo un error al realizar la operación.');
		}
	}
	
	if (imagen !== undefined) {
		imagen.show();
	}
		
	ajax_request = $.ajax({
		url: valor_url,
		error: callback_error,
		complete: callback_complete,
		success: callback_success
	});

}

var parametros_popup = 'scrollbars=YES,menubar=YES,toolbar=YES,resizable=YES,width=840,height=780';

var parametros_popup_reporte = 'scrollbars=YES,menubar=NO,toolbar=NO,resizable=NO,width=840,height=780';
 
$(document).ready(function () {  
	// SETEO UN TIEMPO DE ESPERA MAXIMO PARA AJAX (2 MINUTOS)
	$.ajaxSetup({timeout: (2 * 60 * 1000)});
		
	// AGREGAR TIMESTAMPS A LOS FORMULARIOS QUE NECESITEN CHEQUEAR JAVASCRIPT
	$('form.test_javascript').each(function () {
		$('<input type="hidden" name="_sta" />').attr('value', m31.timestamp).appendTo($(this));
	});
	
	$('form.sin_enter').each(function () {
		$(this).keypress(function (evento)
		{
			var target = $(evento.target);
			if (!target.is(':submit') && !target.is(':button') && !target.is(':image') && (evento.keyCode === 13)) {
				evento.stopPropagation();
				evento.preventDefault();
			}
		});
	});
	
	$('form.confirmar_submit').each(function () {
		$(this).submit(function (evento) {
			return confirm('Haga click en "Aceptar" para confirmar la operación.');
		});
	});

	$('a.metodo_post').each(function () {
		var link = $(this);
		link.click(function ()
		{
			if (link.is('.confirmar') && !confirm('Haga click en "Aceptar" para confirmar la operación.')) {
				return false;
			}
			postear_link(link);
			return false;
		});
  	});


  	$('a.metodo_get').each(function () {
  		var link = $(this);
  		link.click(function ()
  		{
  			if (link.is('.confirmar')){
  				BootstrapDialog.confirm({
  					message: $(this).attr('msj'),
  					closable: true, // <-- Default value is false
  					draggable: true, // <-- Default value is false            
  					callback: function(result) {
  						// result will be true if button was click, while it will be false if users close the dialog directly.
  						if(result) {
  							var url = link.attr('href');
  							$(location).attr('href',url);
  						}  						
            		}
        		});
      		} 
      		return false; 
    	});
  	});
  
	$('a.mostrar_oculto').each(function () {
		$(this).click(function () {
			var id = $(this).attr('href');
			$(id).show();
			return false;
		});		
	});
	
	$('a.mostrar_ajax').each(function () {
		$(this).click(function () {
			var url = $(this).attr('href');			
			var target = $(this).attr('target_ajax');
			url = agregar_parametro(url, 'es_ajax=' + entero_aleatorio());
			$(target).load(url);
			return false;
		});		
	});
		
	$('.foco').filter(':visible').eq(0).focus();
	
	$('a.popup_window').each(function () {
		$(this).click(function () {
			var url = $(this).attr('href');
			var popup = window.open(url, '', parametros_popup);
			return false;
		});
	});

	$('a.popup_reporte').each(function () {
		$(this).click(function () {
			var url = $(this).attr('href');
			var popup = window.open(url, '', '', 'yes');
			return false;
		});
	});
});


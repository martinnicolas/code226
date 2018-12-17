<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//HTML2PDF Wrapper
class Htmltopdf {

	//Variable para el documento pdf generado
	var $pdf;

	function Htmltopdf()
    {
    	//Load the HTML2PDF libary
		require_once("html2pdf/html2pdf.class.php");		
    }


    function initialize($orientation,$format,$language,$unicode,$encode,$marges = NULL){
        if (isset($marges))
            $this->pdf = new HTML2PDF($orientation,$format,$language,$unicode,$encode,$marges);    
        else
            $this->pdf = new HTML2PDF($orientation,$format,$language,$unicode,$encode);    
    }    


    function writeHTML($html){
    	$this->pdf->WriteHTML($html);       
    }


    function output($file_name){
    	$this->pdf->Output($file_name);        
    }

}	


<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 

if ( ! function_exists('to_excel'))
{
     function to_excel($sql, $titulo='', $filename='exceloutput')
     {
          $headers = ''; // just creating the var for field headers to append to below
          $data = ''; // just creating the var for field data to append to below

          $query = $sql["query"];
          $fields = $sql["fields"];

          if (!empty($titulo))
               $titulo = '<p><b style="font-size: 16px;">'.htmlspecialchars($titulo, ENT_QUOTES, 'ISO-8859-1').'</b></p>';

          if ($query->num_rows() == 0) {
               echo 'No hay informacion disponible.';
          } 
          else 
          {
               $headers .= "<tr>";
               foreach ($fields as $field) 
               {
                    $headers .= "<th>$field</th>\t";
               }
               $headers .= "</tr>";

               foreach ($query->result() as $row) 
               {
                    $line = '';
                    foreach($row as $value) 
                    {           

                         if ((!isset($value)) OR ($value == "")) 
                         {
                              $value = "<td>&nbsp</td>\t";
                         } 
                         else 
                         {
                              $value = str_replace('"', '""', $value);
                              $value = "<td>".htmlspecialchars($value, ENT_QUOTES, 'ISO-8859-1')."</td>\t";
                         }
                         $line .= $value;
                    }
                    $line = "<tr>$line</tr>";
                    $data .= trim($line)."\n";
               }
               $data = str_replace("\r","",$data);
               header("Content-type: application/x-msdownload");
               header("Content-Disposition: attachment; filename=$filename.xls");
               echo mb_convert_encoding("$titulo<table border=1>$headers\n$data</table>",'ISO-8859-1');
          }
     }
}

?>
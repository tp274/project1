<?php
abstract class Renderer{

	abstract function render($data);
	}

class CsvRenderer extends Renderer{

	//renders data using  html table
	public function render($data){
          $html = "<html><body><table border = 1";
	  $html .= "<tr>";
	  foreach($data[0] as $header){
	  $html .="<th>" .$header. "</th>";
	  }
	  $html .= "</tr>";
	  for ($i=1;$i<count($data);$i++){
	  $html .= "<tr>";
	  foreach ($data[$i] as $row) {
	  $html .= "<td>" .$row. "</td>";
	  }
	  }
	  echo $html; 
          }

 }
	  ?>

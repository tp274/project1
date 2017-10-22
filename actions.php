<?php

class Actions {
  protected $request;
    public function __construct($request) {
           $this->request = $request;
	  }


	    public function form(){
 		include('./form.php');

	    }
	    public function submit() 
	    { 
	      UploadHandler::handleUpload();
	    }


	        public function display() {
		$filename = $_GET['filename'];
/*		$lines = file($filename);
		$data = array_map('str_getcsv', $lines);
*/
		$parser = new CsvParser();
		$data = $parser->parse($filename);
		$renderer = new CsvRenderer();
		$renderer->render($data);
	/*	$html = "<html><body><table border = 1";
		$html .= "<tr>";
		foreach($data[0] as $header){
		$html .="<th>" .$header. "</th>";
		}
		$html .= "</tr>";
		 for ($i=1;$i<count($data);$i++){
		   $html .= "<tr>";
		      foreach ($data[$i] as $row) {
		         $html .= "<td>" .$row. "</td>";
			    }}
		       echo $html; */ 
		}
}
?>

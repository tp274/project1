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
	      if(isset($_POST['submit']) && $_POST['submit'] == "Upload Image"){
	       $dir="/afs/cad/u/t/p/tp274/public_html/project1/uploads/";
	       $target_file = $dir.basename($_FILES['fileToUpload']['name']);
	       if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
	 	header('Location: https://web.njit.edu/~tp274/project1/display.php?filename=' .$target_file);
	       }else {
	 	  echo 'error while uploading';
	 	  }
	       }

	      }


	        public function display() {

		$filename = $_GET['filename'];
		$lines = file($filename);
		$data = array_map('str_getcsv', $lines);
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
			    }}
			       echo $html;
		}
		}
?>

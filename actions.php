<?php

class Actions {
  protected $request;
    	   public function __construct($request) {
             $this->request = $request;
	   }

	    //To display the form contents
	    public function form(){
	 	require('./form.php');
	    }
	   
	   //On form submit need to upload file
	    public function submit() { 
	      if(isset($this->request['submit'])){
	      $target_file =UploadHandler::handleUpload($_FILES);
	      if($target_file){
	       header('Location:index.php?action=display&&filename='
	       .$target_file);
	        }else
		{
		  echo 'Error while uploading.';
		}
	     }
	    }

	    //To display CSV file contents
	    public function display() {
	      $filename = $this->request['filename'];
              $parser = new CsvParser();
              $data = $parser->parse($filename);
	      $renderer = new CsvRenderer();
	      echo  $renderer->render($data);
	}
}


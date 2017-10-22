<?php

class Actions {
  protected $request;
    	   public function __construct($request) {
             $this->request = $request;
	   }

	    //To display the form contents
	    public function form(){
 		include('./form.php');

	    }
	   
	   //On form submit need to upload file
	    public function submit() { 
	      UploadHandler::handleUpload();
	    }

	    //To display CSV file contents
	    public function display() {
	      $filename = $this->request['filename'];
              $parser = new CsvParser();
              $data = $parser->parse($filename);
	      $renderer = new CsvRenderer();
	      $renderer->render($data);
	}
}


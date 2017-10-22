<?php
//Class to Handle File upload
class UploadHandler{
	
	// To upload file in target directory 
	public static function handleUpload($fileInfo){
         $dir=__DIR__."/uploads/";
 	 $target_file = $dir.basename($fileInfo['fileToUpload']['name']);
	 if( self:: validateExtensionAndUpload($target_file)){
	 return $target_file;
	 }
	}

	//To validate the file extension and file upload verification
	public static function validateExtensionAndUpload($target_file){
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if ($imageFileType == "csv" && move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)){
	  return true;
	}else{
	 return false;
	}
       }
}


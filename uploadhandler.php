<?php
//Class to Handle File upload
class UploadHandler{
	
	// To upload file in target directory and navigate on diplay action on success
	public static function handleUpload(){
	 if(isset($_POST['submit']) && $_POST['submit'] == "Upload Image"){
         $dir="/afs/cad/u/t/p/tp274/public_html/project1/uploads/";
 	 $target_file = $dir.basename($_FILES['fileToUpload']['name']);
	 if(self:: validateExtensionAndUpload($target_file)){
	   header('Location: https://web.njit.edu/~tp274/project1/index.php?action=display&&filename=' .$target_file);   
	  }
	  else {
	   echo 'Error while uploading' .$target_file;
	   }
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


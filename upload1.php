<?php
if(isset($_POST['submit']) && $_POST['submit'] == "Upload Image"){
  $dir="/afs/cad/u/t/p/tp274/public_html/project1/uploads/";
  //$uploadok = 1;
  //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $target_file = $dir.basename($_FILES['fileToUpload']['name']);
    echo $target_file;
      if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo 'success';
	header('Location: https://web.njit.edu/~tp274/project1/display.php?filename=' .$target_file);
	  }else {

	  echo 'error while uploading';
	  }

	  }
	  ?>

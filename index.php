<?php

//turn on debugging messages
ini_set('display_errors', 'true');
error_reporting(E_ALL);


//instantiate the program object

//Class to load classes it finds the file when the progrm starts to fail for calling a missing class
class Manage {
    public static function autoload($class) {
            //you can put any file name or directory here
	    include strtolower($class) . '.php';
	 }
	
}
spl_autoload_register(array('Manage', 'autoload'));

//Include Actions file to navigate to respective page
$actions = new Actions($_REQUEST);
//Fetch the action param from the url 
$action = isset($_GET['action']) ? $_GET['action'] : 'form';
//based on the action call the method
switch($action){
 case 'form':
 case 'submit':
 case 'display':
    $actions->$action();
    break;
 default:
      echo 'Invalid action';
        break;
}

